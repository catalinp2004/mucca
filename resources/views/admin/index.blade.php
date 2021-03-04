@extends('admin.main')
@section('content')
    <div class="row text-center">
        <div class="col-12">
            <h1>Welcome to the playground!</h1>
        </div>
    </div>
    <hr class="my-5">
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            <a href="{{route('categories.index')}}" class="btn-dashboard mx-3"><i class="fas fa-sitemap mb-3"></i> <span>Categories</span></a>
            <a href="{{route('products.index')}}" class="btn-dashboard mx-3"><i class="fas fa-shopping-cart mb-3"></i> <span>Products</span></a>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
