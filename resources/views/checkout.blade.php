@extends('layouts.app')
@section('title')
    Collection page
@endsection

@section('content')
<checkout-page :prop-cart='{!! htmlspecialchars(json_encode($cart), ENT_QUOTES, 'UTF-8') !!}'></checkout-page>
@endsection

