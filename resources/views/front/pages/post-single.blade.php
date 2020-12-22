@extends('front.layouts.main')
@section('content')
  <div class="container post-single">
    <div class="post-single">
      <h1 class="post-single__title page-title my-5">{{ $main->translateOrDefault()->title }}</h1>

      @if (!empty($main) && !empty($main->getMedia('thumbnail')) && !empty($main->getMedia('thumbnail')[0]))
      <div class="post-single__thumbnail">
        <img
        loading="lazy"
        class="teaser__image"
        srcset="{{ $main->getMedia('thumbnail')[0]->getSrcset('thumb') }}"
        alt="{{ $main->translateOrDefault()->title }}">
      </div>
      @endif


      <ul class="post-single__meta">
        <li>
          <span class="linearicons-calendar-empty"></span>
          <time datetime="{{$main->created_at}}">{{$main->date_add}}</time>
        </li>
        <li>
          <span class="linearicons-label"></span>
          <a href="{{ t_route('post.index',$main->type) }}">{{ $type_data->translateOrDefault()->title }}</a>
        </li>
      </ul>

      <div class="post-single__content">
        {!! $main->translateOrDefault()->content !!}
      </div>
    </div>
  </div>
@endsection
