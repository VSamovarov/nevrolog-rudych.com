@extends('front.layouts.main')

@section('content')
{{-- @dump($main->media[0]->img('page-header')->toHtml())) --}}
{!! $main->getMedia('page-header')[0]->img('page-header')->lazy()->toHtml() !!}
@endsection
