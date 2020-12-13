<section class="section image-and-text-two-rows @if(!empty($variant)){{$variant}}@endif">
    <div class="container">
        <div class="row image-and-text-two-rows__wrapper">
            <div class="col-md-6 image-and-text-two-rows__image">
              <img src="{{ $image }}"/>
            </div>
            <div class="col-md-6">
              {!! $content !!}
            </div>
        </div>
    </div>
</section>
