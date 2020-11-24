  @php
    $data =
    [
      [
        'url'=> '',
        'icon'=> 'linearicons-trophy2',
        'title'=> '10 Years of Experience',
        'text'=> 'Ut porttitor leo a diam sollicitudin tempor id eu nisl. Neque volutpat ac tincidunt vitae semper quis lectus nulla at.',
      ],
      [
        'url'=> '',
        'icon'=> 'linearicons-lifebuoy',
        'title'=> 'Free Consultations',
        'text'=> 'Nec ultrices dui sapien eget mi. Lorem ipsum dolor sit amet consectetur adipiscing elit duis tristique.',
      ],
      [
        'url'=> '',
        'icon'=> 'linearicons-clipboard-check',
        'title'=> '100% Guaranteed',
        'text'=> 'Integer quis auctor elit sed. Adipiscing commodo elit at imperdiet dui accumsan. Adipiscing bibendum est ultricies integer quis auctor elit.',
      ],
    ];
  $color = "#984c8a";
  $class = "info-block-section";
  $variant = "";
  $section_title = "";
  @endphp
  @include('front.modules.section',['color'=>$color,'data'=>$data, 'variant' => $variant, 'section_title'=>$section_title])
