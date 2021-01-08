@if (isset($data["repeat"]) && is_array($data["repeat"]) && count($data["repeat"]) > 0)
  <section
    class="section info-block-section c-{{Illuminate\Support\Str::slug($data["box-color"]??'')}}"
  >
  @include('front.modules.metadata.module-title')

  <div class="container">
    <div class="row">
      @foreach ($data["repeat"] as $item)
      <div class="col">
        <div class="editor">
          {!! App\Services\Helper::getLocalized($item??'') !!}
        </div>
      </div>
      @endforeach
    </div>
  </div>
  </section>
@endif
