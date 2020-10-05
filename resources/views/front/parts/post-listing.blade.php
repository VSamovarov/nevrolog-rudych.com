@php
$items = [
[
'title' => 'How I Consult My Clients',
'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
dolore magna aliqua. Eu augue ut lectus arcu. Sit amet volutpat consequat mauris nunc.',
'thumbnail' => 'https://livedemo00.template-help.com/wt_prod-23641/images/grid-blog-1-571x353.jpg',
'created_at' => 'Apr 21, 2019 at 12:05 pm',
'id' => 1,
'type' => 'post',
'tags' => [
[
'title' => 'News',
'url' => "#"
]
]
],
[
'title' => 'What Does Loneliness Mean for Your Health?',
'excerpt' => 'Nulla posuere sollicitudin aliquam ultrices sagittis orci. Blandit aliquam etiam erat velit scelerisque in
dictum. Egestas purus viverra accumsan in nisl nisi scelerisque.Nulla posuere sollicitudin aliquam ultrices sagittis
orci. Blandit aliquam etiam erat velit scelerisque in
dictum. Egestas purus viverra accumsan in nisl nisi scelerisque.',
'thumbnail' => 'https://livedemo00.template-help.com/wt_prod-23641/images/grid-blog-2-571x353.jpg',
'created_at' => 'Apr 21, 2019 at 12:05 pm',
'id' => 1,
'type' => 'post',
'tags' => [
[
'title' => 'News',
'url' => "#"
]
]
],
[
'title' => 'How I Consult My Clients How I Consult My Clients How I Consult My Clients How I Consult My Clients',
'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
dolore magna aliqua. Eu augue ut lectus arcu. Sit amet volutpat consequat mauris nunc.',
'thumbnail' => 'https://livedemo00.template-help.com/wt_prod-23641/images/grid-blog-1-571x353.jpg',
'created_at' => 'Apr 21, 2019 at 12:05 pm',
'id' => 1,
'type' => 'post',
'tags' => [
[
'title' => 'News',
'url' => "#"
]
]
],
[
'title' => 'What Does Loneliness Mean for Your Health?',
'excerpt' => 'Nulla posuere sollicitudin aliquam ultrices sagittis orci..',
'thumbnail' => 'https://livedemo00.template-help.com/wt_prod-23641/images/grid-blog-2-571x353.jpg',
'created_at' => 'Apr 21, 2019 at 12:05 pm',
'id' => 1,
'type' => 'post',
'tags' => [
[
'title' => 'News',
'url' => "#"
]
]
],
[
'title' => 'How I Consult My Clients',
'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
dolore magna aliqua. Eu augue ut lectus arcu. Sit amet volutpat consequat mauris nunc.',
'thumbnail' => 'https://livedemo00.template-help.com/wt_prod-23641/images/grid-blog-1-571x353.jpg',
'created_at' => 'Apr 21, 2019 at 12:05 pm',
'id' => 1,
'type' => 'post',
'tags' => [
[
'title' => 'News',
'url' => "#"
]
]
],
[
'title' => 'What Does Loneliness Mean for Your Health?',
'excerpt' => 'Nulla posuere sollicitudin aliquam ultrices sagittis orci. Blandit aliquam etiam erat velit scelerisque in
dictum. Egestas purus viverra accumsan in nisl nisi scelerisque.',
'thumbnail' => 'https://livedemo00.template-help.com/wt_prod-23641/images/grid-blog-2-571x353.jpg',
'created_at' => 'Apr 21, 2019 at 12:05 pm',
'id' => 1,
'type' => 'post',
'tags' => [
[
'title' => 'News',
'url' => "#"
]
]
],
[
'title' => 'How I Consult My Clients',
'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
dolore magna aliqua. Eu augue ut lectus arcu. Sit amet volutpat consequat mauris nunc.',
'thumbnail' => 'https://livedemo00.template-help.com/wt_prod-23641/images/grid-blog-1-571x353.jpg',
'created_at' => 'Apr 21, 2019 at 12:05 pm',
'id' => 1,
'type' => 'post',
'tags' => [
[
'title' => 'News',
'url' => "#"
]
]
],
[
'title' => 'What Does Loneliness Mean for Your Health?',
'excerpt' => 'Nulla posuere sollicitudin aliquam ultrices sagittis orci. Blandit aliquam etiam erat velit scelerisque in
dictum. Egestas purus viverra accumsan in nisl nisi scelerisque.',
'thumbnail' => 'https://livedemo00.template-help.com/wt_prod-23641/images/grid-blog-2-571x353.jpg',
'created_at' => 'Apr 21, 2019 at 12:05 pm',
'id' => 1,
'type' => 'post',
'tags' => [
[
'title' => 'News',
'url' => "#"
]
]
],
];
@endphp
<div class="container">
    <div class="row">
        @foreach ($items as $item)
            <div class="col-md-6">
                @include('front.modules.teaser',$item)
            </div>
        @endforeach
    </div>
</div>
<div class="container">
    @include('front.modules.pagination')
</div>
