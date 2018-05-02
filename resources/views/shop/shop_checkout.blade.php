@extends('layouts.shop_common')

@section('content2')
<div class="cart_titles">
    <div class="cart_page_title">
    <h1><i class="fa fa-calculator"></i>Checkout</h1>
    </div>
    <div class="checkout_back_btn">
    <a href="{{url('/booquet')}}"><span class="fa fa-reply"></span>Back to shopping</a>
    </div>
</div>
@endsection

@section('content3')
<div class="checkout-main-wrapper">
  <!-- バリデーションエラーの表示に使用 -->
  @include('common.errors')
  <!-- バリデーションエラーの表示に使用 -->
  <form action="{{url('/shop_confirmation')}}" method="post" id="check_out">
    {{csrf_field()}}
    <div class="checkout_subtitle_1">
        <h3>Shipping Address</h3>
    </div>
    <div class="checkout-shipping">
        <p>All Required Field</p>
        @if(isset($datsales))
        <table class="checkout-shipping-table" align="center">
            <tr>
              <td>Name :</td>
              <td><input type="text" name="c_name" value="{{$datsales->c_name}}"></td>
            </tr>
            <tr>
              <td>Email :</td>
              <td><input type="text" name="c_email" value="{{$datsales->c_email}}"></td>
            </tr>
            <tr>
              <td>Country :</td>
              <td class="checkout-shipping-select">
                  <select name="c_country" id="">
                        <option value="USA" <?php if($datsales->c_country == 'USA') echo ' selected';?>>USA</option>
                        <option value="Japan" <?php if($datsales->c_country == 'Japan') echo ' selected';?>>Japan</option>
                        <option value="China" <?php if($datsales->c_country == 'China') echo ' selected';?>>China</option>
                        <option value="England" <?php if($datsales->c_country == 'England') echo ' selected';?>>England</option>
                        <option value="France" <?php if($datsales->c_country == 'France') echo ' selected';?>>France</option>
                        <option value="Italy" <?php if($datsales->c_country == 'Italy') echo ' selected';?>>Italy</option>
                        <option value="Zimbabwe" <?php if($datsales->c_country == 'Zimbabwe') echo ' selected';?>>Zimbabwe</option>
                    </select>
              </td>
            </tr>
            <tr>
              <td>Postal Code :</td>
              <td><input type="text" name="c_postal1" value="{{$datsales->c_postal1}}"></td>
            </tr>
            <tr>
              <td>Address :</td>
              <td><input type="text" name="c_address" value="{{$datsales->c_address}}"></td>
            </tr>
            <tr>
              <td>Telephone :</td>
              <td><input type="text" name="c_tel" value="{{$datsales->c_tel}}"></td>
            </tr>
        </table>
        @else
        <table class="checkout-shipping-table" align="center">
            <tr>
              <td>Name :</td>
              <td><input type="text" name="c_name"></td>
            </tr>
            <tr>
              <td>Email :</td>
              <td><input type="text" name="c_email"></td>
            </tr>
            <tr>
              <td>Country :</td>
              <td class="checkout-shipping-select">
                  <select name="c_country" id="">
                        <option value="USA">USA</option>
                        <option value="Japan">Japan</option>
                        <option value="China">China</option>
                        <option value="England">England</option>
                        <option value="France">France</option>
                        <option value="Italy">Italy</option>
                        <option value="Zimbabwe">Zimbabwe</option>
                    </select>
              </td>
            </tr>
            <tr>
              <td>Postal Code :</td>
              <td><input type="text" name="c_postal1"></td>
            </tr>
            <tr>
              <td>Address :</td>
              <td><input type="text" name="c_address"></td>
            </tr>
            <tr>
              <td>Telephone :</td>
              <td><input type="text" name="c_tel"></td>
            </tr>
        </table>
        @endif
    </div>



    <div class="checkout_subtitle_1">
      <h3>Payment Method</h3>
    </div>
        <div class="checkout_payment_inner">
          <p>Payment Type : </p>
              <div class="checkout-radio-btns">
                  <div class="checkout-radio-btn">
                      <input type="radio" name="c_pay_type" id="c_pay_type1" value="Credit" checked="checked"><label for="c_pay_type1">Credit</label>
                      <p>
                          <label for="c_pay_type1">
                              <span class="fa fa-cc-visa" id="checkout-icons"></span>
                              <span class="fa fa-cc-mastercard" id="checkout-icons"></span>
                              <span class="fa fa-cc-amex" id="checkout-icons"></span>
                          </label>
                      </p>
                  </div>
                  <div class="checkout-radio-btn">
                      <input type="radio" name="c_pay_type" id="c_pay_type2" value="Paypal"><label for="c_pay_type2">Paypal</label>
                      <p><label for="c_pay_type2"><span class="fa fa-paypal"></span></label></p>
                  </div>
                  <div class="checkout-radio-btn">
                      <input type="radio" name="c_pay_type" id="c_pay_type3" value="Cash"><label for="c_pay_type3">Cash on delivery</label>
                      <p><label for="c_pay_type3"><span class="fa fa-truck"></span></label></p>
                  </div>
              </div>
        </div>


   <div class="credit_pattern_1">    
          <div class="checkout-cardtype">
              <p>Card Type :</P>
              <div>
                  <div class="cardtype_radioBtn_1">
                      <input type="radio" name="c_card_type" id="c_card_type1" value="Visa" checked="checked"><label for="c_card_type1"><span class="fa fa-cc-visa" id="checkout-icons"></span>Visa</label>
                      <input type="radio" name="c_card_type" id="c_card_type2" value="MasterCard"><label for="c_card_type2"><span class="fa fa-cc-mastercard" id="checkout-icons"></span>MasterCard</label>
                  </div>
                  <div class="cardtype_radioBtn_2">
                      <input type="radio" name="c_card_type" id="c_card_type3" value="Amex"><label for="c_card_type3"><span class="fa fa-cc-amex" id="checkout-icons"></span>Amex</label>
                      <input type="radio" name="c_card_type" id="c_card_type4" value="JCB"><label for="c_card_type4"><span class="fa fa-cc-jcb" id="checkout-icons"></span>JCB</label>
                  </div>
              </div>
          </div>
