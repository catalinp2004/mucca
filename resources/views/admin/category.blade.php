@extends('admin.main')
@section('content')
      <category :category="{{$category}}" main_route="{{route('main')}}"></category>
@endsection
@section('scripts')
@endsection
