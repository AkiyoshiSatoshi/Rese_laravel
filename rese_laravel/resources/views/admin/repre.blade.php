<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
</head>
<body>
  <header>

  </header>
  <main>
    <div class="shop__create">
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
    <div class="shop__update">
      @if ( empty($test) )
        <h2>店舗登録をしてください。</h2>
      @else
        <h2>店舗更新</h2>
        {{-- <p>{{ $test }}</p> --}}
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
    <div class="book__confirm">
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
  </main>
  <footer>

  </footer>
</body>
</html>



{{-- 店舗代表者が店舗情報の作成、更新と予約情報の確認ができる管理画面があるか --}}
