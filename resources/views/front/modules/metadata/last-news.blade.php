
@if (!empty($add_data))
<section class="section last-news">
  @include('front.modules.metadata.module-title')
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
