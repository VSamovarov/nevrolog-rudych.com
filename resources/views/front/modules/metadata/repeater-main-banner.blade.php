@if (isset($data["repeat"]) && is_array($data["repeat"]) && count($data["repeat"]) > 0)
  <section class="section padding-none" style="background-color:#9baacb">
  @foreach ($data["repeat"] as $item)
    <div class="container main-banner">
      <div class="main-banner__wrapper" style="background-image: url({{ $item['image']['src'] }});">
        <div class="main-banner__content">
          <div class="main-banner__content-inner">
            <div class="main-banner__text">
              {{ App\Services\Helper::getLocalized($item['text']) }}
            </div>
            <div class="main-banner__title">
              {{ App\Services\Helper::getLocalized($item['title']) }}
            </div>
            <div class="main-banner__action">
              @if (!empty($item['link']) && !empty($item['action_name']))
              <a class="btn btn-primary" href="{{$item['link']}}">
                {{ App\Services\Helper::getLocalized($item['action_name']) }}
              </a>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  @endforeach
  </section>
@endif


    {{-- <section class="section padding-none" style="background-color:#9baacb">
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
</section> --}}
