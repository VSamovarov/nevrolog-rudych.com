<div id="header" class="header">
    <div class="container header__top">
        <div class="d-flex align-items-center">
            <button class="hamburger hamburger--boring" type="button">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
                <span class="hamburger-label">Menu</span>
            </button>
            <a class="brand" href="/">
                <span class="brand__img">
                  <img src="{{ asset('img/logo-nejrologia.svg') }}" alt="кабинет невролога">
                </span>
                <span class="brand__text">
                  <span class="brand__title">{{ App\Services\Helper::getLocalized(settings()->get('site-title','')) }}</span>
                  <span class="brand__caption">{{ App\Services\Helper::getLocalized(settings()->get('site-sub-title','')) }}</span>
                </span>
            </a>

        </div>
        <div class="contacts-wrapper">
            <div class="contacts">
                <div class="contacts__icon"><span class="linearicons-telephone2"></span></div>
                <div class="contacts__content">
                    <p>
                      <a href="#" data-call-form="call-me-back" class="badge badge-danger text-nowrap text-white">
                        @lang('feedback.callback_text')
                      </a>
                    </p>
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

            <div class="contacts">
                <div class="contacts__icon"><span class="linearicons-location"></span></div>
                <div class="contacts__content">
                    <p>
                        {!! App\Services\Helper::getLocalized(settings()->get('site-address','')) !!}
                    </p>
                </div>
            </div>

            @include('front.modules.social-links')
        </div>
        <div class="dots-menu-button"></div>
    </div>
    <div class="header__menu">
        <div class="container main-menu-wrapper">
            <div class="main-menu">
                @include('front.modules.main-menu')
            </div>

            <div class="search"></div>
        </div>
    </div>
</div>
