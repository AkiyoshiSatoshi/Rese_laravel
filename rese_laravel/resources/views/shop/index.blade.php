<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  </head>
  <body>
    <header class="header">
      <div class="header_left">
        <h1>RESE</h1>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <x-jet-dropdown-link href="{{ route('logout') }}"
            onclick="event.preventDefault();
            this.closest('form').submit();">
            {{ __('Log Out') }}
          </x-jet-dropdown-link>
        </form>
      </div>
      <div class="header_right search_shop">
        <select name="genre" id="">
          <option value="">イタリアン</option>
          <option value="">居酒屋</option>
          <option value="">寿司</option>
          <option value="">焼肉</option>
          <option value="">ラーメン</option>
        </select>
        <select name="area" id="">
          <option value="">東京都</option>
          <option value="">大阪府</option>
          <option value="">福岡県</option>
        </select>
        <div>
          <input type="text" name="shop_name" id="">
        </div>
      </div>
      {{-- <p>こんにちは！ {{ Auth::user()->name }} です</p> --}}
    </header>

    <main>
      <h2>Shop List</h2>
      <div class="shops">
      @foreach ($shops as $item)
        <div class="shop_wrap">
          <img src="{{ $item->img_url }}" alt="shop_img" class="shop_img" >
          <div class="shop_item">
            <h3 class="shop_name">{{ $item->name }}</h3>
            <div class="category_items">
              <p class="category_txt">#{{ $item->areas->name }}</p>
              <p class="category_txt">#{{ $item->genres->name }}</p>
            </div>
            <div class="shop_detail">
              <a type="submit" class="detail_btn" href="/shop/{{$item->id}}">詳しく見る</a>
              @if($likes[$loop->iteration]==1)
                <a href="/unlike/{{$item->id}}"><i class="fas fa-heart heart_img"></i></a>
              @else
                <a href="/like/{{$item->id}}"><i class="far fa-heart heart_img"></i></a>
              @endif
            </div>
          </div>
        </div>
      @endforeach
      </div>
    </main>
  </body>
</html>

<style>

.header {
  display: flex;
  justify-content: space-between;
  margin: 0 10%;
}

.header_left {

}

.header_right {
  display: flex;
}
.shops {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-around;
}

.shop_wrap {
  width: 20%;
  margin: 20px 10px;
  border-radius: 10px;
  background: #ffffff;
  box-shadow:  5px 5px 22px #808080,
              -5px -5px 22px #ffffff;
}

.shop_item {
  padding: 10px 20px;
}

.shop_name {
  font-size: 24px;
  margin-bottom: 10px;
}


.shop_img {
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

.heart_img {
  font-size: 35px;
}
.fas {
  color: pink;
}

.detail_btn {
  padding: 10px 20px;
  border: none;
  border-radius: 10px;
  background-color: blue;
  color: azure;
}

</style>