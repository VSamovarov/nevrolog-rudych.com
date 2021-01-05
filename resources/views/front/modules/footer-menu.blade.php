@if ($mainMenuItems)
    <ul class="list-nav">
      @foreach ($mainMenuItems as $item)
        <li>
          <a  class="@if(!empty($item['active'])) current @endif" href="{{App\Services\Helper::getLocalized($item['url'])}}">
            {{App\Services\Helper::getLocalized($item['title'])}}
          </a>
        </li>
      @endforeach
    </ul>
@endif
