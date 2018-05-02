@extends('layouts.shop_common')



@section('content1')

<style>
  .item_user_image_default{
    display:inline;
    height:60px;
    width:60px;
    border-radius:150px;
    margin-left:24px;
    margin: auto 0 auto 16px;
  }
  .item_user_image_changed{
    display:inline;
    height:60px;
    width:60px;
    border-radius:150px;
    margin: auto 0 auto 8px;
  }
</style>

<div class="pro-item-wrap">


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


    <div class="pro-item-area_center">
        <div class="item_center_inner">
            <div class="item_center_words">
                    <!-- WISHLISTテスト用 -->
                    @if(empty(Session::get('chk_ssid')) || Session::get('chk_ssid') != Session::getId())
                    @else
                        @php
                            Session::regenerate();
                            Session::put('chk_ssid',Session::getId());
                        @endphp
                        @if(isset($wishlist))
                            <a class="fa fa-heart-o wishlist_btn_check" href="{{url('shop_wish_done/'.$product->id)}}" style="border:1px solid red;"></a>
                        @else
                            <a class="fa fa-heart-o wishlist_btn" href="{{url('shop_wish_done/'.$product->id)}}"></a>
                        @endif
                    @endif
                    <!-- WISHLIST -->
                  <p class="categoryRoute">Category/<a href="{{url('shop_category/'.$product->pro_genre)}}">{{$product->pro_genre}}</a></p>
                  <h2>｢{{$product->pro_name}}｣</h2>
                  <p>{{$product->pro_author}}</p>
                  <p class="item_price">$
                  <?php
                      $number =$product->pro_price;
                      // 3桁ごとにカンマ区切りで出力
                      echo number_format($number,2);
                      ?>
                  </p>
                  @if($product->pro_stock>0)
                  <p><span class="fa fa-check-circle-o"></span>In Stock</p>
                  @else
                  <p><span class="fa fa-times-circle-o"></span>Out of Stock</p>
                  @endif
                  @php
                    if(round($ave,1)==0){
                        $score='
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        ';

                    }elseif(round($ave,1)>=0.1&&round($ave,1)<=0.7){
                        $score='
                        <i class="fa fa-star-half-o" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        ';

                    }elseif(round($ave,1)>=0.8&&round($ave,1)<=1.2){
                        $score='
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        ';

                    }elseif(round($ave,1)>=0.8&&round($ave,1)<=1.2){
                        $score='
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        ';
                    }elseif(round($ave,1)>=1.3&&round($ave,1)<=1.7){
                        $score='
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star-half-o" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        ';
                    }elseif(round($ave,1)>=1.8&&round($ave,1)<=2.2){
                        $score='
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        ';
                    }elseif(round($ave,1)>=2.3&&round($ave,1)<=2.7){
                        $score='
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star-half-o" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        ';
                    }elseif(round($ave,1)>=2.8&&round($ave,1)<=3.2){
                        $score='
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        ';
                    }elseif(round($ave,1)>=3.3&&round($ave,1)<=3.7){
                        $score='
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star-half-o" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        ';
                    }elseif(round($ave,1)>=3.8&&round($ave,1)<=4.2){
                        $score='
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        ';
                    }elseif(round($ave,1)>=4.3&&round($ave,1)<=4.7){
                        $score='
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star-half-o" aria-hidden="true"></i>
                        ';
                    }elseif(round($ave,1)>=4.8&&round($ave,1)<=5.0){
                        $score='
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        ';
                    }
                  @endphp

                  <p>{!!$score!!} {{round($ave,1)}} score</p>
                  <p>Publisher : {{$product->pro_publisher}}</p>
                  <p>Year : {{date('Y', strtotime($product->pro_release_date))}}</p>
                  <p>Size : {{$product->pro_size}}cm</p>
                  <p>Weight : {{$product->pro_weight}}kg</p>
                <div>
                    @if($product->pro_stock>0)
                    <form action="{{url('shop_cart_in/'.$product->id)}}" method="post">
                      {{csrf_field()}}
                      <select name="quantity" id="">
                        @for($i=0; $i<$product->pro_stock; $i++)
                        <option value="{{$i+1}}">{{$i+1}}</option>
                        @endfor
                        <!-- <span class="fa fa-chevron-down"></span> -->
                      </select>
                      <button type="submit" class=""><span class="fa fa-plus" style="font-size:16px;"></span>Add To Cart</button>
                    </form>
                    @else
                    <div class="soldout_btn_area">
                        <div class="soldout_btn"><span class="fa fa-times" style="font-size:16px;"></span>Soldout</div>
                    </div>
                    @endif
                </div>
                  <div class="item_icons">
                    share: 
                    <i class="fa fa-facebook-official fa-2x" aria-hidden="true"></i>
                    <i class="fa fa-instagram fa-2x" aria-hidden="true"></i>
                    <i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i>
                  </div>
              </div>
              <div class="item_center_image">
                    <div id="content">
                        <img id="img" src="{{asset('pro_img/'.$product->pro_thumbnail)}}" alt="" style="height: 350px; max-width:500px">
                    </div>
                    <div class="item_thumbnails cf"  id="thumb_img" style="margin-top:16px;">
                        <img class="active" src="{{asset('pro_img/'.$product->pro_thumbnail)}}" onclick="changeimg('{{asset('pro_img/'.$product->pro_thumbnail)}}',this);" style="width: 80px;">
                        <img src="{{asset('pro_img/'.$product->pro_thumbnail2)}}" onclick="changeimg('{{asset('pro_img/'.$product->pro_thumbnail2)}}',this);" style="width: 80px;">
                        <img src="{{asset('pro_img/'.$product->pro_thumbnail3)}}" onclick="changeimg('{{asset('pro_img/'.$product->pro_thumbnail3)}}',this);" style="width: 80px;">
                    </div>
              </div>
        </div>

            <div class="review-area">
                <h4>User Review</h4>
                <div class="review-area-inner">
                        @foreach ($revs as $rev)
                        <div class="review_user">
                                    @if(empty($rev->c_thumbnail))
                                        <div class="item_user_image_default" style="background:url('{{asset('shop_img/user_default_2.png')}}'); background-size: cover;background-position: center;background-repeat: no-repeat;"></div>
                                    @else
                                        <div class="item_user_image_changed" style="background:url('{{asset('cus_img/'.$rev->c_thumbnail)}}');background-size: cover;background-position: center;background-repeat: no-repeat;"></div>
                                    @endif
                            <h3>{{ $rev->c_name }}</h3>
                            @php
                            if(round($rev->point,1)==0){
                                $score2='
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                ';

                            }elseif(round($rev->point,1)>=0.1&&round($rev->point,1)<=0.7){
                                $score2='
                                <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                ';

                            }elseif(round($rev->point,1)>=0.8&&round($rev->point,1)<=1.2){
                                $score2='
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                ';

                            }elseif(round($rev->point,1)>=0.8&&round($rev->point,1)<=1.2){
                                $score2='
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                ';
                            }elseif(round($rev->point,1)>=1.3&&round($rev->point,1)<=1.7){
                                $score2='
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                ';
                            }elseif(round($rev->point,1)>=1.8&&round($rev->point,1)<=2.2){
                                $score2='
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                ';
                            }elseif(round($rev->point,1)>=2.3&&round($rev->point,1)<=2.7){
                                $score2='
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                ';
                            }elseif(round($rev->point,1)>=2.8&&round($rev->point,1)<=3.2){
                                $score2='
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                ';
                            }elseif(round($rev->point,1)>=3.3&&round($rev->point,1)<=3.7){
                                $score2='
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                ';
                            }elseif(round($rev->point,1)>=3.8&&round($rev->point,1)<=4.2){
                                $score2='
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                ';
                            }elseif(round($rev->point,1)>=4.3&&round($rev->point,1)<=4.7){
                                $score2='
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                ';
                            }elseif(round($rev->point,1)>=4.8&&round($rev->point,1)<=5.0){
                                $score2='
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                ';
                            }
                        @endphp
                            <p style="font-size:20px; text-align:right; padding-right:24px">{!!$score2!!} {{ $rev->point }}.0score</p>
                        </div>
                        <p class="review_comment" style="font-size:18px; padding:0 40px 16px 40px;">
                            {!! $rev->review !!}
                        </p>
                        @endforeach
                    </div>


                    @if(empty(Session::get('chk_ssid')) || Session::get('chk_ssid') != Session::getId())

                    @else
                        @if(count($existence)>0)
                        @else
                        <button id="reviewBtn">Write a review</button>
                        @endif
                    @endif

                    <!-- 投稿したか否か判定 -->
                    
                    <!-- 投稿したか否か判定 -->


                <!-- wev.phpで定義 -->
                <form action="{{ url('review_add') }}" method="post" class="write_review">
                {{csrf_field()}}
                <input type="hidden" name="pro_id" value="{{$product->id}}">
                  <p>Write your review</p>
                  <textarea name="review" id="" cols="63" rows="4"></textarea>
                  <div class="review_bottom">
                      <select name="point" id="">
                        <option value="1">★</option>
                        <option value="2">★★</option>
                        <option value="3">★★★</option>
                        <option value="4">★★★★</option>
                        <option value="5">★★★★★</option>
                      </select>
                      <button><span class="fa fa-share"></span>submit</button>
                  </div>
                </form>
            </div>
       </div>


    <div class="pro-item-area_right">
       <h4>Other works by</h4>
       <h4>{{$product->pro_author}}</h4>
         @foreach($otherworks as $otherwork)
        <div class="other-works-item">
            <a href="{{url('shop_item_page/'.$otherwork->id)}}">
                    <div class="ow-img">
                        <img src="{{asset('pro_img/'.$otherwork->pro_thumbnail)}}" alt="" style="height: 100px;">
                    </div>
                    <div class="ow-info">
                        <p>｢{{$otherwork->pro_name}}｣</p>
                        <p>{{$otherwork->pro_author}}</p>
                        <p>$ {{$otherwork->pro_price}}</p>
                        <p>{{date('Y', strtotime($otherwork->pro_release_date))}}</p>
                        <p>{{$otherwork->pro_publisher}}</p>
                    </div>
            </a>
        </div>
           @endforeach
    </div>
