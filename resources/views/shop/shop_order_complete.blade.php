@extends('layouts.shop_common')

@section('content2')
<div class="complete_wrapper">
        <h1>Thank you for order</h1>
        <div class="complete_main">   
                <div>
                    <p class="fa fa-thumbs-o-up"></p>
                </div>
                <div>
                    <p>{{$request->c_name}} Thank you for your order.</p>
                    <p>We sent an order email to your address [ {{$request->c_email}} ]</p>
                    <p>We will contact you again upon completion of shipment.</p>
                    <p>We are waiting for the use of another.</p>
                </div>
        </div>
    <div class="complete_backBtn">
        <a href="{{url('/booquet')}}"><span class="fa fa-reply"></span>Back to shopping</a>
    </div>
</div>





@endsection