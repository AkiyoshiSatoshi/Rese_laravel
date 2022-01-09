
@extends('layouts.shop')


@section('main')
  <div class="shops">
  @foreach ($shops as $item)
    <div class="shop_wrap">
      <img src="{{ asset('/storage/img/shop/' . $item->img_url ) }}" alt="shop_img" class="shop_img" >
      <div class="shop_item">
        <h2 class="shop_name">{{ $item->name }}</h2>
        <div class="category_items">
          <h3 class="category_txt">#{{ $item->areas->name }}</h3>
          <h3 class="category_txt">#{{ $item->genres->name }}</h3>
        </div>
        <div class="shop_detail">
          <a type="submit" class="detail_btn" href="/shop/{{$item->id}}">詳しく見る</a>
          @if (empty(Auth::id()))
            <a href="/login"><i class="far fa-heart heart_img"></i></a>
          @else
            @if($likes[$loop->iteration]==1)
              <a href="/user/unlike/{{$item->id}}"><i class="fas fa-heart heart_img"></i></a>
            @else
              <a href="/user/like/{{$item->id}}"><i class="far fa-heart heart_img"></i></a>
            @endif
          @endif
        </div>
      </div>
    </div>
  @endforeach
  </div>
@endsection


<style>


.shops {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-around;
}

.shop_wrap {
  width: 20%;
  margin: 20px 10px;
  border-radius: 10px;
  background: #ffffff;
  box-shadow:  5px 5px 22px #808080,
              -5px -5px 22px #ffffff;
}

.shop_item {
  padding: 10px 20px;
}

.shop_name {
  font-size: 24px;
  margin-bottom: 10px;
}


.shop_img {
  width: 100%;
  border-radius: 10px 10px 0 0;
}

.category_items {
  display: flex;
  padding: 5px 0 10px 0;
}
.category_txt {
  padding-right: 5px;
}

.shop_detail {
  display: flex;
  justify-content: space-around;
  width: 100%;
}

.heart_img {
  font-size: 35px;
  color: pink;
}


.detail_btn {
  padding: 10px 20px;
  border: none;
  border-radius: 10px;
  background-color: #55BBBB;
  color: azure;
}

@media screen and (max-width: 768px) {
  .shops {
    width: 90%;
    margin: 0 auto;
  }
  .shop_wrap {
    width: 40%;
  }

}

@media screen and (max-width: 425px) {
  .shops {
    width: 90%;
    margin: 0 auto;
  }
  .shop_wrap {
    width: 100%;
  }

}
</style>