@extends('layouts.auth')

@section('main')
<div class="login__wrap">

  <h2 class="login__ttl" >Temporary registration</h2>

  <form action="/premail" method="post">
    @csrf
    <div class="input">
      <input class="input__form" type="email" name="email" required autofocus placeholder="Email" >
    </div>
    <div class="input">
      <input class="input__form"  id="password" type="password" name="password" required autocomplete="new-password" placeholder="Password" >
    </div>
    <div class="input">
      <input class="input__form" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Password Confirmation" >
    </div>
    <button class="login__btn" >Temporary Registration</button>
  </form>
  <div class="btn__wrap">
    <p>Already have an account? <a href="/user/login" class="signIn__txt">Log-In&#x25B7;</a></p>
  </div>
</div>
@endsection