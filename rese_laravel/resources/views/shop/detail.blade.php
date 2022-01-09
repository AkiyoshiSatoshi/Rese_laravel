@extends('layouts.app')

@section('main')
      <div class="shop_detail">
        <div class="flex shop__card">
          @foreach ($shops as $shop)
          <div class="shop__header">
            <div class="icon">
              <a href="/shop"><i class="fas fa-arrow-alt-circle-left icon__item "></i></a>
            </div>
            <h3 class="shop__ttl">{{ $shop->name }}</h3>
          </div>
          <div class="shop__box">
            <div class="item__left">
              <img src="{{ asset('/storage/img/shop/' . $shop->img_url ) }}" alt="shop_img" class="shop_img">
              <div class="category_items">
                <p class="category_txt">#{{ $shop->areas->name }}</p>
                <p class="category_txt">#{{ $shop->genres->name }}</p>
              </div>
              <p class="shop__pickup">{{ $shop->description }}</p>
            </div>
          </div>
          @endforeach
        </div>
        @if (empty(Auth::user()))
          <div class=" auth__card flex">
            <h3 class="reserve__ttl msg">ログインまたは、新規登録をすると予約できます。</h3>
            <div class="auth__card" >
              <a href="/login">Login</a>
              <a href="/register">Register</a>
            </div>
          </div>
        @else
          <form action="/user/reserve" method="POST" class="reserve__form flex" >
            <div class="reserve__card">
              <h3 class="reserve__ttl">予約</h3>
              <div class="reserve__item">
                @csrf
                <ul class="form__card">
                  <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" id="">
                  @foreach ($shops as $shop)
                  <input type="hidden" name="shop_id" value="{{ $shop->id }}" id="">
                  @endforeach
                  <li class="form__item" >
                    <input type="date" class="reserve__input" name="date" id="DateInput">
                  </li>
                  <li class="form__item" >
                    <select name="time" class="reserve__select" id="TimeInput">
                      <option value='' disabled selected class="time">Time</option>
                      <option value="10:00">10:00</option>
                      <option value="11:00">11:00</option>
                      <option value="12:00">12:00</option>
                      <option value="13:00">13:00</option>
                      <option value="14:00">14:00</option>
                      <option value="15:00">15:00</option>
                      <option value="18:00">18:00</option>
                      <option value="19:00">19:00</option>
                      <option value="20:00">20:00</option>
                      <option value="21:00">21:00</option>
                      <option value="22:00">22:00</option>
                      <option value="23:00">23:00</option>
                    </select>
                  </li>
                  <li class="form__item" >
                    <select name="number" class="reserve__select" id="NumInput" >
                      <option value='' disabled selected class="number">Number</option>
                      <option value="1">1人</option>
                      <option value="2">2人</option>
                      <option value="3">3人</option>
                      <option value="4">4人</option>
                      <option value="5">5人</option>
                      <option value="6">6人</option>
                      <option value="7">7人</option>
                      <option value="8">8人</option>
                      <option value="9">9人</option>
                      <option value="10">10人</option>
                    </select>
                  </li>
                </ul>
                <div class="reserve__check">
                  <table class="reserve__table">
                    <tr>
                      <td class="reserve__name">Shop</td>
                      @foreach ($shops as $shop)
                        <td class="reserving__form">{{ $shop->name }}</td>
                      @endforeach
                    </tr>
                    <tr>
                      <td class="reserve__name">Date</td>
                      <td id="Date" class="reserving__form">日付を入力してください</td>
                    </tr>
                    <tr>
                      <td class="reserve__name">Time</td>
                      <td id="Time" class="reserving__form">時間を入力してください</td>
                    </tr>
                    <tr>
                      <td class="reserve__name">Number</td>
                      <td id="Number" class="reserving__form num__form">人数を入力してください。</td>
                    </tr>
                  </table>
                </div>
              </div>
              <input type="submit" class="reserve__btn" value="送信">
            </div>
          </form>
        @endif
      </div>
      @endsection

<script src="{{ asset('js/change.js') }}"></script>

<link rel="stylesheet" href="{{ asset('css/detail.css') }}">