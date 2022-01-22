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
      <h2>メール送信フォーム</h2>
      <form action="/admin/mail/send" method="post">
        @csrf
        <label for="">Title:</label>
        <input type="text" name="title">
        <br>
        <label for="">送信先:</label>
        <p>{{ $user->name }}</p>
        <input type="hidden" value="{{ $user->name }}" name="name" >
        <label for="">Email:</label>
        <p>{{ $user->email }}</p>
        <input type="hidden" value="{{ $user->email }}" name="email" >
        <label for="">Content:</label>
        <input type="text" name="content">
        <button type="submit">送信</button>
      </form>
    </div>
  </main>
</body>
</html>