@extends('layouts.app')
@section('title')
    Product Details
@endsection

@section('content')
{{--    {{$item->name}}--}}
    <product-details
        :prop-single-item='{!! htmlspecialchars(json_encode($item), ENT_QUOTES, 'UTF-8')!!}'
        :prop-colors='{!! htmlspecialchars(json_encode($colors), ENT_QUOTES, 'UTF-8')!!}'
        :prop-sizes='{!! htmlspecialchars(json_encode($sizes), ENT_QUOTES, 'UTF-8')!!}'
        :prop-inventory='{!! htmlspecialchars(json_encode($inventory), ENT_QUOTES, 'UTF-8')!!}'>
    </product-details>
@endsection
