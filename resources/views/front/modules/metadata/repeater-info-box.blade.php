@if (isset($data["repeat"]) && is_array($data["repeat"]) && count($data["repeat"]) > 0)
  <section class="section info-block-section c-{{Illuminate\Support\Str::slug($data["box-color"])}}">
    <style>
    .section.info-block-section.c-{{ Illuminate\Support\Str::slug($data["box-color"]) }} { --info-block-color: {{$data["box-color"]}};}
    </style>
    @if ( !empty($data['show-section-title']) && !empty($data['section-title']) )
      <div class="container section__title">
        <div class="h1 text-center">
          {{ App\Services\Helper::getLocalized($data['section-title']) }}
        </div>
      </div>
    @endif
    <div class="container">
      <div class="row">
        @foreach ($data["repeat"] as $item)
          <div class="col-md-4 col-sm-6">
            @if (!isset($item['link']) || $item['link'] === false)
            <div class="info-block">
            @else
            <a href="{{$item['link']}}" class="info-block">
            @endif
              @if ($item['icone'] !== false)
              <div class="info-block__icon">
                <span class="{{$item['icone']}}"></span>
              </div>
              @endif
              <div class="info-block__text_wrapper">
                @if ($item['title'] !== false)
                  <div class="info-block__title">{{ App\Services\Helper::getLocalized($item['title']) }}</div>
                @endif
                @if ($item['text'] !== false)
                <div class="info-block__text">{{ App\Services\Helper::getLocalized($item['text']) }}</div>
                @endif
              </div>
            </div>
            @if (!isset($item['link']) || $item['link'] === false)
            </div>
            @else
            </a>
            @endif
        @endforeach
      </div>
    </div>
  </section>
@endif
