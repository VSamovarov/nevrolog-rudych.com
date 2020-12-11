{{-- @dump($mainMenuItems) --}}

@if ($mainMenuItems)
    <ul class="main-navbar">
      @foreach ($mainMenuItems as $item)
        <li class="main-navbar__item @if(!empty($item['menu'])) main-navbar__has-submenu @endif @if(!empty($item['active'])) current @endif">
          <a class="{{$item['url']}}" href="index.html">{{$item['title'][app()->getLocale()]}}</a>
          @if (!empty($item['menu']))
            <ul class="main-navbar__sub_navbar">
              @foreach ($item['menu'] as $subitem)
                <li class="@if(!empty($subitem['active'])) current @endif">
                  <a href="grid-blog.html">{{$subitem['title'][app()->getLocale()]}}</a>
                </li>
              @endforeach
            </ul>
          @endif
        </li>
      @endforeach
    </ul>
@endif
