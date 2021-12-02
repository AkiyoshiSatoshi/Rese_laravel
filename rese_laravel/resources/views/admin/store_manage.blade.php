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
    <div class="mail-send__wrap">
      <h2>管理者管理画面</h2>
      <div>
        
      </div>
    </div>
  </main>
</body>
</html>