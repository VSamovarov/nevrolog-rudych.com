@extends('front.layouts.main')

@section('content')
  @if(!empty($main->metadata))
    @include('front.modules.metadata.metadata-loader',['modules'=>$main->metadata])
  @endif
@endsection
