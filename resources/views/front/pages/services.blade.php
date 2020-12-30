@extends('front.layouts.main')
@section('content')
  {{-- @include('front.parts.page-header') --}}
  @if(!empty($main->metadata))
    @include('front.modules.metadata.metadata-loader',['modules'=>$main->metadata])
  @endif
@endsection
