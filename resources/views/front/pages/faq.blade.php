@extends('front.layouts.main')
@section('content')
  @include('front.parts.page-header')
  @if(!empty($main->metadata))
    @include('front.modules.metadata.metadata-loader',['modules'=>$main->metadata])
  @endif

  @if($items->total() > 0)

  <div class="container">
    @foreach ($items as $item)
    <div class="accordion">
      <button class="accordion__button"><div class="pr-5">{{ $item->translation->title }}</div></button>
      <div class="accordion__panel">{!! $item->translation->content !!}</div>
    </div>
    @endforeach
  </div>
  <div class="container">
    {{ $items->links() }}
  </div>
    @else
  @endif
@endsection
