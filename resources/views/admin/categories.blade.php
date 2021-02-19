@extends('admin.main')
@section('content')
    <div>
       <categories :categories="{{$categories}}" main_route="{{route('main')}}"></categories>
    </div>
@endsection
@section('scripts')
@endsection
