@section('header')
<header>
      <div class="hamburger">
        <nav class="nav" id="nav">
          @if (empty(Auth::id()))
              <ul>
                <li><a class="menu__item" href="/">HOME</a></li>
                <li><a class="menu__item" href="/preregister">Register</a></li>
                <li><a class="menu__item" href="/login">Login</a></li>
              </ul>
          @else
              <ul>
                <li><a class="menu__item" href="/shop">HOME</a></li>
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
  </header>
@endsection
