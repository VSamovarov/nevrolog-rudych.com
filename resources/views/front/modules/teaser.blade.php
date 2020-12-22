<div class="teaser  {{ $item->type }}">
    <!-- Post Modern-->
    <div class="teaser__thumbnail proportional-block">
        <a class="proportional-block__content_wrapper" href="{{ t_route('post.show',['type'=>$item->type, 'id'=>$item->id]) }}">
            @if (
              !empty($item->media)
              && !empty($item->getMedia('thumbnail'))
              && !empty($item->getMedia('thumbnail')[0])
              && !empty($item->getMedia('thumbnail')[0]->getSrcset('thumb'))
            )
            <img
              loading="lazy"
              class="teaser__image"
              srcset="{{ $item->getMedia('thumbnail')[0]->getSrcset('thumb') }}"
              alt="{{ $item->translation->title }}">
            @endif
        </a>
    </div>
    <div class="teaser__text">
        <h4 class="teaser__title">
            <a href="{{ t_route('post.show',['type'=>$item->type, 'id'=>$item->id]) }}">{{ $item->translation->title }}</a>
        </h4>
        <div class="teaser__meta">
            <div class="teaser__data">
                <time datetime="{{ $item->created_at }}">{{ $item->date_add }}</time>
            </div>
            {{-- <div class="teaser__tags">
                @foreach ($item->tags as $tag)
                    <a href="{{ $tag->url }}">
                        {{ $tag->title }}
                    </a>
                @endforeach
            </div> --}}
        </div>
        <div class="teaser__excerpt">
            {{ $item->translation->excerpt }}
        </div>
    </div>
</div>
