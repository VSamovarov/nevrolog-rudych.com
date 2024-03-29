@if (isset($data["repeat"]) && is_array($data["repeat"]) && count($data["repeat"]) > 0)
  <section
    class="section info-block-section c-{{Illuminate\Support\Str::slug($data["box-color"]??'')}} @if (isset($data['content-align-center']) &&  $data['content-align-center'] === true) center @endif"
  >
    <style>
    .section.info-block-section.c-{{ Illuminate\Support\Str::slug($data["box-color"]??'') }} { --info-block-color: {{$data["box-color"]??''}};}
    </style>
    @include('front.modules.metadata.module-title')
    <div class="container">
      <div class="row">
        @foreach ($data["repeat"] as $item)
          <div class="col">
            @if (isset($data['show-link']) && $data['show-link'] === false || empty($item['link']) )
            <div class="info-block">
            @else
            <a href="{{App\Services\Helper::getLocalized($item['link']??'')}}" class="info-block">
            @endif
              @if ( !isset($data['show-icone']) || $data['show-icone']??false )
              <div class="info-block__icon">
                <span class="{{$item['icone']??''}}"></span>
              </div>
              @endif
              <div class="info-block__text_wrapper">
                @if ( !isset($data['show-title']) || $data['show-title']??false)
                  <div class="info-block__title">{{ App\Services\Helper::getLocalized($item['title']??'') }}</div>
                @endif
                @if ( !isset($data['show-text']) || $data['show-text']??false)
                <div class="info-block__text">{{ App\Services\Helper::getLocalized($item['text']??'') }}</div>
                @endif
              </div>
            </div>
            @if (isset($data['show-link']) && $data['show-link'] === false || empty($item['link']) )
            </div>
            @else
            </a>
            @endif
        @endforeach
      </div>
    </div>
  </section>
@endif
