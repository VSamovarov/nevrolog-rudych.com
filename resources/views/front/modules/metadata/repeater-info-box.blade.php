@if (isset($data["repeat"]) && is_array($data["repeat"]) && count($data["repeat"]) > 0)
  <section
    class="section info-block-section c-{{Illuminate\Support\Str::slug($data["box-color"]??'')}} @if (isset($data['content-align-center']) &&  $data['content-align-center'] === true) center @endif"
  >
    <style>
    .section.info-block-section.c-{{ Illuminate\Support\Str::slug($data["box-color"]??'') }} { --info-block-color: {{$data["box-color"]??''}};}
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
          <div class="col">
            @if (isset($item['show-link']) && $item['show-link'] === false || empty($item['link']) )
            <div class="info-block">
            @else
            <a href="{{$item['link']}}" class="info-block">
            @endif
              @if ( empty($item['show-icone']) || $item['show-icone'] === true)
              <div class="info-block__icon">
                <span class="{{$item['icone']??''}}"></span>
              </div>
              @endif
              <div class="info-block__text_wrapper">
                @if (empty($item['show-icone']) || $item['show-icone'] === true)
                  <div class="info-block__title">{{ App\Services\Helper::getLocalized($item['title']??'') }}</div>
                @endif
                @if (empty($item['show-text']) || $item['show-text'] === true)
                <div class="info-block__text">{{ App\Services\Helper::getLocalized($item['text']??'') }}</div>
                @endif
              </div>
            </div>
            @if (isset($item['show-link']) && $item['show-link'] === false || empty($item['link']) )
            </div>
            @else
            </a>
            @endif
        @endforeach
      </div>
    </div>
  </section>
@endif
