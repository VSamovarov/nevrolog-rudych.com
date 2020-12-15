@if ($mainMenuItems)
    <ul class="list-nav">
      @foreach ($mainMenuItems as $item)
        <li>
          <a  class="@if(!empty($item['active'])) current @endif" href="{{$item['url']}}">{{$item['title']}}</a>
        </li>
      @endforeach
    </ul>
@endif
