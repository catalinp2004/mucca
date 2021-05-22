@extends('main')

@section('title', 'Catalog - Mucca - Playfully Committed')
    
@section('body_content')
<div id="app" class="d-flex flex-column">
    <App></App>
</div>
@endsection

@section('scripts')    
    <script src="{{ mix('js/app.js') }}"></script>
@endsection
