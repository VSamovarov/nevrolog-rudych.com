@if (isset($data["repeat"]) && is_array($data["repeat"]) && count($data["repeat"]) > 0)
  <section
    class="section info-block-section c-{{Illuminate\Support\Str::slug($data["box-color"]??'')}}"
  >
    @if ( !empty($data['show-section-title']) && !empty($data['section-title']) )
    <div class="container section__title">
      <div class="h1 text-center">
        {{ App\Services\Helper::getLocalized($data['section-title']) }}
      </div>
    </div>
  @endif
  </section>
  <div class="container">
    <div class="row">
      @foreach ($data["repeat"] as $item)
      <div class="col">
        <div>
          {!! App\Services\Helper::getLocalized($item??'') !!}
        </div>
      </div>
      @endforeach
    </div>
  </div>
@endif
