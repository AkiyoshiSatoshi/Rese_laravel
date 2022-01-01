<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <title>各権限のログイン画面</title>
</head>
<body>
  <div class="login__wrap">
    <h1 class="title">Which permissions do you want to access?</h1>
    <div class="login__outer" >
      <div class="login__item" >
        <a href="/user/login" class="login__btn" >
          <h2 class="login__ttl">User Authentication</h2>
          <i class="fas fa-chevron-right"></i>
        </a>
      </div>
      <div class="login__item" >
        <a href="/admin/login" class="login__btn" >
          <h2 class="login__ttl">Admin Authentication</h2>
          <i class="fas fa-chevron-right"></i>
        </a>
      </div>
      <div class="login__item" >
        <a href="/system/login" class="login__btn" >
          <h2 class="login__ttl">System Authentication</h2>
          <i class="fas fa-chevron-right"></i>
        </a>
      </div>
    </div>
  </div>
</body>
</html>

<style>
body {
  background-color: #55bbbb;
}
.login__wrap {
  width: 100%;
  margin: 0 auto;
  padding-top: 100px;
  text-align: center;
}

.title {
  color: #ffffff;
  font-size: 40px;
}

.login__outer {
  margin-top: 10%;
  display: flex;
  justify-content: space-around;
}

.login__item {
  padding: 5px 5px;
  margin: 20px auto;
  width: 30%;
  border: 1px solid #ffffff;
  border-radius: 25px;
}

.login__btn {
  text-decoration: none;
  color: white;
  display: flex;
  justify-content: space-around;
}

.login__ttl {
  margin: auto;
}

.fas {
  padding: 30px;
  font-size: 35px;
  color: #ffffff;
}

@media screen and (max-width: 768px) {
  .login__outer {
    display: inline;
  }
  .login__item {
    width: 50%;
  }
</style>