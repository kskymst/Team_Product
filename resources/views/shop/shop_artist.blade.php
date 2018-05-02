@extends('layouts.shop_common')
@inject('func','App\Http\Controllers\ShopController')
@section('content2')

<div class="category_main_top">
        <div class="pro-item-area_left">
                <div>
                    <p>Category</p>
                </div>
                <a href="{{url('shop_category/Tokyo')}}">Tokyo</a>
                <a href="{{url('shop_category/Kyoto')}}">Kyoto</a>
                <a href="{{url('shop_category/Gokudo')}}">Gokudo</a>
                <a href="{{url('shop_category/Temple')}}">Temple</a>
                <a href="{{url('shop_category/Art')}}">Art</a>
                <a href="{{url('shop_category/Fashion')}}">Fashion</a>
                <a href="{{url('shop_category/Music')}}">Music</a>
                <a href="{{url('shop_category/Other')}}">Other</a>
        </div>
        <div class="category_main_image">
            <img src="{{asset('shop_img/artist_'.$author.'.png')}}" alt="">
        </div>
</div>




<div class="artist_main-wrapper">
  <div class="artist_main_left">
      <div class="artist_main_title">
        <h3>Artist / {{$author}}</h3>
      </div>
      <div class="artist_page_items">
          @if(count($products)>0)
              @foreach($products as $product)
                  <div class="artist_page_item">
                      <a href="{{url('shop_item_page/'.$product->id)}}">
                          <div>
                              <img src="{{asset('pro_img/'.$product->pro_thumbnail)}}" alt="" style="height: 150px; display: block; margin: 0 auto;">
                          </div>
                          <p>｢{{$product->pro_name}}｣</p>
                          <p>{{$product->pro_author}}</p>
                          <p>$ 
                          <?php
                              $number =$product->pro_price;
                              echo number_format($number,2);
                            ?>
                          </p>
                          <p>{!!$func->takestar($func->takeave($product->id))!!}{{$func->takeave($product->id)}}</p>
                          <p>
                              @if($product->pro_stock > 0)
                              <span class="fa fa-check-circle-o"></span>In Stock
                              @else
                              <span class="fa fa-times-circle-o"></span>Out of Stock
                              @endif
                          </p>
                      </a>
                  </div>
              @endforeach
          @endif
      </div>
    </div>

    <div class="pro-item-area_right" id="category_ranking_area">
        <h4 class="category_ranking">Ranking of {{$author}}</h4>
        @if(count($rankings)>0)
          @for($i=0; $i<count($rankings); $i++)
          <div class="other-works-item">
              <a href="{{url('shop_item_page/'.$rankings[$i]->pro_id)}}">
                      <p class="ranking_int">{{$i+1}}</p>  
                      <div class="ow-img">
                          <img src="{{asset('pro_img/'.$rankings[$i]->pro_thumbnail)}}" alt="" style="height: 100px;">
                      </div>
                      <div class="ow-info">
                          <p>｢{{$rankings[$i]->pro_name}}｣</p>
                          <p>{{$rankings[$i]->pro_author}}</p>
                          <p>$ {{$rankings[$i]->pro_price}}</p>
                          <p>{!!$func->takestar($func->takeave($product->id))!!}{{$func->takeave($product->id)}}</p>
                      </div>
                    </a>
                    </div>
            @endfor
            @endif
    </div>
</div>

<div class="artist_pagenation">
  <button>1</button>
</div>


@endsection