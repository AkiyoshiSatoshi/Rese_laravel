<h1>本登録</h1>

<form action="/register/store" method="post">
  @csrf
  <label for="name">Name</label>
  <input type="text" name="name" >
  <input type="email" name="email">
  <input type="password" name="password">
  <input type="hidden" name="email_token" value="{{$user->email_verify_token}}">
  <input type="submit" value="本登録">
</form>