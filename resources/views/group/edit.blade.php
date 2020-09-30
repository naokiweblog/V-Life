@extends('layouts.v_life')
@section('header')
  <div class="header-content">
    <h1 class="app-name">
      <a href="{{ url('/') }}" class="app-name-btn">V-Life</a>
    </h1>
    @if (Auth::check())
    <h1>
      <a class="header-register" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
        サインアウト
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
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
<div class="group-form card-box-create-group">
  <form action="{{ url('group/'.$group->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="group-form-one">
      <label for="name" class="left">イベント名</label>
      <div class="right">
        <input id="name" type="text" class="form-control" name="name" value="{{ $group->name }}" required autofocus>
        @error('name')
        <span class="error-message" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      </div>
    <div class="group-form-one">
      <label for="day" class="left">日時(15分単位)</label>
      <div class="right">
        <input id="day" type="datetime-local" class="form-control" name="day" step="900" value="{{str_replace(' ', 'T', $group->day)}}" required>
        @error('day')
        <span class="error-message" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>
    <div class="group-form-one">
      <label for="pref_id" class="left">場所</label>
      <div class="right">
        <select id="pref_id" class="form-control" name="pref_id" required>
          @foreach(config('pref') as $index => $name)
            @if ($group->pref_id === $index)
            <option value="{{ $index }}" selected>{{$name}}</option>
            @else
            <option value="{{ $index }}">{{$name}}</option>
            @endif
          @endforeach
        </select>
        @error('pref_id')
        <span class="error-message" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>
    <div class="group-form-one">
      <label for="image" class="left">イメージ画像(任意)</label>
      <div class="right">
        <div class="form-control image-form-control">
          <input id="image" type="file" class="image-form" name="image">
        </div>
        @error('image')
        <span class="error-message" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>
    <div class="group-form-big">
      <label for="content" class="left">イベント詳細など</label>
      <div class="right">
        <textarea id="content" class="form-control-textarea" name="content" placeholder="活動内容・場所・雰囲気などの詳細" required>{{ $group->content }}</textarea>
        @error('image')
        <span class="error-message" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>
    <div class="group-submit">
      <button type="submit" name="new-group" class="big-btn">
        編集内容登録
      </button>
    </div>
  </form>
</div>
@endsection