@extends('layouts.shop_common')
@inject('func','App\Http\Controllers\ShopController')

@section('content0')
<style>
  .default_user_image{
    height:200px;
    width:200px;
    margin:0 auto;
    border-radius:150px;
    background-image:url("{{asset('shop_img/user_default.png')}}");
    background-size:cover;
    background-repeat: no-repeat;
    background-position: center;
  }
  .changed_user_image{
    height:200px;
    width:200px;
    margin:0 auto;
    border-radius:150px;
    background-image:url("{{asset('cus_img/'.$customer->c_thumbnail)}}");
    background-size:cover;
    background-repeat: no-repeat;
    background-position: center;
  }
</style>
<div class="cart_titles">
    <div class="cart_page_title">
    <h1><i class="fa fa-id-card-o"></i>Mypage</h1>
    </div>
    <div class="checkout_back_btn">
    <a href="{{url('/booquet')}}"><span class="fa fa-reply"></span>Back to shopping</a>
    </div>
</div>

<div class="mypage_main">
      <div class="mypage_top">
            <div class="mypage_top_left">
                <div class="mypage_tl_inner">
                  <div class="mypage_user_image">
                    @if(empty($customer->c_thumbnail))
                      <div class="default_user_image"></div>
                    @else
                      <div class="changed_user_image"></div>
                    @endif
                  </div>
                    <form action="{{url('shop_customer_img_edit/'.$customer->id)}}" method="post" enctype="multipart/form-data">
                      {{csrf_field()}}
                      <label class="add_user_image" for="file_photo" style="border: 1px solid black;">
                        <span class="fa fa-refresh"></span>Change your picture
                        <input type="file" name="c_thumbnail" id="file_photo" style="display:none;" accept="image/*" onchange="submit(this.form)">
                      </label>
                    </form>
                  <table id="mypage_user_table">
                      <tr>
                          <td font-size="16px">Name :</td>
                          <td align="left">{{$customer->c_name}}</td>
                      </tr>
                      <tr>
                          <td>Email :</td>
                          <td>{{$customer->c_email}}</td>
                      </tr>
                  </table>
                  @php
                    $month = date('m', strtotime($customer->created_at));
                    switch($month){
                      case '01':
                        $month = 'January';
                        break;
                      case '02':
                        $month = 'February';
                        break;
                      case '03':
                        $month = 'March';
                        break;
                      case '04':
                        $month = 'April';
                        break;
                      case '05':
                        $month = 'May';
                        break;
                      case '06':
                        $month = 'June';
                        break;
                      case '07':
                        $month = 'July';
                        break;
                      case '08':
                        $month = 'August';
                        break;
                      case '09':
                        $month = 'September';
                        break;
                      case '10':
                        $month = 'October';
                        break;
                      case '11':
                        $month = 'November';
                        break;
                      case '12':
                        $month = 'December';
                        break;
                    }

                  @endphp
                  <p>Our member since {{date('d', strtotime($customer->created_at)).' '.$month.' '.date('Y', strtotime($customer->created_at))}}</p>
                  <br>
                  <a href="{{url('shop_customer_edit/'.$customer->id)}}"><span class="fa fa-pencil"></span>Edit Your Profile</a>
                  </div>
            </div>

            <div class="mypage_top_right">
                <h2>In Your Cart</h2>
                <div class="artist_page_items">
                  <?php $r=0 ?>
                    @if(isset($products))
                        @foreach($products as $product)
                            <?php $r++ ?>
                            <div class="artist_page_item selection2" id="paging_item2_{{$r}}" style="width:25%;">
                                <a href="{{url('shop_item_page/'.$product->id)}}">
                                    <div>
                                        <img src="{{asset('pro_img/'.$product->pro_thumbnail)}}" alt="" style="height: 150px; display: block; margin: 0 auto;">
                                    </div>
                                    <p>｢{{$product->pro_name}}｣</p>
                                    <p>{{$product->pro_author}}</p>
                                    <p>$ 
                                    <?php
                                        $number =$product->pro_price;
                                        echo number_format($number);
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
                <div class="bottom_left_pagenation">
                    <div id="paging2" class="paginate"></div>
                </div>
                <input id="purchaseNum2" type="hidden" value="{{$r}}">
                </div>

            </div>
      </div>
      <div class="mypage_bottom">
          <div class="mypage_bottom_left">
            <h2>Purchase History</h2>
            <div class="mypage_bl_inner">
                  <div class="artist_page_items">
                    <?php
                        $i = 0;
                    ?>
                    @if(count($purchases)>0)
                      @foreach($purchases as $purchase)
                      <?php $i++ ?>
                        <div class="artist_page_item selection" id="paging_item_{{$i}}" style="width:32%;">
                          <a href="{{url('shop_item_page/'.$purchase->pro_id)}}">
                            <div>
                              <img src="{{asset('pro_img/'.$purchase->pro_thumbnail)}}" alt="" style="height: 150px; display: block; margin: 0 auto;">
                            </div>
                            <p>｢{{$purchase->pro_name}}｣</p>
                            <p>{{$purchase->pro_author}}</p>
                            <p>$ 
                            <?php
                              $number =$purchase->pro_price;
                              echo number_format($number,2);
                            ?>
                            </p>
                            <p></p>
                            <p>
                              @if($purchase->pro_stock > 0)
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
                  <div class="bottom_left_pagenation">
                      <div id="paging" class="paginate"></div>
                  </div>
              </div>
            </div>

          <input id="purchaseNum" type="hidden" value="{{$i}}">


          <div class="mypage_bottom_right">
            <h2>Wishlist</h2>
            <div class="artist_page_items">
              <?php $t=0 ?>
                @if(isset($wishlists))
                    @foreach($wishlists as $wishlist)
                        <?php $t++ ?>
                        <div class="mypage_wishlist_item selection4" id="paging_item4_{{$t}}" style="width:25%;">
                            <a href="{{url('shop_item_page/'.$wishlist->pro_id)}}">
                                <div>
                                    <img src="{{asset('pro_img/'.$wishlist->pro_thumbnail)}}" alt="" style="height: 150px; display: block; margin: 0 auto;">
                                </div>
                                <p>｢{{$wishlist->pro_name}}｣</p>
                                <p>{{$wishlist->pro_author}}</p>
                                <p>$ 
                                <?php
                                    $number =$wishlist->pro_price;
                                    echo number_format($number,2);
                                  ?>
                                </p>
                                <p>{!!$func->takestar($func->takeave($wishlist->pro_id))!!}{{$func->takeave($wishlist->pro_id)}}</p>
                                <p>
                                    @if($wishlist->pro_stock > 0)
                                    <span class="fa fa-check-circle-o"></span>In Stock
                                    @else
                                    <span class="fa fa-times-circle-o"></span>Out of Stock
                                    @endif
                                </p>
                            </a>
                            <div class="mypage_cart_section">
                              @if($wishlist->pro_stock>0)
                              <form action="{{url('shop_cart_in/'.$wishlist->pro_id)}}" method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="mypage_cart_btn"><span class="fa fa-plus" style="font-size:16px;"></span>Add To Cart</button>
                              </form>
                              @else
                              <div class="mypage_cart_btn_sold"><span class="fa fa-times" style="font-size:16px;"></span>Soldout</div>
                              @endif
                          </div>
                          </div>
                    @endforeach
                @endif
            </div>
            <div class="bottom_left_pagenation">
                      <div id="paging4" class="paginate"></div>
            </div>
            <input id="purchaseNum4" type="hidden" value="{{$t}}">
          </div>
      </div>
