<section class="section adress-and-callback-form padding-none" style="background: #fdf5fc">
  <div class="container">
    <div class="row">
      <div class="col-md-6 pr-5 py-5">
        <h2>@lang('feedback.feedback_text')</h2>
        @include('front.forms.call-back-form')
      </div>
      <div class="col-md-6 google-maps">

        <div class="google-maps__wrapper" id="google-maps">
            <iframe class="map-adress__map lazyload" width="100%" height="100%" frameborder="0" scrolling="no"
                marginheight="0" marginwidth="0"
                src="{{ App\Services\Helper::parsingMapsHtmlCode(settings()->get('site-address-map',''),app()->getLocale()) }}">
            </iframe>
        </div>
      </div>
    </div>
      </div>
</section>
<section class="section contacts-section padding-none" style="background: #fbe7f8">
  <div class="container">
    <div class="row py-4">
      <div class="col">
        <div class="contacts justify-content-center">
            <div class="contacts__icon"><span class="linearicons-telephone2"></span></div>
            <div class="contacts__content">
                    @if (settings()->get('site-phone-first',''))
                      <p>
                        <a class="text-nowrap" href="tel:+8{{ App\Services\Helper::clearPhone(settings()->get('site-phone-first','')) }}">
                          {{settings()->get('site-phone-first','')}}
                        </a>
                      </p>
                    @endif
                    @if (settings()->get('site-phone-two',''))
                      <p>
                        <a class="text-nowrap" href="tel:+8{{ App\Services\Helper::clearPhone(settings()->get('site-phone-two','')) }}">
                          {{settings()->get('site-phone-two','')}}
                        </a>
                      </p>
                    @endif
                    @if (settings()->get('site-phone-three',''))
                    <p>
                      <a class="text-nowrap" href="tel:+8{{ App\Services\Helper::clearPhone(settings()->get('site-phone-three','') )}}">
                        {{settings()->get('site-phone-three','')}}
                      </a>
                    </p>
                    @endif
            </div>
        </div>
      </div>
      <div class="col">
        <div class="contacts justify-content-center">
            <div class="contacts__icon"><span class="linearicons-location"></span></div>
            <div class="contacts__content">
                <p>
                  {!! App\Services\Helper::getLocalized(settings()->get('site-address','')) !!}
                </p>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>
