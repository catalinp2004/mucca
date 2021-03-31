@extends('admin.main')
@section('content')
    <div>
       <categories :categories="{{$categories}}" main_route="{{route('home')}}"></categories>
    </div>
@endsection
@section('scripts')
@endsection
