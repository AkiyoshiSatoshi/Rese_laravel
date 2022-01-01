
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  </head>
  <body>
    <header>
      <h1>RESE</h1>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <x-jet-dropdown-link href="{{ route('logout') }}"
          onclick="event.preventDefault();
          this.closest('form').submit();">
          <i class="fas fa-sign-out-alt icon "></i>
        </x-jet-dropdown-link>
      </form>
    </header>

    <main>
      <div class="shop_detail">
        <div class="flex shop__card">
          @foreach ($shops as $shop)
          <div class="shop__header">
            <a href="/" class="arrow"><</a>
            <h3 class="shop__ttl">{{ $shop->name }}</h3>
          </div>
          <div class="shop__box">
            <div class="item__left">
              <img src="http://127.0.0.1:8000/storage/img/shop/{{ $shop->img_url }}" alt="shop_img" class="shop_img">
              <div class="category_items">
                <p class="category_txt">#{{ $shop->areas->name }}</p>
                <p class="category_txt">#{{ $shop->genres->name }}</p>
              </div>
              <p class="shop__pickup">{{ $shop->description }}</p>
            </div>
          </div>
          @endforeach
        </div>
        @if (empty(Auth::user()))
          <div class=" auth__card flex">
            <h3 class="reserve__ttl msg">ログインまたは、新規登録をすると予約できます。</h3>
            <div class="auth__card" >
              <a href="/login">Login</a>
              <a href="/register">Register</a>
            </div>
          </div>
        @else
          <form action="/user/reserve" method="get" class="reserve__form flex" >
            <div class="reserve__card">
              <h3 class="reserve__ttl">予約</h3>
              <div class="reserve__item">
                @csrf
                <ul class="form__card">
                  <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" id="">
                  @foreach ($shops as $shop)
                  <input type="hidden" name="shop_id" value="{{ $shop->id }}" id="">
                  @endforeach
                  <li class="form__item" >
                    <input type="date" class="reserve__input" name="date" id="DateInput">
                  </li>
                  <li class="form__item" >
                    <select name="time" class="reserve__select" id="TimeInput">
                      <option value='' disabled selected class="time">Time</option>
                      <option value="10:00">10:00</option>
                      <option value="11:00">11:00</option>
                      <option value="12:00">12:00</option>
                      <option value="13:00">13:00</option>
                      <option value="14:00">14:00</option>
                      <option value="15:00">15:00</option>
                      <option value="18:00">18:00</option>
                      <option value="19:00">19:00</option>
                      <option value="20:00">20:00</option>
                      <option value="21:00">21:00</option>
                      <option value="22:00">22:00</option>
                      <option value="23:00">23:00</option>
                    </select>
                  </li>
                  <li class="form__item" >
                    <select name="number" class="reserve__select" id="NumInput" >
                      <option value='' disabled selected class="number">Number</option>
                      <option value="1">1人</option>
                      <option value="2">2人</option>
                      <option value="3">3人</option>
                      <option value="4">4人</option>
                      <option value="5">5人</option>
                      <option value="6">6人</option>
                      <option value="7">7人</option>
                      <option value="8">8人</option>
                      <option value="9">9人</option>
                      <option value="10">10人</option>
                    </select>
                  </li>
                </ul>
                <div class="reserve__check">
                  <table class="reserve__table">
                    <tr>
                      <td class="reserve__name">Shop</td>
                      @foreach ($shops as $shop)
                        <td class="reserving__form">{{ $shop->name }}</td>
                      @endforeach
                    </tr>
                    <tr>
                      <td class="reserve__name">Date</td>
                      <td id="Date" class="reserving__form">日付を入力してください</td>
                    </tr>
                    <tr>
                      <td class="reserve__name">Time</td>
                      <td id="Time" class="reserving__form">時間を入力してください</td>
                    </tr>
                    <tr>
                      <td class="reserve__name">Number</td>
                      <td id="Number" class="reserving__form num__form">人数を入力してください。</td>
                    </tr>
                  </table>
                </div>
              </div>
              <input type="submit" class="reserve__btn" value="送信">
            </div>
          </form>
        @endif
      </div>
    </main>
  </body>
</html>

<script>
  const dateInput = document.getElementById('DateInput');
  const timeInput = document.getElementById('TimeInput');
  const numInput = document.getElementById('NumInput');
  
  const Date = document.getElementById('Date');
  const Time = document.getElementById('Time');
  const number = document.getElementById('Number');

  dateInput.addEventListener('change', function () {
    Date.textContent = dateInput.value;
  });
  timeInput.addEventListener('change', function () {
    Time.textContent = timeInput.value;
  });
  numInput.addEventListener('change', function () {
    number.textContent = numInput.value + "人";
  });
</script>

<style>


.icon {
  color: #55BBBB;
  font-size: 35px;
  text-decoration: none;
}


.arrow {
  color: black;
  text-decoration: none;
  border-radius: 10px;
  font-size: 25px;
  vertical-align: top;
  padding: 1px 15px 10px 10px;
  background: #ffffff;
  box-shadow:  7px 7px 14px #5a5a5a, -7px -7px 14px #ffffff;
}

.flex {
  width: 45%;
  justify-content: space-around;
}

.shop_detail {
  margin-top: 50px;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-around;
}

.shop__header {
  display: flex;
}
.shop__ttl {
  margin-left: 20px;
  font-size: 30px;
  padding-top: 5px;
  vertical-align: middle;
}

.category_items {
  padding: 20px 0;
  display: flex;
}

.shop__pickup {
  line-height: 30px;
}

.shop_img {
  width: 100%;
}

.shop__box {
  margin-top: 20px;
}

.reserve__card {
  background-color: #55BBBB;
  margin: 50px auto;
  border-radius: 10px; 
  
}

.reserve__ttl {
  text-align: left;
  color: #ffffff;
  padding: 20px 50px;
}


.auth__card {
  background-color: #55BBBB;
  height: 50vh;
  text-align: center;
}

.auth__card a {
  color: #ffffff;
}

.reserve__item {
  width: 100%;
}

.form__card {
  margin: 0 auto;
}

.form__item {
  list-style: none;
  margin: 10px 0;
  padding-left: 30px;
}

.reserve__table {
  width: 70%;
  margin: 0 auto;
  background-color: #24C5C5;
  padding: 50px 30px;
  border-radius: 20px;
}

.reserve__input {
  border: none;
  width: 50%;
  padding: 5px 0;
}

.reserve__select {
  border: none;
  width: 80%;
  padding: 5px 0;
}

.reserve__name {
  width: 20%;
  text-align: right;
  color: #ffffff;
}

.reserving__form { 
  width: 50%;
  text-align: center;
  color: #ffffff;
}


.reserve__btn {
  width: 100%;
  border: none;
  background-color: #078787;
  border-radius: 0 0 10px 10px;
  color: #ffffff;
  margin-top: 200px; 
  padding:10px 0; 
}

.time {
  display:none;
}

.number {
  display:none;
}

</style>