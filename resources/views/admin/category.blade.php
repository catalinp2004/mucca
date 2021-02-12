@extends('admin.main')
@section('content')
    <div id="app">
      <category :category="{{$category}}"></category>
    </div>
@endsection
@section('scripts')
@endsection
