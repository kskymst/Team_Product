<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Booquet</title>
  <!-- CSSとJavaScript -->
  
  <!-- Bootstrap CSS-->
  <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
  <!-- fontawesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- カルーセル用 css -->
  <link rel="stylesheet" href="{{asset('slick/slick.css')}}">
  <link rel="stylesheet" href="{{asset('slick/slick-theme.css')}}">
  <script type="text/javascript" src="{{asset('slick/slick.min.js')}}"></script>
  <!-- self css -->
  <link rel="stylesheet" href="{{asset('css/common_shop.css')}}">
</head>
<body>

  <!-- ヘッダーセクション -->
<header>
  <nav class="navbar navbar-default">
    <!-- 1.サーチ機能 -->
    <div class="searchSection">
      <form action="{{url('/shop_result_page')}}" method="post">
        {{csrf_field()}}
        <button type="submit" class="searchButton"><img src="{{asset('shop_img/search.png')}}" alt=""></button>
        <input type="text" name="question">
      </form>
    </div>

    <!-- 2.Booquetロゴ -->
    <div class="">
      <a href="{{url('/booquet')}}" class="headerTitle"><img src="{{asset('shop_img/booquet_logo.png')}}" alt=""></a>
    </div>

    <!-- 3.ログイン & カート機能 -->
    <div class="loginSection">
        <!-- /ログインエラー文書 -->
        @if(empty(Session::get('chk_ssid')) || Session::get('chk_ssid') != Session::getId())
          <img src="{{asset('shop_img/user_icon.png')}}" class="userLogo" alt="">
          <p><span id="login_btn">Login<span></p>
          <span class="verticalBar">|</span>
          <a class="header_join" href="{{url('shop_user_register')}}">Join</a>
        @else
          @php
            Session::regenerate();
            Session::put('chk_ssid',Session::getId());
          @endphp
            <img src="{{asset('shop_img/user_icon.png')}}" class="userLogo" alt="">
            <a class ="top_login_after" href="{{url('shop_customer_page/'.Session::get('c_id'))}}">
            <span>{{Session::get('name')}}</span>
            </a>
              | <a class="top_login_after" href="{{url('shop_customer_logout')}}">Logout</a>

        @endif
      <a href="{{url('/shop_cart_look')}}" class="cartIcon"><img src="{{asset('shop_img/cart_icon.png')}}" alt="">
      @if(Session::get('totalQuantity')>0)
      <p class="top_cart_quantity"><?php echo Session::get('totalQuantity')?></p>
      @endif
      </a>
    </div>
  </nav>


 
  <!-- ログイン、マウスオーバーイベント -->


  @if(!empty(session('err')))
  <div class="top-login-wrapper" style="display:block; height:350px">
    <h2>Login</h2>
    <form action="{{url('shop_customer_login')}}" method="post">
      {{csrf_field()}}
      <!-- ログインエラー文書 -->
          <h5 class="login_error" style="margin:-8px auto 24px;">{{session('err')}}</h5>
          <p>Email :<input type="text" name="c_email"></p>
          <p>Password :<input type="text" name="c_password"></p>
          <button type="submit"><span class="fa fa-sign-in"></span>Login</button>
          <p><p>
      </form>
      <p class="top-join">Don't have a account yet? →<a href="{{url('shop_user_register')}}">Create one!</a></p>
      <p class="block"></p>
  </div>
  @else
  <div class="top-login-wrapper">
      <h2>Login</h2>
      <form action="{{url('shop_customer_login')}}" method="post">
      {{csrf_field()}}
          <!-- ログインエラー文書 -->
          <p>Email :<input type="text" name="c_email"></p>
          <p>Password :<input type="text" name="c_password"></p>
          <button type="submit"><span class="fa fa-sign-in"></span>Login</button>
          <p><p>
      </form>
      <p class="top-join">Don't have a account yet? →<a href="{{url('shop_user_register')}}">Create one!</a></p>
      <p class="block"></p>
  </div>
  @endif

</header>
  <!-- /ヘッダーセクション -->


<!-- メインセクション -->
      <div class="yields">
        @yield('content0')
        @yield('content1')
        @yield('content2')
        @yield('content3')
        @yield('content4')
        @yield('content5')
        @yield('content6')
      </div>

<!-- フッターセクション -->
  <footer>
          <div class="footerLeft">
              <div class="footerLeft_left">
                  <img src="{{asset('shop_img/Booquet_logo2.png')}}" alt="" width="180px">
                    <p>Monday - Friday 08.30 - 17.00</p>
                    <p>booquet_japan@booquet.com</p>
                    <p>Find us on Google Maps</p>
              </div>
              <div class="footerLeft_right">
                  <p>Join the conversation</p>
                  <p>
                      <span class="fa fa-facebook-official"></span>
                      <span class="fa fa-instagram"></span>
                      <span class="fa fa-twitter-square"></span>
                  </p>
              </div>
          </div>
          <div class="footerRight">
              <div class="footerRight_left">
                  <h3>Language</h3>
                    <div class="languages">
                        <p>English</p>
                        <p>日本語</p>
                        <p>简体中文</p>
                    </div>
              </div>
              <div class="footerRight_center">
                  <h3>Document</h3>
                    <div class="documents">
                        <p>Sitemap</p>
                        <p>Terms of service</p>
                        <p>Privacy policy</p>
                    </div>
              </div>
              <div class="footerRight_right">
                  <p>Pay securely with...</p>
                  <span class="fa fa-cc-visa"></span>
                  <span class="fa fa-cc-mastercard"></span>
                  <span class="fa fa-cc-amex"></span>
                  <span class="fa fa-cc-paypal"></span>
              </div>
          </div>
  </footer>
<!-- フッターセクション -->



<!-- Bootstrap JS-->
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<!-- カルーセル用プラグイン -->
<script type="text/javascript" src="{{asset('slick/slick.min.js')}}"></script>
<!-- ページネーション用プラグイン -->
<script type="text/javascript" src="{{asset('js/jquery.simplePagination.js')}}"></script>
<!-- self JS-->
<script type="text/javascript" src="{{asset('js/shop_top.js')}}"></script>
@yield('content7')
</body>
</html>