<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('css/colors.css') }}" rel="stylesheet">
    <link href="{{ asset('css/version/marketing.css') }}" rel="stylesheet">
</head>

<body>
    <div class="sidebar">
        <div class="widget">
            <h2 class="widget-title">Popular Posts</h2>
            <div class="blog-list-widget">
                <div class="list-group">
                    @foreach ($popular_posts as $post)
                        <a href="{{ route('posts.single', ['slug' => $post->slug]) }}"
                            class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <img src="{{ $post->вывод_картинки }}" alt="" class="img-fluid float-left">
                                <h5 class="mb-1">{{ $post->title }}</h5>
                                <small>{{ $post->getPostDate() }}</small>
                                <small><i class="fa fa-eye"></i> {{ $post->views }}</small>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div><!-- end blog-list -->
        </div><!-- end widget -->
        <div class="widget">
            <h2 class="widget-title">Categories</h2>
            <div class="link-widget">
                <ul>
                    @foreach ($cats as $cat)
                        <li><a href="{{ route('categories.single', ['slug' => $cat->slug]) }}">
                                {{ $cat->title }} <span>({{ $cat->posts_count }})</span></a></li>
                    @endforeach
                </ul>
            </div><!-- end link-widget -->
        </div><!-- end widget -->
    </div><!-- end sidebar -->
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animate.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>
