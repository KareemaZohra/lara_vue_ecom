@extends('layouts.app')
@section('title')
    Cart Details
@endsection

@section('content')
    <cart-view :prop-cart='{!! htmlspecialchars(json_encode($cart), ENT_QUOTES, 'UTF-8') !!}'></cart-view>
@endsection
