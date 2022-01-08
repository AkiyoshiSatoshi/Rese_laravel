@extends('layouts.auth')

@section('main')
<div class="login__wrap">
  <h1 class="login__ttl" >User Login</h1>
  <div class="login__form" >
    <form method="POST" action="/user/login">
      @csrf
      <div class="login__input" >
        <input class="input__form" id="email"  type="email" name="email" :value="old('email')" required autofocus placeholder="Email" />
      </div>
      <div class="login__input">
        <input class="input__form" id="password"  type="password" name="password" required autocomplete="current-password" placeholder="Password" />
      </div>
      <div class="">
        <button class="login__btn">Log in</button>
      </div>
    </form>
  </div>
</div>
@endsection