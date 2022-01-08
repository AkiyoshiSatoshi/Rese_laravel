@extends('layouts.app')

@section('main')
  <div class="reserve__change" >
    <h1>予約変更画面</h1>
    <div class="reserve__wrap" >
      <div class="reserve__card" >
        <h2>現状の予約情報</h2>
        <ul>
          <li class="reserve__list" >Name : <span>{{$reserve->shops->name}}</span></li>
          <li class="reserve__list" >Date : 
            <span>
            <?php 
              $date = date('Y/m/d', strtotime($reserve->start_at));
              echo $date;
            ?>
          </span>
        </li>
          <li class="reserve__list" >Time : 
            <span>
              <?php 
                $time = date('H:i', strtotime($reserve->start_at));
                echo $time;
              ?>
            </span>
          </li>
          
          <li class="reserve__list" >Number : <span>{{$reserve->num_of_users}}</span></li>
        </ul>
      </div>
      <div class="reserve__card" >
        <h2>変更情報</h2>
        <form action="/user/reserve/test" method="post">
          @csrf
          <input type="hidden" name="id" value="{{$reserve->id}}  ">
          <input type="hidden" name="user_id" value="{{ $reserve->user_id }}" >
          <input type="hidden" name="shop_id" value="{{$reserve->shop_id}}">
          <ul>
            <li class="reserve__list" >
              <label for="time">Date : </label>
              <input type="date" class="" name="date" >
            </li>
            <li class="reserve__list" >
              <label for="date">Time : </label>
              <select name="time">
                <option value='' disabled   selected class="time"></option>
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
            <li class="reserve__list" >
              <label for="number">Number : </label>
              <select name="number" class="reserve__select"   id="NumInput" >
                <option value='' disabled selected  class="number">Number</option>
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
          <input type="submit" value="変更">
        </form>
      </div>
    </div>
  </div>
@endsection


<style>
  .reserve__change {
    color: white;
  }


  .reserve__wrap {
    display: flex;
    justify-content: space-around;
    width: 90%;
    margin: 0 auto;
  }

  .reserve__card {
    background-color: #55bbbb;
    width: 45%;
    border-radius: 25px;
    padding: 10px 20px;
    margin-left: 10px;
  }

  .reserve__list {
    list-style: none;
  }

  @media screen and (max-width: 768px) {
    .reserve__wrap {
      display: inline;
    }
    .reserve__card {
      width: 80%;
      margin: 0 auto 20px auto;
    }
  }
</style>