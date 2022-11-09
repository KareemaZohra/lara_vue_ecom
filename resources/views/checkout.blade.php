@extends('layouts.app')
@section('title')
    Checkout
@endsection

@section('content')
<checkout-page :prop-cart='{!! htmlspecialchars(json_encode($cart), ENT_QUOTES, 'UTF-8') !!}'
               cart-total='{!! htmlspecialchars(json_encode($cartTotal), ENT_QUOTES, 'UTF-8') !!}'></checkout-page>
@endsection