</div>


@endsection

@section('content7')
<script>
  $(function(){
    　　//購入履歴
      let purchaseNum = Math.ceil($("#purchaseNum").val() / 3); 
      $("#paging").pagination({
          items: purchaseNum,
          displayedPages: 3,
          onPageClick: function(pageNumber){show(pageNumber,0)}
          })

    　　//カート内
      let purchaseNum2 = Math.ceil($("#purchaseNum2").val() / 4); 
      $("#paging2").pagination({
          items: purchaseNum2,
          displayedPages: 4,
          onPageClick: function(pageNumber){show(pageNumber,2)}
          })

    　　//ウィッシュリスト
      let purchaseNum4 = Math.ceil($("#purchaseNum4").val() / 4); 
      $("#paging4").pagination({
          items: purchaseNum4,
          displayedPages: 4,
          onPageClick: function(pageNumber){show(pageNumber,1)}
          })


          function show(pageNumber,flag){
            // console.log(flag);
            if(flag===0){
              let pageNumMax = pageNumber * 3;
              let pageNumMin = pageNumMax - 2;
              $('.selection').hide();
              for(pageNumMin;pageNumMax >= pageNumMin;pageNumMin++){
                  var page="#paging_item_" + pageNumMin;
                  $(page).show();
              }
            }else if(flag==1){
              let pageNumMax = pageNumber * 4;
              let pageNumMin = pageNumMax - 3;
              $('.selection4').hide();
              for(pageNumMin;pageNumMax >= pageNumMin;pageNumMin++){
                  var page="#paging_item4_" + pageNumMin;
                  $(page).show();
            }
            }else{
              let pageNumMax = pageNumber * 4;
              let pageNumMin = pageNumMax - 3;
              $('.selection2').hide();
              for(pageNumMin;pageNumMax >= pageNumMin;pageNumMin++){
                  var page="#paging_item2_" + pageNumMin;
                  $(page).show();
            }
            }
          }
  })
</script>
@endsection