@extends('layouts.app')
@section('title')
    Collection page
@endsection

@section('content')
{{--    @foreach($data as $item)--}}
{{--        <p>{{$item->name}}</p>--}}
{{--    @endforeach--}}
<product-list :prop-item='{!! htmlspecialchars(json_encode($data), ENT_QUOTES, 'UTF-8') !!}'>

</product-list>
@endsection
