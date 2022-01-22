<header class="header">
  <div class="header__wrap">
    <div class="header__left" >
      <div class="hamburger">
        <nav class="nav" id="nav">
          <ul>
            @if (!Auth::check()) 
              <li><a href="/home">Home</a></li>
              <li><a href="/home">Home</a></li>
              <li><a href="/preregister">Registration</a></li>
              <li><a href="/user/login">Login</a></li>
            @else
              <li><a href="/shop">Hello, {{Auth::user()->name}}さん</a></li>
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
  </div>
</header>

