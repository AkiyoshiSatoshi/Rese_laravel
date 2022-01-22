@extends('layouts.auth')

@section('main')
<h1 class="title">Main registration</h1>
<div>
  <form action="/register/store" method="post">
    @csrf
    <input type="text" name="name" placeholder="Name" >
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <input type="hidden" name="email_token" value="{{$user->email_verify_token}}">
    <input type="submit" value="本登録">
  </form>
</div>
@endsection