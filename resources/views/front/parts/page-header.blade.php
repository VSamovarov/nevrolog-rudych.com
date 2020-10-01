<div class="page-header">
    <div class="container page-header__top">
        <div class="brand">
            <a href="index.html">
                <img src="{{ asset('img/logo.png') }}" alt="" width="128" height="37">
            </a>
        </div>
        <div class="contacts-wrapper">
            <div class="contacts">
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

            <div class="contacts">
                <div class="contacts__icon"><span class="linearicons-location"></span></div>
                <div class="contacts__content">
                    <p>
                        <a class="" href="#">2130 Fulton Street, San
                            Diego, CA 94117-1080</a>
                    </p>
                </div>
            </div>

            <div class="social-links">
                <p class="social-links__item"><a class="icon-facebook" href="#"></a></p>
                <p class="social-links__item"><a class="icon-twitter" href="#"></a></p>
                <p class="social-links__item"><a class="icon-linkedin-1" href="#"></a></p>
            </div>
        </div>
    </div>
    <div class="page-header__menu">
        <div class="container main-menu-wrapper">
            <div class="main-menu">

                @include('front.parts.main-menu')
            </div>
            <div class="search"></div>
        </div>
    </div>
</div>
