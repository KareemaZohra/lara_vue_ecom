@extends('layouts.app')
@section('title')
    product Details
@endsection

@section('content')
{{--    {{$item->name}}--}}
    <product-details :prop-single-item='{!! htmlspecialchars(json_encode($item), ENT_QUOTES, 'UTF-8') !!}' @add-to-cart="updateCart">

    </product-details>
@endsection
