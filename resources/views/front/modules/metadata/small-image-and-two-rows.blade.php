    <section class="section image-and-text-two-rows @if(empty($data['reverse'])) reverse @endif">
      @include('front.modules.metadata.module-title')
      <div class="container">
        <div class="row image-and-text-two-rows__wrapper">
          <div class="col-md-6 image-and-text-two-rows__image">
            <img src="{{ $data['image']['src'] }}"/>
          </div>
          <div class="col-md-6">
            {!! App\Services\Helper::getLocalized($data['text']) !!}
          </div>
        </div>
      </div>
    </section>
