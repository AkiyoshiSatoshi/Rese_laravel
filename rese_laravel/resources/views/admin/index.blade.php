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
    <div class="tab-panel">
      <!--タブ-->
      <ul class="tab-group">
        <li class="tab tab-A is-active">店舗作成ページ</li>
        <li class="tab tab-B">自店舗更新ページ</li>
        <li class="tab tab-C">予約情報確認ページ</li>  
      </ul>

      <!--タブを切り替えて表示するコンテンツ-->
      <div class="panel-group">
        <div class="panel tab-A is-show">
          @if ( empty($owner) )
            <h2>店舗作成</h2>
            <form method="POST" action="/admin/store" enctype='multipart/form-data' >
              @csrf
              <label for="">店名</label>
              <input type="text" name="shop_name" >
              <label for="">画像</label>
              <input type="file" name="img_url" >
              <label for="">ジャンル</label>
              <select name="genre" id="">
                <option value="1">居酒屋</option>
                <option value="2">寿司</option>
                <option value="3">イタリアン</option>
                <option value="4">ラーメン</option>
                <option value="5">焼肉</option>
              </select>
              <label for="">地域</label>
              <select name="area" id="">
                <option value="1">東京都</option>
                <option value="2">大阪府</option>
                <option value="3">福岡県</option>
              </select>
              <label for="">詳細</label>
              <input type="text" name="description">
              <button type="submit">店舗作成</button>
            </form>
          @else
            <h2>あなたの店舗は作成済みです。</h2>
            <div class="owner__shop__wrap" >
              <img src="{{ asset('/storage/img/shop/' . $owner->img_url) }}" alt="" width="400px" >
              <table class="owner__shop__items">
                <tr>
                  <td>お店</td>
                  <td class="owner__shop__item" >{{$owner->name}}</td>
                </tr>
                <tr>
                  <td>エリア</td>
                  <td class="owner__shop__item" >{{ $owner->areas->name }}</td>
                </tr>
                <tr>
                  <td>ジャンル</td>
                  <td class="owner__shop__item" >{{ $owner->genres->name }}</td>
                </tr>
                <tr>
                  <td>店舗説明</td>
                  <td class="owner__shop__item" >{{ $owner->description }}</td>
                </tr>
              </table>
            </div>
          @endif
        </div>
        <div class="panel tab-B">
          @if ( empty($owner) )
            <h2>店舗の登録がされていません。<br/>店舗登録をしてください。</h2>
          @else
            <h2>店舗更新</h2>
            <form action="/admin/shop/{{$owner->owner_id}}" method="post">
              @csrf
              <input type="text" value="{{ $owner->name }}" name="name" >
              <input type="file" name="img_url" name="img_url" value="{{ $owner->img_url }}" >
              <label for="">ジャンル</label>
                <select name="genre" id="">
                  <option value="1">居酒屋</option>
                  <option value="2">寿司</option>
                  <option value="3">イタリアン</option>
                  <option value="4">ラーメン</option>
                  <option value="5">焼肉</option>
                </select>
                <label for="">地域</label>
                <select name="area" id="">
                  <option value="1">東京都</option>
                  <option value="2">大阪府</option>
                  <option value="3">福岡県</option>
                </select>
              <input type="description" value="{{ $owner->description }}" name="description" >
              <button type="submit">更新</button>
            </form>
          @endif
        </div>
        <div class="panel tab-C">
          @if (empty($owner))
            <h2>店舗登録をしてください</h2>
          @else
            <table>
              <tbody>
                <tr class="table__top" >
                  <td>ユーザー名</td>
                  <td>予約日時</td>
                  <td>人数</td>
                  <td>ユーザー連絡</td>
                </tr>
                @foreach ($reservation as $item)
                <tr>
                  <td>{{ $item->users->name }}</td>
                  <td>{{$item->start_at }}</td>
                  <td>{{$item->num_of_users }}</td>
                  <td><a class="" href="/admin/mail/form/{{ $user->id }}">メール送信</a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          @endif
        </div>
      </div>
    </div>
  </main>
  <footer>

  </footer>
</body>
</html>

<style>

.owner__shop__wrap {
  display: flex;
}


.tab-group{
  display: flex;
  justify-content: center;
}
.tab{
  flex-grow: 1;
  padding:5px;
  list-style:none;
  border:solid 1px #ffffff;
  text-align:center;
  cursor:pointer;
}
.panel-group{
  border:solid 1px #ffffff;
  border-top:none;
  background:#55bbbb;
}
.panel{
  display:none;
}
.tab.is-active{
  background:#55bbbb;
  color:#FFF;
  transition: all 0.2s ease-out;
}
.panel.is-show{
  display:block;
}

.reserve__user__wrap {
  background-color: #55bbbb;
  margin: 10px auto;
  display: flex;
}

table{
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  color: #FFF;
}


table tr{
  border-bottom: solid 1px #ffffff;
  cursor: pointer;
}

.table__top {
  background-color: #0cadad;
}

/* table tr:hover{
  background-color: #d4f0fd;
} */

table th,table td{
  text-align: center;
  width: 25%;
  padding: 15px 0;
}

table td.icon{
  background-size: 35px;
  background-position: left 5px center;
  background-repeat: no-repeat;
  padding-left: 30px;
}

body {
  background-color: #a1c2c2;
  color: white;
}


</style>

<script>
  document.addEventListener('DOMContentLoaded', function(){
  // タブに対してクリックイベントを適用
  const tabs = document.getElementsByClassName('tab');
  for(let i = 0; i < tabs.length; i++) {
    tabs[i].addEventListener('click', tabSwitch, false);
  }

  // タブをクリックすると実行する関数
  function tabSwitch(){
    // タブのclassの値を変更
    document.getElementsByClassName('is-active')[0].classList.remove('is-active');
    this.classList.add('is-active');
    // コンテンツのclassの値を変更
    document.getElementsByClassName('is-show')[0].classList.remove('is-show');
    const arrayTabs = Array.prototype.slice.call(tabs);
    const index = arrayTabs.indexOf(this);
    document.getElementsByClassName('panel')[index].classList.add('is-show');
  };
}, false);
</script>

{{-- 店舗代表者が店舗情報の作成、更新と予約情報の確認ができる管理画面があるか --}}
