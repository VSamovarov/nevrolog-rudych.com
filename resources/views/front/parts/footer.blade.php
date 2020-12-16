<footer id="footer" class="footer">
    <div class="container footer__wrapper">
        <div class="footer__menu">
            @include('front.modules.footer-menu')
            @include('front.modules.social-links')
        </div>
        <hr />
        <div class="footer__footer">
            <a class="brand" href="/">
                <span class="brand__img">
                  <img src="{{ asset('img/logo-nejrologia.svg') }}" alt="кабинет невролога">
                </span>
                <span class="brand__text">
                  <span class="brand__title">{{ App\Services\Helper::getLocalized(settings()->get('site-title','')) }}</span>
                  <span class="brand__caption">{{ App\Services\Helper::getLocalized(settings()->get('site-sub-title','')) }}</span>
                </span>
            </a>
            <div class="rights">
                <span>©&nbsp;</span>
                <span class="copyright-year">2020&nbsp;</span>
                <span>All Rights Reserved.&nbsp;</span>
                <br class="d-sm-none">
                {{-- <a href="privacy-policy.html">Privacy Policy</a> --}}
            </div>
        </div>
    </div>
</footer>
