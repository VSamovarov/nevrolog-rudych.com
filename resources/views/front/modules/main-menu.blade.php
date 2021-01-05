@if ($mainMenuItems)
    <ul class="main-navbar">
      @foreach ($mainMenuItems as $item)
        <li class="main-navbar__item @if(!empty($item['menu'])) main-navbar__has-submenu @endif @if(!empty($item['active'])) current @endif">
          <a href="{{App\Services\Helper::getLocalized($item['url'])}}">
            {{App\Services\Helper::getLocalized($item['title'])}}
          </a>
          @if (!empty($item['menu']))
            <ul class="main-navbar__sub_navbar">
              @foreach ($item['menu'] as $subitem)
                <li class="@if(!empty($subitem['active'])) current @endif">
                  <a href="{{App\Services\Helper::getLocalized($subitem['url'])}}">{{App\Services\Helper::getLocalized($subitem['title'])}}</a>
                </li>
              @endforeach
            </ul>
          @endif
        </li>
      @endforeach
      @include('front.modules.lang-menu')
    </ul>
@endif
