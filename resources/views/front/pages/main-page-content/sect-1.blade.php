  @php
    $data =
    [
      'image' => 'img/Rudych/nevrolog-rudych-2.jpg',
      'title' => 'Improve<br>Your Mental<br>Well-being',
      'text' => 'All Kinds of Counseling',
      'url' => '#',
      'action-text' => 'Action'
    ];
  $color = "#9baacb";

  @endphp
  @include('front.modules.main-banner', ['data'=>$data ])
