<div class="section page-header bg-image bg-image--title">
    @if ($main->thumbnail && $main->thumbnail->img('page-header'))
      <img class="bg-image__image lazyload" data-srcset="{{ $main->thumbnail->getSrcset('page-header') }}" data-sizes="auto" />
    @endif
    {{-- <div class="container">
        @include('front.modules.breadcrumbs')
    </div> --}}

    <div class="container section__body page-header__text">
        <h1 class="page-title page-header__title">{{ $main->translateOrDefault()->title }}</h1>
        @if ($main->translateOrDefault()->excerpt)
          {{ $main->translateOrDefault()->excerpt }}
        @endif
    </div>
</div>
