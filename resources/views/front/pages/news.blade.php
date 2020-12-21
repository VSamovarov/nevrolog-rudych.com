@extends('front.layouts.main')

@section('content')
@include('front.parts.page-header')
@include('front.parts.post-listing',['items'=>$items])
@endsection
