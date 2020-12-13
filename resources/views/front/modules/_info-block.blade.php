<style>
.section.info-block-section.c-{{ Illuminate\Support\Str::slug($color) }}@if(!empty($variant)).{{$variant}}@endif{
  --info-block-color: {{$color}};
}
</style>
<div class="container">
  <div class="row">
    @foreach ($data as $item)
      <div class="col-md-4 col-sm-6">
        @if (empty($item['url']))
        <div class="info-block">
        @else
        <a href="{{$item['url']}}" class="info-block">
        @endif
          @if (!empty($item['icon']))
          <div class="info-block__icon">
            <span class="{{$item['icon']}}"></span>
          </div>
          @endif
          <div class="info-block__text_wrapper">
            <div class="info-block__title">{{$item['title']}}</div>
            <div class="info-block__text">{{$item['text']}}</div>
          </div>
        </div>
        @if (empty($item['url']))
        </div>
        @else
        </a>
        @endif
    @endforeach
  </div>
</div>
