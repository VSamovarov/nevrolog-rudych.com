<section class="section adress-and-callback-form padding-none" style="background: #fdf5fc">
  <div class="container">
    <div class="row">
      <div class="col-md-6 pr-5 py-5">
        <h2>Get in Touch</h2>
        @include('front.modules.call-back-form')
      </div>
      <div class="col-md-6 google-maps">
        @php
            $map='<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10162.66134585356!2d30.536877!3d50.447334!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xbe4a6a87072f3a75!2z0JLQtdGA0YXQvtCy0L3QsNGPINCg0LDQtNCwINCj0LrRgNCw0LjQvdGL!5e0!3m2!1sru!2sua!4v1606084741591!5m2!1sru!2sua" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>';
        @endphp
        <div class="google-maps__wrapper" id="google-maps">
            <iframe class="map-adress__map lazyload" width="100%" height="100%" frameborder="0" scrolling="no"
                marginheight="0" marginwidth="0"
                src="{{ App\Services\Helper::parsingMapsHtmlCode($map,app()->getLocale()) }}">
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
                <p>
                  <a class="text-nowrap" href="tel:#">1-800-1234-567</a>
                <p>
                </p>
                <a class="text-nowrap" href="tel:#">1-800-8763-765</a>
                </p>
            </div>
        </div>
      </div>
      <div class="col">
        <div class="contacts justify-content-center">
            <div class="contacts__icon"><span class="linearicons-location"></span></div>
            <div class="contacts__content">
                <p>
                    <a class="" href="#">2130 Fulton Street, San
                        Diego, CA 94117-1080</a>
                </p>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>
