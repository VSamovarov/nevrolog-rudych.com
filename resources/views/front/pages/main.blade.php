@extends('front.layouts.main')

@section('content')
  @include('front.modules.main-banner')
  @include('front.modules.image-end-text-two-rows')
  @include('front.modules.cover-image-end-text-two-rows')

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


  @php
    $data =
    [
      [
        'url'=> '#',
        'icon'=> 'linearicons-user',
        'title'=> 'Individuals',
        'text'=> 'Individual counseling can help one deal with many personal topics in life such as anger, depression, anxiety, marriage and relationship challenges.',
      ],
      [
        'url'=> '#',
        'icon'=> 'linearicons-group-work',
        'title'=> 'Couples',
        'text'=> 'My couples counseling services can not only solve the problems the couple is facing with each other, but also revive the feeling of love.',
      ],
      [
        'url'=> '#',
        'icon'=> 'linearicons-tree',
        'title'=> 'Families',
        'text'=> 'Family counseling is designed to address specific issues that affect the psychological health of the family and each of its members.',
      ],
    ];
    $color = "#503a87";
    $class = "info-block-section";
    $variant = "center";
    $section_title = "Who I Work With";
  @endphp
  @include('front.modules.section',['color'=>$color,'data'=>$data, 'class'=>$class, 'variant' => $variant, 'section_title'=>$section_title])


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
    $color = "#503a87";
    $class = "info-block-section";
    $variant = "";
    $section_title = "";
  @endphp
  @include('front.modules.section',['color'=>$color,'data'=>$data, 'class'=>$class, 'variant' => $variant, 'section_title'=>$section_title])
@endsection
