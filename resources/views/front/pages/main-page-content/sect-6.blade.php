  @php
    $data =
    [
      [
        'url'=> '#',
        'icon'=> '',
        'title'=> 'Individuals',
        'text'=> 'Individual counseling can help one deal with many personal topics in life such as anger, depression, anxiety, marriage and relationship challenges.',
      ],
      [
        'url'=> '#',
        'icon'=> '',
        'title'=> 'Couples',
        'text'=> 'My couples counseling services can not only solve the problems the couple is facing with each other, but also revive the feeling of love.',
      ],
      [
        'url'=> '#',
        'icon'=> '',
        'title'=> 'Families',
        'text'=> 'Family counseling is designed to address specific issues that affect the psychological health of the family and each of its members.',
      ],
    ];
    $color = "";
    $class = "info-block-section";
    $variant = "";
    $section_title = "";
  @endphp
  @include('front.modules.section',['color'=>$color,'data'=>$data, 'class'=>$class, 'variant' => $variant, 'section_title'=>$section_title])
