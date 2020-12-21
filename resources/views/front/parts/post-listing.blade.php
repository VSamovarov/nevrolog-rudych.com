@if($items->total() > 0)

<div class="container">
    <div class="row">
        @foreach ($items as $item)
            <div class="col-md-6">
                @include('front.modules.teaser')
            </div>
        @endforeach
    </div>
</div>
<div class="container">
  {{ $items->links() }}
</div>
@else
@endif
