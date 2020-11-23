
@extends('front.layouts.empty')
@section('layout')
  <div id="app">
      @include('front.parts.header')
      <main id="main">
          @yield('content')
      </main>
      @include('front.parts.footer')
  </div>
@endsection
