<section class="section padding-none" style="background-color:{{ $color }}">
  <div class="container main-banner">
    <div class="main-banner__wrapper" style="background-image: url({{ asset($data['image']) }});">
      <div class="main-banner__content">
        <div class="main-banner__content-inner">
          <div class="main-banner__text">
            {{$data['text']}}
          </div>
          <div class="main-banner__title">
            {!! $data['title'] !!}
          </div>
          <div class="main-banner__action">
            @if (!empty($data['url']))
            <a class="btn btn-primary" href="{{$data['url']}}">
              {!! $data['action-text'] !!}
            </a>
            @endif

          </div>
        </div>

      </div>
    </div>
  </div>
</section>
