@extends('layouts.shop_common')


@section('content0')
<div class="cart_titles">
    <div class="cart_page_title">
    <h1><i class="fa fa-check"></i>Confirm</h1>
    </div>
    <div class="checkout_back_btn">
    <a href="{{url('/booquet')}}"><span class="fa fa-reply"></span>Back to shopping</a>
    </div>
</div>

@endsection

@section('content3')
<div class="confirm_myitem_wrapper">
    <div class="my_cart_wrapper">
      @if(isset($cart))
      <table class="table" id="table">
        @for($i=0; $i<count($cart); $i++)
          <tr>
              <td class="confirm_item_titles">
                  <div class="cart_item_image">
                    <img src="{{asset('pro_img/'.$product[$i]->pro_thumbnail)}}" alt="" style="height: 80px;">
                  </div>
                    <div class="confirm-item-title">
                        <p>{{$product[$i]->pro_name}}</p>
                        <p>{{$product[$i]->pro_author}}</p>
                        <p>$ {{$product[$i]->pro_price}}</p>
                    </div>
                </td>
            <td class="confirm_item_count">
                  <p>×{{$quantity[$i]}}</p>
            </td>
            <td class="confirm_item_amount">$ {{$product[$i]->pro_price * $quantity[$i]}}</td>
          </tr>
          
        @endfor
      </table>
      @else
      <p class="cart-nothing">There is nothing in the cart.</p>
      @endif
    </div>
</div>

<?php 
  $TotalQuantity = 0; 
  $TotalAmount = 0;
?>

<div class="cart_total_amount_wrapper">
  @if(isset($cart))
      @for($i=0;$i<count($cart);$i++)
      
          <?php
          $TotalQuantity += $quantity[$i];
          $TotalAmount += ($product[$i]->pro_price * $quantity[$i]);
          ?>
      @endfor
          
          
      <div class="cart_total_inner">
          <div class="total-wrap">
              <div class="confirm_total_quantity">
                <p>Total Quantity :</p>
                <p>× {{$TotalQuantity}}</p>
              </div class="confirm_total_amount">
              <div>
                <p>Total Amount :</p>
                <p>$ {{$TotalAmount}}</p>
              </div>
          </div>
          <div class="confirm_amount_taxes">
              <p>Shiping Cost : $4.99</p>
              <p>Taxes : $0.00</p>
              <p>Grand Total : $ {{$TotalAmount + 4.99}}</p>
          </div>
      @endif
    </div>
</div>
@endsection


@section('content6')
<div class="confirm_address">
    <div class="confirm_shipping_area">
        <h3> Shipping Address</h3>
        <table class="shipping_table">
            <tr>
                <td>Name :</td>
                <td>{{$request->c_name}}</td>
            </tr>
            <tr>
                <td>Email :</td>
                <td>{{$request->c_email}}</td>
            </tr>
            <tr>
                <td>Country :</td>
                <td>{{$request->c_country}}</td>
            </tr>
            <tr>
                <td>Postal Code :</td>
                <td>{{$request->c_postal1}}</td>
            </tr>
            <tr>
                <td>Address :</td>
                <td>{{$request->c_address}}</td>
            </tr>
            <tr>
                <td>Telephone :</td>
                <td>{{$request->c_tel}}</td>
            </tr>
        </table>
    </div>

    <div class="confirm_payment_area">
        <h3> Payment Method</h3>
        @if($request->c_pay_type==='Credit')
        <table class="payment_table">
            <tr>
                <td>Card Type :</td>
                <td>{{$request->c_card_type}}</td>
            </tr>
            <tr>
                <td>Card Number :</td>
                <td>{{'****-****-****-'.substr($request->c_card_number,12,4)}}</td>
            </tr>
            <tr>
                <td>Expiration Date :</td>
                <td>{{$request->c_card_month.'/'.substr($request->c_card_year,2,2)}}</td>
            </tr>
        </table>
        @elseif($request->c_pay_type==='Paypal')
        <table class="payment_table">
            <tr>
                <td>Payment Type :</td>
                <td>Paypal</td>
            </tr>
        </table>
        @else
        <table class="payment_table">
            <tr>
                <td>Payment Type :</td>
                <td>Cash on delivery</td>
            </tr>
        </table>
        @endif
    </div>
</div>

<form action="{{url('shop_order_complete')}}" method="post">
  {{csrf_field()}}
  <input type="hidden" name="c_name" value="{{$request->c_name}}">
  <input type="hidden" name="c_email" value="{{$request->c_email}}">
  <input type="hidden" name="c_country" value="{{$request->c_country}}">
  <input type="hidden" name="c_postal1" value="{{$request->c_postal1}}">
  <input type="hidden" name="c_address" value="{{$request->c_address}}">
  <input type="hidden" name="c_tel" value="{{$request->c_tel}}">
  <input type="hidden" name="c_pay_type" value="{{$request->c_pay_type}}">
  <input type="hidden" name="c_card_type" value="{{$request->c_card_type}}">
  <input type="hidden" name="c_card_number" value="{{$request->c_card_number}}">
  <input type="hidden" name="c_card_month" value="{{$request->c_card_month}}">
  <input type="hidden" name="c_card_year" value="{{$request->c_year}}">
  <input type="hidden" name="c_card_security_code" value="{{$request->c_card_security_code}}">
  <button type="submit" class="confirm_submitBtn">Submit Order</button>
</form>


@endsection