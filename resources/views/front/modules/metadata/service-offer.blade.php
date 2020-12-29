    <section class="section service-offer-section">
      @if ( !empty($data['show-section-title']) && !empty($data['section-title']) )
        <div class="container section__title">
          <div class="h1 text-center">
            {{ App\Services\Helper::getLocalized($data['section-title']) }}
          </div>
        </div>
      @endif
      <div class="container">
        <div class="service-offer">
          <div class="service-offer__image bg-image">
            <img class="bg-image__image lazyload" data-src="{{ $data['image']['src'] }}" data-sizes="auto" />
          </div>
          <div class="service-offer__description">
            <h2 class="service-offer__title text-break">
              {!! App\Services\Helper::getLocalized($data['title']) !!}
            </h2>

            <div class="service-offer__offer">
              <div class="service-offer__offer-time">
                <span class="linearicons-clock3"></span>&nbsp;@lang('content.duration'): {{$data['time']}}&nbsp;@lang('content.minutes')
              </div>
              <div class="service-offer__offer-price">
                <span class="linearicons-tag"></span>&nbsp;@lang('content.cost'): {{$data['price']}}&nbsp;₴
              </div>
            </div>
            <div class="service-offer__text">
              {!! App\Services\Helper::getLocalized($data['text']) !!}
            </div>
          </div>
        </div>
      </div>
    </section>
