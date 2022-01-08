@extends('layouts.auth')

@section('main')
<div class="index__wrap">
  <h1 class="title">Which permissions do you want to access?</h1>
  <div class="index__outer" >
    <div class="index__item" >
      <a href="/user/login" class="index__btn" >
        <h2 class="index__ttl">User Authentication</h2>
        <i class="fas fa-chevron-right"></i>
      </a>
    </div>
    <div class="index__item" >
      <a href="/admin/login" class="index__btn" >
        <h2 class="index__ttl">Admin Authentication</h2>
        <i class="fas fa-chevron-right"></i>
      </a>
    </div>
    <div class="index__item" >
      <a href="/system/login" class="index__btn" >
        <h2 class="index__ttl">System Authentication</h2>
        <i class="fas fa-chevron-right"></i>
      </a>
    </div>
  </div>
</div>
@endsection