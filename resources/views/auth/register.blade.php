<!DOCTYPE html>
<html lang="kr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="stylesheet" href="{{ asset('css/signup.css') }}">
  <link rel="stylesheet" href="{{ asset('css/tools/button.css') }}">
  <link rel="stylesheet" href="{{ asset('css/layouts/layout.css') }}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <title>{{ config('app.name', 'Laravel') }}</title>

</head>
<body class="text-center">
  <form class="form-signin" action="{{ route('register') }}" method="POST">
    @csrf
        
  <h1 class="display-2 mb-4">회원 가입{{$errors}}</h1>
    <hr/>
    <h1 class="h3 mb-3 font-weight-normal">Please sign up</h1>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required>
    @if ($errors->has('name'))
      <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('name') }}</strong>
      </span>
    @endif

    <label for="password" class="sr-only">Password</label>
    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
    
    <label for="password-confirm" class="sr-only">Confirm Password</label>
    <input type="password" id="password-confirm" name="password_confirmation" class="form-control" placeholder="{{ __('Confirm Password') }}" required>

    <label for="inputText" class="sr-only">Nickname</label>
    <input type="text" id="name" name="name" class="form-control" placeholder="Name" required autofocus>
    @if ($errors->has('name'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('name') }}</strong>
      </span>
    @endif
    <button class="btn btn-lg btn-danger btn-block" type="submit">회원 가입</button>
    <hr />
    <h1 class="h4 mb-3 font-weight-normal">이미 계정이 있으신가요?</h1>
    <a class="btn btn-link btn-block" href="{{ route('login') }}">로그인 페이지로</a>
    <p class="mt-5 mb-3 text-muted">JEONG Copyright© 2018.09.28 ~ </p>
  </form>
</body>

</html>