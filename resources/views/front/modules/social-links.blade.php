<div class="social-links">
    {{-- <p class="social-links__item"><a class="icon-facebook" href="#"></a></p>
    <p class="social-links__item"><a class="icon-twitter" href="#"></a></p>
    <p class="social-links__item"><a class="icon-linkedin-1" href="#"></a></p> --}}
    @if ( settings()->get('site-instagram','') )
      <p class="social-links__item">
        <a class="icon-instagram" class="text-nowrap" href="{{ settings()->get('site-instagram','') }}">Instagram</a>
      </p>
    @endif
    @if (settings()->get('site-facebook',''))
      <p class="social-links__item">
        <a class="icon-facebook" class="text-nowrap" href="{{ settings()->get('site-facebook','') }}">Facebook</a>
      </p>
    @endif
</div>
