<section
  class="section cover-image-and-text-two-rows @if(!empty($data['reverse'])) reverse @endif"
  @if(!empty($data['box-color'])) style="background-color: {{$data['box-color']}}"@endif>

  <div class="cover-image-and-text-two-rows__image" style="background-image: url({{ $data['image']['src'] }});"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-7  cover-image-and-text-two-rows__content d-flex align-content-center">
        <div>
          {!! App\Services\Helper::getLocalized($data['text']) !!}
        </div>
      </div>
    </div>
  </div>

</section>
