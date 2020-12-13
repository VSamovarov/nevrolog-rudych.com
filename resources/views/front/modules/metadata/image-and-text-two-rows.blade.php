@if (!empty($data['image']['src']) && !empty($data['text']))
  @if(empty($data['big-image']))
    @include("front.modules.metadata.small-image-and-two-rows",['data'=>$data])
  @else
    @include("front.modules.metadata.big-image-and-two-rows",['data'=>$data])
  @endif
@endif
