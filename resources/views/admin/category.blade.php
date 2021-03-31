@extends('admin.main')
@section('content')
      <category :category="{{$category}}" main_route="{{route('home')}}"></category>
@endsection
@section('scripts')
@endsection
