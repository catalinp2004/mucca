@extends('admin.main')
@section('content')
    <div class="row text-center">
        <div class="col-12">
{{--            @dd($category)--}}
            <h1>{{$category->name_ro}}</h1>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12 d-flex flex-column align-items-center">

        </div>
    </div>
@endsection
@section('scripts')
@endsection
