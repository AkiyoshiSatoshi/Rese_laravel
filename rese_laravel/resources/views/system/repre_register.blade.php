<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
</head>
<body>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <x-jet-dropdown-link href="{{ route('logout') }}"
            onclick="event.preventDefault();
            this.closest('form').submit();">
            {{ __('Log Out') }}
        </x-jet-dropdown-link>
    </form>
  <div class="register__wrap" >
    <h1 class="register__ttl" >店舗代表者新規登録ページ</h1>
    <div class="register__form">
      <form action="/system/post" method="post">
          @csrf
          <div class="register__input" >
            <input class="input__form" id="name" type="text" name="name" required autocomplete="name" placeholder="Name" />
          </div>
          <div class="register__input" >
              <input class="input__form" id="email"  type="email" name="email" :value="old('email')" required autofocus placeholder="Email" />
          </div>
          <div class="register__input" >
              <input class="input__form" id="password"  type="password" name="password" required autocomplete="new-password" placeholder="Password" />
          </div>
          <button class="register__btn" >Administration Add</button>
      </form>
    </div>
  </div>
</body>
</html>

<style>
body {
    background-color: #55bbbb;
  }

  .register__wrap {
    width: 50%;
    margin: 100px auto;
    background-color: #ffffff;
    text-align: center;
    border-radius: 10px;
  }

  .register__ttl {
    padding-top: 10px; 
    color: #55bbbb;
  }
  .register__input {
    margin-bottom: 20px;
  }

  .input__form {
    width: 80%;
    font-size: 28px;
    border: 1px solid #cdcece;
  }
  .register__btn {
    font-size: 28px;
    margin-bottom: 20px;
    background-color: #55bbbb;
    color: #ffffff;
    padding: 10px 50px;
    border: none;
    border-radius: 10px;
  }
</style>