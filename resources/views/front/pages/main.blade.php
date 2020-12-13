@extends('front.layouts.main')

@section('content')
  @if(!empty($main->metadata))
    @include('front.modules.metadata.metadata-loader',['modules'=>$main->metadata])
  @endif
  {{-- @include('front.pages.main-page-content.sect-1') --}}
  @include('front.pages.main-page-content.sect-2')
  @include('front.pages.main-page-content.sect-4')
  @include('front.pages.main-page-content.sect-3')
  @include('front.pages.main-page-content.sect-5')
  @include('front.pages.main-page-content.sect-2')
  @include('front.modules.map-and-callback-form-section')
  @include('front.pages.main-page-content.sect-6')
@endsection
