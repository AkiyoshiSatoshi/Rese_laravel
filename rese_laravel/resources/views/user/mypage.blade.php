@extends('layouts.app')

@section('main')
<div class="mypage" >
  <div class="mypage__left">
    <h2 class="mypage__ttl" >現在の予約状況</h2>
    <div class="reserve__wrap">
      @foreach ($reservations as $index => $item)
      <div class="reserve__card" >
        <div class="reserve__item_head" >
          <i class="far fa-clock reserve__icon theme"></i>
          <p class="theme" >予約{{$index+1}}</p>
          <a href="/user/reserve/change/{{$item->id}}" class="reserve__change_txt">予約変更<i class="fas fa-history reserve__icon"></i></a>
          <a href="/user/reserve/{{$item->shop_id}}" class="delete__btn">予約削除<i class="far fa-times-circle reserve__icon theme"></i></a>
        </div>
        <div class="reserve__item">
          <img src="{{ asset('/storage/img/shop/' . $item->shops->img_url ) }}" alt="" width="150px">
          <table class="reserve__table">
            <tr>
              <td class="reserve__name" >店舗名</td>
              <td class="reserved__form" >{{ $item->shops->name }}</td>
            </tr>
            <tr>
              <td class="reserve__name" >日付</td>
              <td class="reserved__form" >
                <?php 
                  $date = date('Y/m/d', strtotime($item->start_at));
                  echo $date;
                ?>
              </td>
            </tr>
            <tr>
              <td class="reserve__name" >時間</td>
              <td class="reserved__form" >
                <?php 
                  $time = date('H:i', strtotime($item->start_at));
                  echo $time;
                ?>
              </td>
            </tr>
            <tr>
              <td class="reserve__name" >人数</td>
              <td class="reserved__form" >
                {{ $item->num_of_users }}<span>人</span>
              </td>
            </tr>
          </table>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  <div class="mypage__right">
    <h2 class="mypage__ttl" >{{Auth::user()->name }}さんがいいねしたお店</h2>
    <div class="like__wrap">
      @foreach ($likes as $like)
        @if(!empty($like))
          <div class="shop__wrap">
            <img src="{{ asset('/storage/img/shop/' . $like->shop->img_url ) }}" alt="shop_img" class="shop__img" >
            <div class="shop__item">
              <h3 class="shop_name">{{ $like->shop->name }}</h3>
              <div class="category_items">
                <p class="category_txt">#{{ $like->shop->areas->name }}</p>
                <p class="category_txt">#{{ $like->shop->genres->name }}</p>
              </div>
            </div>
            <div class="shop_detail">
                <a type="submit" class="detail_btn" href="/shop/{{$like->shop_id}}" >詳しく見る</a>
                <a href="/user/unlike/{{$like->shop_id}}"><i class="fas fa-heart heart_img"></i></a>
              </div>
          </div>
        @endif
      @endforeach
    </div>
  </div>
</div>
@endsection
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">