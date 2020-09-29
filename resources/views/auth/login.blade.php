@extends('layouts.v_life')

@section('header')
  <div class="header-content">
    <h1 class="app-name">
      <a href="/" class="app-name-btn">V-Life</a>
    </h1>
    <h1>
      <a class="header-register" href="register">サインアップ</a>
    </h1>
  </div>
@endsection

@section('container')
<div class="container">
    <div class="card-box-login">
        <div class="card-header">サインイン</div>
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">メールアドレス</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">パスワード</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            サインインしたままにする
                        </label>
                    </div>
                </div>
                <div class="register-submit">
                    <button type="submit" class="big-btn">
                        サインイン
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection