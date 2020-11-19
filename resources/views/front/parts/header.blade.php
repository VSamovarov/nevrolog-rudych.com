<div id="header" class="header">
    <div class="container header__top">
        <div class="d-flex align-items-center">
            <button class="hamburger hamburger--boring" type="button">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
                <span class="hamburger-label">Menu</span>
            </button>


            <a class="brand" href="index.html">
                <span class="brand__img">
                  <img src="{{ asset('img/logo-nejrologia.svg') }}" alt="кабинет невролога">
                </span>
                <span class="brand__text">
                  <span class="brand__title">Кабинет невролога</span>
                  <span class="brand__caption">Катерина Рудич</span>
                </span>
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
