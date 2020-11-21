<section class="section {{ $class }} @if(!empty($variant)){{$variant}}@endif c-{{Illuminate\Support\Str::slug($color)}}">
  @if ( $section_title )
    <div class="container section__title">
      <div class="h1 text-center">
        {{ $section_title }}
      </div>
    </div>
  @endif
  @include('front.modules.info-block',['color'=>$color,'data'=>$data, 'variant'=>$variant])
</section>
