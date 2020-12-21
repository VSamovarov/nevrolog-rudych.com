@if($main)
{{-- @dump($main) --}}
<title>
    {{ strip_tags( $main->translateOrDefault()->metatitle ?? $main->translateOrDefault()->title) }} - {{ strip_tags(App\Services\Helper::getLocalized(settings()->get('site-title',config('app.name')))) }}
</title>
<meta name="description" itemprop="description"
    content="{{ strip_tags($main->translateOrDefault()->metadescription??Str::limit(strip_tags($main->translateOrDefault()->excerpt),255)) }}" />
<meta name="keywords" content="{{ strip_tags($main->translateOrDefault()->metakeys??'')  }}" />
<meta property="article:published_time" content="{{$main->created_at}}" />
<meta property="article:section" content="event" />

<meta property="og:description" content="{{ Str::limit(strip_tags($main->translateOrDefault()->excerpt??'')) }}" />
<meta property="og:title" content="{{ strip_tags($main->translateOrDefault()->title) }}" />
<meta property="og:url" content="{{url()->current()}}" />
<meta property="og:type" content="article" />
<meta property="og:locale" content="uk_UA" />
<meta property="og:locale:alternate" content="ru_RU" />
<meta property="og:site_name" content="{{ strip_tags(App\Services\Helper::getLocalized(settings()->get('site-title',config('app.name')))) }}" />

@if($main->thumbnail)
<meta property="og:image:url" content="{{ $main->thumbnail->getUrl() }}" />
@endif

<meta name="twitter:card" content="summary" />
<meta name="twitter:title" content="{{ $main->translateOrDefault()->title }}" />
@endif
