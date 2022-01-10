<header class="header">
  <div class="header__wrap">
    <div class="header__left">
      <div class="hamburger">
        <nav class="nav" id="nav">
          <ul>
            @if (!Auth::check()) 
              <li><a href="/home">Home</a></li>
              <li><a href="/preregister">Registration</a></li>
              <li><a href="/user/login">Login</a></li>
            @else
              <li><a href="/shop">Home</a></li>
              <li><a href="/logout">Logout</a></li>
              <li><a href="/user/mypage">Mypage</a></li>
            @endif
          </ul>
        </nav>
        <div class="menu" id="menu">
          <span class="menu__line--top"></span>
          <span class="menu__line--middle"></span>
          <span class="menu__line--bottom"></span>
        </div>
      </div>
      <h1 class="header__ttl">Rese</h1>
    </div>
    <div class="header__right">
      <form action="/shop/search" method="get">
        <div class="search__wrap">
          <div class="select__item" >
            <select name="area" id="" class="select__input" >
              <option value="">All Area</option>
              <option value="1">東京</option>
              <option value="2">大阪</option>
              <option value="3">福岡</option>
            </select>
            <select name="genre" id="" class="select__input" >
              <option value="">All Genres</option>
              <option value="1">居酒屋</option>
              <option value="2">寿司</option>
              <option value="3">イタリアン</option>
              <option value="4">ラーメン</option>
              <option value="5">焼肉</option>
            </select>
          </div>
          <div>
            <input type="text" name="name" class="search__input" >
          </div>
          <button class="search__btn">Search</button>
        </div>
      </form>
    </div>
  </div>
</header>