
{{-- <ul class="main-navbar lang-menu">
    @foreach(app('localizer')->getSupportedLocales() as $lang)
        <li class="main-navbar__item{{  $lang['slug'] === app()->getLocale()? ' active':''}}">
            @if($lang['slug'] === app()->getLocale())
                <span rel="alternate" hreflang="{{ $lang['slug'] }}">
                    {{ $lang['slug'] }}
                </span>
            @else
                <a
                    rel="alternate" hreflang="{{ $lang['slug'] }}"
                    href="{{$main->translations->where('lang', $lang['slug'])->first()->url}}">
                    {{ $lang['slug'] }}
                </a>
            @endif
        </li>
    @endforeach
  </ul> --}}

  @foreach(app('localizer')->getSupportedLocales() as $lang)
    @if($lang['slug'] === app()->getLocale())
        <li class="main-navbar__item main-navbar__has-submenu">
          <a class="text-uppercase small font-weight-bold" href="{{$main->translations->where('lang', $lang['slug'])->first()->url}}">
            {{$lang['slug']}}
          </a>
            @foreach(app('localizer')->getSupportedLocales() as $otherlang)
            @if($otherlang['slug'] !== app()->getLocale())
              <ul class="main-navbar__sub_navbar">
                <li class="">
                  <a class="text-uppercase small" href="{{$main->translations->where('lang', $otherlang['slug'])->first()->url}}">
                    {{$otherlang['slug']}}
                  </a>
                </li>
              </ul>
            @endif
            @endforeach
        </li>
    @endif
  @endforeach
