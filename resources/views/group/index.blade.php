@extends('layouts.v_life')
@section('header')
  <div class="header-content">
    <h1 class="app-name">
      <a href="{{ url('/') }}" class="app-name-btn">V-Life</a>
    </h1>
    @if (Auth::check())
    <h1>
      <a class="header-register" href="{{ url('group/create') }}">募集する</a>
      <a class="header-register" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
        サインアウト
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
      </form>
    </h1>
    @else
    <h1>
      <a class="header-register" href="{{ url('login') }}">サインイン</a>
      <a class="header-register" href="{{ url('register') }}">サインアップ</a>
    </h1>
    @endif
  </div>
@endsection

@section('container')
  <div class="all-groups scroll">
    @foreach ($groups as $group)
      <a href="{{ url('group/'.$group->id) }}" class="one-group">
        <p class="group-name">{{mb_strimwidth($group->name, 0, 31, "…")}}</p>
        <p class="group-info">主催者:{{$group->user->name}}/{{$group->day->format('Y年m月d日G:00から')}}/{{$group->prefName}}</p>
        <p class="group-content">{{mb_strimwidth($group->content, 0, 59, "…")}}</p>
        <img src="../../uploads/{{ $group->image }}" class="group-image" alt="">
      </a>
      @endforeach
  </div>
@endsection