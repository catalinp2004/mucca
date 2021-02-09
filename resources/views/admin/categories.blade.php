@extends('admin.main')
@section('content')
    <div class="row text-center">
        <div class="col-12">
            <h1>Categories</h1>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12 d-flex flex-column align-items-center">
            @foreach($categories as $category)
                <a href="{{route('categories.show', $category->id)}}" class="btn btn-primary text-left my-2"> {{ $category->name_ro }}</a>
            @endforeach
        </div>
    </div>
@endsection
@section('scripts')
@endsection
