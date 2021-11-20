
<html>
  <head>
    <meta charset="utf-8">
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
      <p>こんにちは！ {{ Auth::user()->name }} です</p>
    </header>

    <main>
      <a href="/shop"> <span><</span> お店一覧</a>
      <div class="shop_detail">
        @foreach ($shops as $shop)
        <div class="item__left">
          <p>{{ $shop->name }}</p>
          <img src="{{ $shop->img_url }}" alt="shop_img" class="shop_img">
          <div class="category_items">
            <p class="category_txt">#{{ $shop->areas->name }}</p>
            <p class="category_txt">#{{ $shop->genres->name }}</p>
          </div>
          <p>{{ $shop->description }}</p>
        </div>
        @endforeach
        <div class="item__right">
          <p>予約</p>
          <div class="reserve__item">
            <form action="/reserve" method="get">
              @csrf
              <ul class="reserve__form" >
                <li class="form__item" >
                  <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" id="">
                </li>
                @foreach ($shops as $shop)
                <li class="form__item" >
                    <input type="hidden" name="shop_id" value="{{ $shop->id }}" id="">
                </li>
                @endforeach
                <li class="form__item" >
                  <label for="">日付</label>
                  <input type="date" name="date" id="">
                </li>
                <li class="form__item" >
                  <label for="">時間</label>
                  <select name="time" id="">
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
                  <label for="">人数</label>
                  <select name="number" id="">
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

              <div class="reserve_check">
                <table>
                  <tr>
                    <td>Shop</td>
                    @foreach ($shops as $shop)
                      <th>{{ $shop->name }}</th>
                    @endforeach
                  </tr>
                  <tr>
                    <td>Date</td>
                    <td id="date"></td>
                  </tr>
                  <tr>
                    <td>Time</td>
                    <td id="time"></td>
                  </tr>
                  <tr>
                    <td>Number</td>
                    <td id="number"><span>人</span></td>
                  </tr>
                </table>
              </div>
              <input type="submit" value="送信">
            </form>
          </div>
        </div>
      </div>
    </main>
  </body>
</html>

<script>
  const Date = document.getElementById('date');
  const Time = document.getElementById('Time');
  const Number = document.getElementById('Number');
  console.log(Date);
</script>

<style>

.shop_detail {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-around;
}


.item__left {
  width: 40%;
}

.shop_img {
  width: 100%;
}

.form__item {
  list-style: none;
}

</style>