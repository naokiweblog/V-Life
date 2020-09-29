@extends('layouts.v_life')
@section('header')
  <div class="header-content">
    <h1 class="app-name">
      <a href="/" class="app-name-btn">V-Life</a>
    </h1>
    @if (Auth::check())
    <h1>
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
      <a class="header-register" href="login">サインイン</a>
      <a class="header-register" href="register">サインアップ</a>
    </h1>
    @endif
  </div>
@endsection

@section('container')
  @foreach ($groups as $group)
    <div>
      <a href="#">
        {{$group->name}}
        {{$group->user->name}}
        {{$group->day->format('Y年m月d日G:00から')}}
        {{$group->pref_id}}
        {{mb_strimwidth($group->content, 0, 10, "…")}}
      </a>
    </div>
  @endforeach
@endsection