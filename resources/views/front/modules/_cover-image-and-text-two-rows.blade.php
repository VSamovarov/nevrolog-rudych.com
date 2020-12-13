<section class="section cover-image-and-text-two-rows @if(!empty($variant)){{$variant}}@endif" style="background-color: {{$color}}">
  <div class="cover-image-and-text-two-rows__image" style="background-image: url({{ asset($image) }});"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-7  cover-image-and-text-two-rows__content d-flex align-content-center">
        <div>
          {!! $content !!}
        </div>
      </div>
    </div>
  </div>

</section>
