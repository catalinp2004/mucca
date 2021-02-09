@extends('admin.main')
@section('content')
    <div class="row text-center">
        <div class="col-12">
            <h1>Dashboard</h1>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12 d-flex flex-column align-items-center">
            <a href="{{route('categories.index')}}" class="btn btn-primary text-left my-2"> Categories</a>
            <a href="{{route('products.index')}}}" class="btn btn-primary text-left my-2">Products</a>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
