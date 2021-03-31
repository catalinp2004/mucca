@extends('admin.main')
@section('content')
    <products
        main_route="{{route('home')}}"
        msg="{{request()->session()->get('msg')}}"
        @if(request()->session()->get('filter_categories')) :filter_categories="{{  request()->session()->get('filter_categories') }}" @endif
        :products_prop="{{$products}}"
        :categories_options="{{$categories_options}}"
    ></products>
@endsection
@section('scripts')
@endsection
