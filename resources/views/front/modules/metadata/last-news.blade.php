
@if (!empty($add_data))
<section class="section last-news">
  @if ( !empty($data['show-section-title']) && !empty($data['section-title']) )
    <div class="container section__title">
      <div class="h1 text-center">
        {{ App\Services\Helper::getLocalized($data['section-title']) }}
      </div>
    </div>
  @endif
  <div class="container">
    <div class="row">
      @foreach ($add_data as $item)
          <div class="col-md-6">
              @include('front.modules.teaser')
          </div>
      @endforeach
    </div>
  </div>
</section>
@endif
