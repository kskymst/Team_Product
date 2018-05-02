@extends('layouts.shop_common')
@inject('func','App\Http\Controllers\ShopController')

@section('content0')
<div class="register_page_title">
    <h1 class="register_title"><i class="fa fa-pencil"></i>Edit Your Profile</h1>
</div>
<!-- バリデーションエラーの表示に使用 -->
@include('common.errors')
<!-- バリデーションエラーの表示に使用 -->
<form action="{{'/shop_customer_edit_done/'.$customer->id}}" method="post">
{{csrf_field()}}
<div class="register_main_wrapper">
    <div class="checkout-shipping">
      <table class="register_table">
        <tr>
          <td>Your Name:</td>
          <td><input type="text" name="c_name" value="{{$customer->c_name}}"></td>
        </tr>
        <tr>
          <td>Email Address:</td>
          <td><input type="email" name="c_email" value="{{$customer->c_email}}"></td>
        </tr>
        <tr>
          <td>Password:</td>
          <td><input type="password" name="c_password1"></td>
        </tr>
        <tr>
          <td>Confirm Password:</td>
          <td><input type="password" name="c_password2"></td>
        </tr>
      </table>
    </div>
  </div>
  <input class="edit_back_btn" type="button" onclick="history.back()" value="Back">
  <button type="submit" class="edit_account_btn"><span class="fa fa-pencil"></span>Edit Account</button>
</form>

@endsection