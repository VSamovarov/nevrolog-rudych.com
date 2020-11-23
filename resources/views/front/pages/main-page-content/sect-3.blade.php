  @php
    $content = "
      <h3>My Biography</h3>
      <p>I was born in Los Angeles, CA and received my Master’s degree in Psychology from the University of LA in 1989 and my doctorate a year later. I began my professional practice in 1991 as a family therapist.
      Since 1991, I have improved the knowledge received at the university and increased my qualification level.</p>
      <p>A few years later, I have established Sense - my own psychological counseling center where anyone could come to get instant help or consultations on mental and behavioral issues to solve personal problems.</p>
    ";
    $image = 'img/Rudych/nevrolog-rudych.jpg';
    $variant = ""; //reverse
    $color = "#503a87";
  @endphp
  @include('front.modules.cover-image-and-text-two-rows')
