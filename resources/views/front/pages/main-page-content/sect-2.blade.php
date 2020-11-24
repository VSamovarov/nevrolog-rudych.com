  @php
    $content = "
      <h3>
          A Few Words About Me
      </h3>
      <p>
          My name is Samantha Porter and I’m a psychologist and a cognitive behavioral therapist who has
          worked with hundreds of patients.
      </p>
      <p>
          My work revolves around being friendly, disciplined, and organized yet flexible. I help my patients
          resolve their emotional issues of the past and the present, to open the door to a brighter and
          confident future.
      </p>
    ";
    $image = 'img/large-features-3-570x368.jpg';
    $variant = "reverse";
  @endphp
  @include('front.modules.image-and-text-two-rows')