</div>



<div class="ow-genre-wrapper">
    <div class="ow-genre-title">
        <h3>Other works of this genre</h3>
    </div>
    <div class="ow-genre-items">
          @foreach($other_works_of_this_genres as $other_works_of_this_genre)
              <div class="genre-item">
                  <a href="{{url('shop_item_page/'.$other_works_of_this_genre->id)}}">
                    <img src="{{asset('pro_img/'.$other_works_of_this_genre->pro_thumbnail)}}" alt="" style="height: 150px; display: block; margin: 0 auto;">
                  <p>｢{{$other_works_of_this_genre->pro_name}}｣</p>
                  <p>{{$other_works_of_this_genre->pro_author}}</p>
                  <p>${{$other_works_of_this_genre->pro_price}}</p>
                  <p>{{date('Y', strtotime($other_works_of_this_genre->pro_release_date))}}</p>
                </a>
              </div>
          @endforeach
    </div>
</div>  

<!-- informationセクション -->
<div class="infomation-wrapper">
  <div class="infomationTitle">
      <h1>Online Order Help</h1>
  </div>
  <div class="infomationContainer">
      <div class='infomationLeft'>
          <div class="shippingTitle">
              <p>World Wide Shipping</p>
          </div>
          <h3>In-stock orders received by 11am on a business <br>day (Mo-Fr) ship the same day.</h3>
          <div class="shippingInner">
              <p>The actual shipping cost typically depends on your total order weight, delivery location (zip code/country).
              </p>
              <p class="fa fa-truck" aria-hidden="true"></p>
          </div>
      </div>
      <div class='infomationRight'>
          <div class="paymentTitle">
              <p>Payment Information</p>
          </div>
          <h3>We accept Visa, Mastercard, American Express and PayPal. We also arrange COD upon your request.</h3>
          <div class="paymentInner">
              <p style="font-size:18px;">In order to prevent online fraud, we reserve the right to hold potentially fraudulent orders until we receive satisfactory documentation verifying the legitimacy of the purchase.
              </p>
              <div class="paymentIcons">
                  <div class="paymentIcons_top">
                      <p class="fa fa-cc-mastercard" aria-hidden="true"></p>
                      <p class="fa fa-cc-visa" aria-hidden="true"></p>
                  </div>
                  <div class="paymentIcons_bottom">
                    <p class="fa fa-cc-paypal" aria-hidden="true"></p>
                    <p class="fa fa-cc-amex" aria-hidden="true"></p>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>

<!-- /informationセクション -->
@endsection