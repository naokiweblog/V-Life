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
<div class="group-show">
  <h1 class="group-show-name">{{$group->name}}</h1>
  <p class="group-show-info">
    主催者:{{$group->user->name}}/{{$group->day->format('Y年m月d日G:00から')}}/{{$group->prefName}}
  </p>

  <img src="#">
  <div class="group-show-content">{{$group->content}}</div>
</div>
@endsection