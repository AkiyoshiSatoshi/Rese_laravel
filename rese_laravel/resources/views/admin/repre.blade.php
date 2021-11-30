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
    <div class="shop__wrap">
      <section class="tab__switch">
        <input type="radio" name="tab_1" id="Tab_01" class="radiobox" checked="checked">
        <label class="tab__label" for="">店舗作成ページ</label>
        <div class="content shop__create " >
          
        </div>
        <input type="radio" class="radiobox" name="tab_2" id="Tab_02">
        <label class="tab__label" for="">自店舗更新ページ</label>
        <div class="content shop__update">
          
        </div>
        <input type="radio" class="radiobox" name="tab__3" id="Tab_03">
        <label class="tab__label" for="">予約情報確認ページ</label>
        <div class="content booke__confirm">
          
        </div>
      </section>
    </div>
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
          @if ( empty($test) )
            <h2>店舗作成</h2>
            <form method="POST" action="/repre" enctype='multipart/form-data' >
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
          @endif
        </div>
        <div class="panel tab-B">
          @if ( empty($test) )
            <h2>店舗の登録がされていません。<br/>店舗登録をしてください。</h2>
          @else
            <h2>店舗更新</h2>
            <form action="/repre/{{$test->owner_id}}" method="post">
              @csrf
              <input type="text" value="{{ $test->name }}" name="name" >
              <input type="file" name="img_url" name="img_url" value="{{ $test->img_url }}" >
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
              <input type="description" value="{{ $test->description }}" name="description" >
              <button type="submit">更新</button>
            </form>
          @endif
        </div>
        <div class="panel tab-C">
          @if (empty($test))
            <h2>店舗登録をしてください</h2>
          @else
            @foreach ($reservation as $item)
              <p>{{ $item->shops->name }}</p>
              <p>{{ $item->users->name }}</p>
              <p>{{$item->num_of_users }}</p>
              <p>{{$item->start_at }}</p>
            @endforeach
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
.tab-group{
  display: flex;
  justify-content: center;
}
.tab{
  flex-grow: 1;
  padding:5px;
  list-style:none;
  border:solid 1px #CCC;
  text-align:center;
  cursor:pointer;
}
.panel-group{
  height:100px;
  border:solid 1px #CCC;
  border-top:none;
  background:#eee;
}
.panel{
  display:none;
}
.tab.is-active{
  background:#F00;
  color:#FFF;
  transition: all 0.2s ease-out;
}
.panel.is-show{
  display:block;
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
