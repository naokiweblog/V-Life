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
<div class="scroll">
  <div class="group-show">
    <div class="group-show-up">
      <h1 class="group-show-name">{{$group->name}}</h1>
      <p class="group-show-info">
        主催者:{{$group->user->name}}/{{$group->day->format('Y年m月d日G:00から')}}/{{$group->prefName}}
      </p>
      <img src="{{ $group->image }}" class="group-show-image" alt="">
      <div class="group-show-content">{{$group->content}}</div>
    </div>
    @if (Auth::id()===$group->user_id)
    <div class="group-show-btn">
      <form action="{{ url('group/'.$group->id) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="big-btn">
          イベント削除
        </button>
      </form>
      <div>
        <a class="big-btn" href="{{ url('group/'.$group->id.'/edit') }}">イベント編集</a>
      </div>
    </div>
    @endif
  </div>
  <div class="group-comment">
  @foreach ($comments as $comment)
    <div class="one-comment">
      <p class="comment-info">{{$comment->user->name}}/{{$comment->created_at}}</p>
      <p class="comment-content">{{$comment->content}}</p>
    </div>
  @endforeach
  <div class="comment-form">
    <form action="{{ url('/group/'.$group->id.'/comment') }}" method="post" enctype="multipart/form-data">
      @csrf
      @method('POST')
      <div class="comment-form-big">
        <label for="content" class="comment-form-label"></label>
        <div class="comment-form-text">
          <textarea id="content" class="comment-form-control-textarea" name="content" placeholder="イベントの主催者に連絡しよう" required></textarea>
          @error('image')
          <span class="error-message" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
      <div class="comment-submit">
        <button type="submit" name="new-group" class="big-btn">
          投稿する
        </button>
      </div>
    </form>
  </div>
</div>

@endsection