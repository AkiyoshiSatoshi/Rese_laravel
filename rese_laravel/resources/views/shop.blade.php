<html>
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <header>
      <a href="">照会処理</a><br>
      <a href="">更新処理</a>
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
      <p>こんにちは！{{ Auth::user()->email }}です</p>
    </main>
  </body>
</html>