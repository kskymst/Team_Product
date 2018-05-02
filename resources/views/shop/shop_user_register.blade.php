@extends('layouts.shop_common')

@section('content0')

<div class="register_page_title">
    <h1 class="register_title"><i class="fa fa-check"></i>Let's register now</h1>
</div>
<!-- バリデーションエラーの表示に使用 -->
  @include('common.errors')
<!-- バリデーションエラーの表示に使用 -->
<form action="{{url('shop_user_register_done')}}" method="post">
  {{csrf_field()}}
  <div class="register_main_wrapper">
      <div class="checkout-shipping">
          <table class="register_table">
            <tr>
              <td>Your Name:</td>
              <td><input type="text" name="c_name"></td>
            </tr>
            <tr><td> Email Address:</td>
              <td><input type="text" name="c_email"></td>
            </tr>
            <tr>
              <td>Password:</td>
              <td>
                <input type="text" name="c_password1">
              </td>
            </tr>
            <tr>
              <td>Confirm Password:</td>
              <td><input type="text" name="c_password2"></td>
            </tr>
          </table>
          <button type="submit" class=""><span class="fa fa-check"></span>Create Account</button>
        </form>
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