<div class="checkout-cardnumber">
   <table>
        <tr>
            <td>Card Number : </td>
            <td><input type="text" name="c_card_number"></td>
        </tr>
        <tr>
            <td>Expiration Date:</td>
            <td>
                <select name="c_card_month" id="">
                  <option value="01">1</option>
                  <option value="02">2</option>
                  <option value="03">3</option>
                  <option value="04">4</option>
                  <option value="05">5</option>
                  <option value="06">6</option>
                  <option value="07">7</option>
                  <option value="08">8</option>
                  <option value="09">9</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                </select>
                <select name="c_card_year" id="">
                  <option value="2018">2018</option>
                  <option value="2019">2019</option>
                  <option value="2020">2020</option>
                </select>
            </td>
        </tr>
        <tr>
          <td>Security Code:</td>
          <td><input type="text" name="c_card_security_code"></td>
        </tr>
    </table>
    <button type="submit">Confirm order</button>
  </form>
  </div>
  </div>

 <div class="credit_pattern_2">
    <div class="paypal_btn">
        <img src="{{ asset('shop_img/paypal2.png')}}"  width="300px" alt="">
        <img src="{{ asset('shop_img/paypal_btn.png')}}" width="300px" alt="" id="paypalBtn">
    </div>
   <button type="submit" id="confirm" form="check_out">Confirm order</button>
</div>

<div class="credit_pattern_3">
   <button type="submit" form="check_out">Confirm order</button>
</div>
  



</div> 


<div class="infomation-wrapper">
  <div class="infomationTitle">
      <h1>Plivacy Policy</h1>
  </div>
  <div class="privacyContainer">
      <div class='privacyLeft'>
          <h3>Make your shopping more secure with special <br> securit.</h3>
          <div class="prybacyInner">
              <p>Your privacy is important to our. So we’ve developed a Privacy Policy that covers how we collect, use, disclose, transfer, and store your information. Please take a moment to familiarize yourself with our privacy practices and let us know if you have any questions.
              </p>
          </div>
      </div>
      <div class='infomationRight'>
          <p class="fa fa-eye-slash"></p>
      </div>
  </div>
</div>



@endsection