@extends('layouts.shop_common')
<!-- main左サイド部 -->
@section('content0')
<div class="mainWrapper">
    <div class="leftSidebar">
  <ul>
          <a href="#newarrival"><li>New Arrival</li><a>
          <a href="#category"><li>Category</li></a>
          <a href="#artist"><li>Artist</li></a>
  </ul>
        <div></div>
    </div>
@endsection

<!-- main中央部 -->
@section('content1')
  <!-- 本の一覧表示 -->
  <div class="mainArea">
        <div class="slideImage">
                <div id="slider" width="1000px">
                    <div class=""><a href=""><img src="{{asset('shop_img/top_goitami.png')}}" width="800px"alt=""></a></div>
                    <div class=""><a href=""><img src="{{asset('shop_img/top_kosuke.png')}}" width="800px" alt=""></a></div>
                    <div class=""><a href=""><img src="{{asset('shop_img/top_araki.png')}}" width="800px" alt=""></a></div>
                    <div class=""><a href=""><img src="{{asset('shop_img/top_yamawaki.png')}}" width="800px" alt=""></a></div>
                </div>  
            </div>
    </div>
  @endsection
  
  
  <!-- main右サイド部 -->
  @section('content2')
<div class="rightSidebar">
    <div class="right-top">
        <a href="" class="fa fa-facebook-official"></a>
        <a href="" class="fa fa-instagram"></a>
        <a href="" class="fa fa-twitter-square"></a>
    </div>
    <div class="right-under">
        <div></div>
        <ul>
        <a href=""><li>Info</li></a>
        <a href=""><li>Shipping</li></a>
        <a href=""><li>About Us</li></a>
        <a href=""><li>Help</li></a>
        </ul>
    </div>
    </div>
</div>
@endsection


<!-- NewArrivalセクション -->
@section('content3')
<div class="newArrival-wrapper" id="newarrival">
    <div class="newArrival-title">
        <h1>New Arrival</h1>
    </div>
    <div class="new-arrival">
        @if (count($products) > 0)
            @foreach($products as $product)
            <div class="new-arrival-item">
                <a href="{{url('shop_item_page/'.$product->id)}}">
                    <div class="itemImage">
                        <img src="./pro_img/{{$product->pro_thumbnail}}" alt="" style="height: 150px; display: block; margin: 0 auto;">
                    </div>
                    <div class="itemWord">
                        <p class="itemTitle">{{$product->pro_name}}</p>
                        <p class="itemAuther">{{$product->pro_author}}</p>
                        <p class="itemPrice">
                            $
                            <!-- {{$product->pro_price.'円'}} -->
                        <?php
                        $number =$product->pro_price;
                        // 3桁ごとにカンマ区切りで出力
                        echo number_format($number,2);
                        ?>
                        </p>
                    </div>
                    </a>
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection
<!-- /NewArrivalセクション -->


<!-- Categoryセクション -->

@section('content4')
<div class="category-wrapper" id="category">
    <div class="categoryTitle">
        <h1>Category</h1>
    </div>
    <div class="categoryItems">
        <div class="categoryItem">
              <a class="tokyo" href="{{url('shop_category/Tokyo')}}">
                <p>Tokyo</p>
              </a>
          </div>
        <div class="categoryItem">
              <a class="kyoto" href="{{url('shop_category/Kyoto')}}">
                <p>Kyoto</p>
              </a>
          </div>
        <div class="categoryItem">
              <a class="gokudo" href="{{url('shop_category/Gokudo')}}">
                <p>Gokudo</p>
              </a>
          </div>
        <div class="categoryItem">
              <a class="temple" href="{{url('shop_category/Temple')}}">
                <p>Temple</p>
              </a>
          </div>
        <div class="categoryItem">
              <a class="art" href="{{url('shop_category/Art')}}">
                <p>Art</p>
              </a>
          </div>
        <div class="categoryItem">
              <a class="fashion" href="{{url('shop_category/Fashion')}}">
                <p>Fashion</p>
              </a>
          </div>
        <div class="categoryItem">
              <a class="music" href="{{url('shop_category/Music')}}">
                <p>Music</p>
              </a>
          </div>
        <div class="categoryItem">
              <a class="other" href="{{url('shop_category/Other')}}">
                <p>Other</p>
              </a>
          </div>
    </div>
</div>
@endsection

<!-- /Categoryセクション -->



<!-- Artistセクション -->

@section('content5')
<div class="artist-wrapper" id="artist">
    <div class="artistTitle">
    <h1>Artist</h1>
    </div>
    <div class="artistItems">
        <div class="artistItem">
            <a class="artist_1" href="{{url('shop_artist/Nobuyoshi Araki')}}">
                <p>Nobuyoshi Araki</p>
            </a>
        </div>
        <div class="artistItem">
            <a class="artist_4" href="{{url('shop_artist/Toshitsugu Yamawaki')}}">
                <p>Toshitsugu Yamawaki</p>
            </a>
        </div>
        <div class="artistItem">
            <a class="artist_3" href="{{url('shop_artist/KYNE')}}">
                <p>KYNE</p>
            </a>
        </div>
        <div class="artistItem">
            <a class="artist_2" href="{{url('shop_artist/Yoshirotten')}}">
                <p>Yoshirotten</p>
            </a>
        </div>
    </div>
</div>

@endsection

<!-- /Artistセクション -->


<!-- infomationセクション -->

@section('content6')
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
@endsection
<!-- /infomationセクション -->