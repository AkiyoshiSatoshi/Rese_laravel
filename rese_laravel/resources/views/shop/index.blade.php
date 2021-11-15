<html>
  <head>
    <meta charset="utf-8">
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
      {{-- <p>こんにちは！ {{ Auth::user()->name }} です</p> --}}
    </header>

    <main>
      <h2>Shop List</h2>
      <div class="shops">
      @foreach ($tests as $item)
        <div class="shop_wrap">
          <img src="{{ $item->img_url }}" alt="shop_img" class="shop_img" >
          <div class="shop_item">
            <h3 class="shop_name">{{ $item->name }}</h3>
            <div class="category_items">
              <p class="category_txt">#{{ $item->areas->name }}</p>
              <p class="category_txt">#{{ $item->genres->name }}</p>
            </div>
            <div class="shop_detail">
              <form action="/shop/{{$item->id}}" method="get">
                <button type="submit" class="detail_btn">詳しく見る</button>
              </form>
              <img method="get" action="/like" src="/img/Orion_love.svg" alt="img_heart" class="heart_img">
            </div>
          </div>
          
        </div>
      @endforeach
      </div>
    </main>
  </body>
</html>

<style>

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
  width: 10%;
}

.detail_btn {
  padding: 10px 20px;
  border: none;
  border-radius: 10px;
  background-color: blue;
  color: white;

}

</style>