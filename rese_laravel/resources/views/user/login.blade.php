@extends('layouts.auth')

@section('main')
<div class="login__wrap">
  <h1 class="login__ttl" >User Login</h1>
  <div class="login__form" >
    <form method="POST" action="/user/login">
      @csrf
      <div class="input" >
        <input class="input__form" id="email"  type="email" name="email" :value="old('email')" required autofocus placeholder="Email" />
      </div>
      <div class="input">
        <input class="input__form" id="password"  type="password" name="password" required autocomplete="current-password" placeholder="Password" />
      </div>
      <div class="">
        <button class="login__btn">Log in</button>
      </div>
    </form>
    <div class="btn__wrap">
      <a href="/preregister" class="account__btn" >Create Account</a>
    </div>
  </div>
</div>
@endsection