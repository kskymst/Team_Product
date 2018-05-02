@extends('layouts.shop_common')
@inject('func','App\Http\Controllers\ShopController')

@section('content1')
<div class="result_page_wrapper">
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
    
    <div class="result_main_section">
        <div class="result_main_title">
          <span>Result ::</span><h1 class="question">{{$question}}</h1>
        </div>
        <div class="container result-wrap">
            <?php $i = 0 ;?>
              @if(count($products)>0)
                @foreach($products as $product)
                <?php $i++ ?>
                <div class="result-items selection12" id="paging_item12_{{$i}}">
                  <a class="result-item" href="{{url('shop_item_page/'.$product->id)}}">
                        <img src="./pro_img/{{$product->pro_thumbnail}}" alt="" style="height: 150px; display: block; margin: 0 auto;">
                        <p>｢{{$product->pro_name}}｣</p>
                        <p>{{$product->pro_author}}</p>
                        <p>$
                          <?php
                        $number =$product->pro_price;
                        // 3桁ごとにカンマ区切りで出力
                        echo number_format($number,2);
                        ?>
                      </p>
                      <p>{!!$func->takestar($func->takeave($product->id))!!}{{$func->takeave($product->id)}}</p>
                      @if($product->pro_stock>0)
                      <p><span class="fa fa-check-circle-o"></span>In Stock</p>
                      @else
                      <p><span class="fa fa-times-circle-o"></span>Out of Stock</p>
                      @endif
                    </a>
                </div>
                @endforeach
              @endif
        </div>
            <div class="bottom_left_pagenation">
                <div id="paging12" class="paginate"></div>
            </div>
    </div>
    <input id="purchaseNum12" type="hidden" value="{{$i}}">
  
    
  </div>
@endsection

@section('content7')
<script>
  $(function(){
      // 表示数12の時
      let purchaseNum12 = Math.ceil($("#purchaseNum12").val() / 12);
      $("#paging12").pagination({
          items: purchaseNum12,
          displayedPages: 12,
          onPageClick: function(pageNumber){show(pageNumber)}
          })
      function show(pageNumber){
              let pageNumMax = pageNumber * 12;
              let pageNumMin = pageNumMax - 11;

              $('.selection12').hide();
              for(pageNumMin;pageNumMax >= pageNumMin;pageNumMin++){
                  var page="#paging_item12_" + pageNumMin;
                  $(page).show();
              };
          }
  })
</script>
@endsection