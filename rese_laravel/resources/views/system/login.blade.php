<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Rese</title>
</head>
<body>
  <div>
    <h1>管理者ログイン画面</h1>
    <form action="/system/login" method="post">
      @csrf
      <label for="email">Email</label>
      <input type="email" name="email">
      <label for="password">Password</label>
      <input type="password" name="password">
      <input type="submit" value="管理者ログイン">
    </form>
  </div>
</body>
</html>