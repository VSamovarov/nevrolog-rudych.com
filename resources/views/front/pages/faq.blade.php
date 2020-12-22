@extends('front.layouts.main')
@section('content')
  @include('front.parts.page-header')
  @if(!empty($main->metadata))
    @include('front.modules.metadata.metadata-loader',['modules'=>$main->metadata])
  @endif
  @dump($items)
  @if($items->total() > 0)

  <div class="container">
      <div class="row">
          @foreach ($items as $item)
            <div class="mb-4">
              <h2>
                {{ $item->translation->title }}
              </h2>
              <div class="pl-5">
                {{ $item->translation->content }}
              </div>
            </div>
            <hr>
          @endforeach
      </div>
  </div>
  <div class="container">
    {!! $items->links() !!}
  </div>
  @else
  @endif
@endsection
