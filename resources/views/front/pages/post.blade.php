@extends('front.layouts.main')

@section('content')
  <div class="container">
    <h1 class="page-title my-5">{{ $main->translateOrDefault()->title }}</h1>
    <div>
      {!! $main->translateOrDefault()->content !!}
    </div>
  </div>
@endsection
