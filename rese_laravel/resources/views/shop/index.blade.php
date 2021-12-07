<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  </head>
  <body>
    <header>
      <div class="hamburger">
        <nav class="nav" id="nav">
          @if (empty(Auth::id()))
              <ul>
                <li><a class="menu__item" href="/">HOME</a></li>
                <li><a class="menu__item" href="/register">Register</a></li>
                <li><a class="menu__item" href="/login">Login</a></li>
              </ul>
          @else
              <ul>
                <li><a class="menu__item" href="/">HOME</a></li>
                <li>
                  <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-jet-dropdown-link href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                      this.closest('form').submit();">
                      {{ __('Log Out') }}
                    </x-jet-dropdown-link>
                  </form>
                </li>
                <li><a class="menu__item" href="/mypage">MyPage</a></li>
              </ul>
          @endif
        </nav>
      <div class="menu" id="menu">
        <span class="menu__line--top"></span>
        <span class="menu__line--middle"></span>
        <span class="menu__line--bottom"></span>
      </div>
    </div>
    <div class="header">
      <h1 class="app__ttl">Rese</h1>
      <div class="header_right search_shop">
        <select name="genre" id="">
          <option value='' disabled selected style='display:none;'>All Genres</option>
          <option value="">イタリアン</option>
          <option value="">居酒屋</option>
          <option value="">寿司</option>
          <option value="">焼肉</option>
          <option value="">ラーメン</option>
        </select>
        <select name="area" id="">
          <option value='' disabled selected style='display:none;'>All Area</option>
          <option value="">東京都</option>
          <option value="">大阪府</option>
          <option value="">福岡県</option>
        </select>
        <input type="text" name="shop_name" id="">
      </div>
    </div>
  </header>

    <main>
      <div class="shops">
      @foreach ($shops as $item)
        <div class="shop_wrap">
          <img src="{{ $item->img_url }}" alt="shop_img" class="shop_img" >
          <div class="shop_item">
            <h2 class="shop_name">{{ $item->name }}</h2>
            <div class="category_items">
              <h3 class="category_txt">#{{ $item->areas->name }}</h3>
              <h3 class="category_txt">#{{ $item->genres->name }}</h3>
            </div>
            <div class="shop_detail">
              <a type="submit" class="detail_btn" href="/shop/{{$item->id}}">詳しく見る</a>
              @if (empty(Auth::id()))
                <a href="/login"><i class="far fa-heart heart_img"></i></a>
              @else
                @if($likes[$loop->iteration]==1)
                  <a href="/unlike/{{$item->id}}"><i class="fas fa-heart heart_img"></i></a>
                @else
                  <a href="/like/{{$item->id}}"><i class="far fa-heart heart_img"></i></a>
                @endif
              @endif
            </div>
          </div>
        </div>
      @endforeach
      </div>
    </main>
  </body>
</html>

<script>
const target = document.getElementById("menu");
target.addEventListener('click', () => {
  target.classList.toggle('open');
  const nav = document.getElementById("nav");
  nav.classList.toggle('in');
});
</script>


<style>

header {
  display: flex;
  justify-content: space-between;
  width: 100%;
  margin-top: 10px;
}

.hamburger {
  width: 5%;
}
.hamburger a{
  text-decoration: none;
  color: #55bbbb;
  font-size: 35px;
}
.nav{
  position: absolute;
  height: 100vh;
  width: 100%;
  left: -100%;
  background: #eee;
  transition: .7s;
  text-align: center;
}
.nav ul{
  padding-top: 80px;
}
.nav ul li{
  list-style-type: none;
  margin-top: 50px;
}
.menu {
  display: inline-block;
  width: 36px;
  height: 32px;
  cursor: pointer;
  position: relative;
  left: 30px;
  top: 3.5%;
}
.menu__line--top,
.menu__line--middle,
.menu__line--bottom {
  display: inline-block;
  width: 100%;
  height: 4px;
  background-color: #55BBBB;
  position: absolute;
  transition: 0.5s;
}
.menu__line--top {
  top: 0;
}
.menu__line--middle {
  top: 14px;
}
.menu__line--bottom {
  bottom: 0;
}
.menu.open span:nth-of-type(1) {
  top: 14px;
  transform: rotate(45deg);
}
.menu.open span:nth-of-type(2) {
  opacity: 0;
}
.menu.open span:nth-of-type(3) {
  top: 14px;
  transform: rotate(-45deg);
}

.in{
  transform: translateX(100%);
}


.header {
  display: flex;
  justify-content: space-between;
  width: 95%;
  margin: 5px 0;
}

.app__ttl {
  vertical-align: middle;
  color: #55bbbb;
  font-size: 35px;
}

.header_right {
  display: flex;
  margin-right: 100px;
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
  padding: 5px 0 10px 0;
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
  color: pink;
}


.detail_btn {
  padding: 10px 20px;
  border: none;
  border-radius: 10px;
  background-color: #55BBBB;
  color: azure;
}

</style>