  @if ( !empty($data['show-section-title']) && !empty($data['section-title']) )
    <div class="container">
      <div class="section__title h1 text-center">
        @if (!empty($data['show-link-section-title']) && !empty($data['link-section-title']) )
        <a class="section__title-link" href="{{$data['link-section-title']}}">
          {{ App\Services\Helper::getLocalized($data['section-title']) }}
        </a>
        @else
          {{ App\Services\Helper::getLocalized($data['section-title']) }}
        @endif
      </div>
    </div>
  @endif
