@extends('layouts.app')

@section('main')
<h2>仮登録</h2>

<form action="/premail" method="post">
  @csrf
  <label for="">Email</label>
  <input type="email" name="email">
  <label for="">Password</label>
  <input id="password" type="password" name="password" required autocomplete="new-password" >
  <label for="">Password Confirmation</label>
  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
  <input type="submit" value="仮登録">
</form>
@endsection