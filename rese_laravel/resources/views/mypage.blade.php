
<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
</head>
<body>
  <header>
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <x-jet-dropdown-link href="{{ route('logout') }}"
        onclick="event.preventDefault();
        this.closest('form').submit();">
        {{ __('Log Out') }}
      </x-jet-dropdown-link>
    </form>
  </header>

  <main>
    <p>mypage</p>
    <div class="mypage" >
      <div class="mypage__left">
        <h2>現在の予約状況</h2>
        <div class="reserve__wrap">
          @foreach ($reservations as $index => $item)
          <div class="reserve__card" >
            <div class="reserve__item_head" >
              <i class="far fa-clock reserve__icon theme"></i>
              <p class="theme" >予約{{$index+1}}</p>
              <a href="/reserve/{{$item->shop_id}}" class="delete__btn"><i class="far fa-times-circle reserve__icon theme"></i></a>
            </div>
            <div class="reserve__item">
              <table>
                <tr>
                  <td>店舗名</td>
                  <td>{{ $item->shops->name }}</td>
                </tr>
                <tr>
                  <td>日付</td>
                  <td>
                    <?php 
                      $date = date('Y/m/d', strtotime($item->start_at));
                      echo $date;
                    ?>
                  </td>
                </tr>
                <tr>
                  <td>時間</td>
                  <td>
                    <?php 
                      $time = date('H:i', strtotime($item->start_at));
                      echo $time;
                    ?>
                  </td>
                </tr>
                <tr>
                  <td>人数</td>
                  <td>
                    <input type="number" value="{{ $item->num_of_users }}"><span>人</span>
                  </td>
                </tr>
              </table>
            </div>
          </div>
          @endforeach
        </div>
      </div>
      <div class="mypage__right">
        <h2>{{Auth::user()->name }}さんがいいねしたお店</h2>
        <div class="like__wrap">
          @foreach ($likes as $like)
            @if(!empty($like))
              <div class="shop__wrap">
                <img src="{{ $like->shop->img_url }}" alt="shop_img" class="shop__img" >
                <div class="shop__item">
                  <h3 class="shop_name">{{ $like->shop->name }}</h3>
                  <div class="category_items">
                    <p class="category_txt">#{{ $like->shop->areas->name }}</p>
                    <p class="category_txt">#{{ $like->shop->genres->name }}</p>
                  </div>
                </div>
                <div class="shop_detail">
                    <a type="submit" class="detail_btn" href="/shop/{{$like->shop_id}}" >詳しく見る</a>
                    <a href="/unlike/{{$like->shop_id}}"><i class="fas fa-heart heart_img"></i></a>
                  </div>
              </div>
            @endif
          @endforeach
        </div>
      </div>
    </div>
  </main>
</body>
</html>


<style>
input {
  border: none;
  text-align: right;
  background-color:transparent;
}

.mypage {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-around;
}

.mypage__left {
  width: 50%;
}

.mypage__left h2 {
  text-align: center;
  padding-bottom: 20px;
}

.reserve__wrap {
  display: flex;
  width: 100%;
  flex-wrap: wrap;
}

.reserve__card {
  background-color: #55BBBB;
  border-radius: 25px;
  padding: 10px 20px;
  width: 80%;
  margin: 0 auto 20px auto;
}
.theme {
  color: white;
}

.reserve__icon {
  font-size: 24px;
}

.reserve__item_head {
  display: flex;
  justify-content: space-around;
  
}

.reserve__item {
   
}

.mypage__right {
  width: 50%;
}

.mypage__right h2 {
  text-align: center;
}

.like__wrap {
  display: flex;
  flex-wrap: wrap;
}

.shop__wrap {
  width: 40%;
  margin: 20px auto;
  border-radius: 10px;
  background: #ffffff;
  box-shadow:  5px 5px 22px #808080,
              -5px -5px 22px #ffffff;
}

.shop__item {
  padding: 10px 20px;
  display: flex;
  justify-content: space-around;
}

.delete__btn {
  color: #000000;
}

.shop_name {
  font-size: 24px;
  margin-bottom: 10px;
}


.shop__img {
  width: 100%;
  border-radius: 10px 10px 0 0;
}

.category_items {
  display: flex;
}
.category_txt {
  
}

.shop_detail {
  display: flex;
  justify-content: space-around;
  width: 100%;
}

.detail_btn {
  padding: 10px 20px;
  border: none;
  border-radius: 10px;
  background-color:#55BBBB;
  color: azure;
}

.heart_img {
  font-size: 35px;
}
.fas {
  color: pink;
}

@media screen and (max-width:768px) {
  .mypage {
    display: block;
  }
}


</style>