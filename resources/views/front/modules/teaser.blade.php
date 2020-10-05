<div class="teaser  {{ $item['type'] }}">
    <!-- Post Modern-->
    <div class="teaser__thumbnail proportional-block">
        <a class="proportional-block__content_wrapper" href="#">
            <img class="teaser__image" src="{{ $item['thumbnail'] }}" alt="{{ $item['title'] }}">
        </a>
    </div>
    <div class="teaser__text">
        <h4 class="teaser__title">
            <a href="#">{{ $item['title'] }}</a>
        </h4>
        <div class="teaser__meta">
            <div class="teaser__data">
                <time datetime="2019">{{ $item['created_at'] }}</time>
            </div>
            <div class="teaser__tags">
                @foreach ($item['tags'] as $tag)
                    <a href="{{ $tag['url'] }}">
                        {{ $tag['title'] }}
                    </a>
                @endforeach

            </div>
        </div>
        <div class="teaser__excerpt">
            {{ $item['excerpt'] }}
        </div>
    </div>
</div>
