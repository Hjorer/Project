<!DOCTYPE html>
<html lang="en">

<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Site Metas -->
<title>Markedia - Marketing Blog Template</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">

<link href="/css/bootstrap.css" rel="stylesheet">
<link href="/css/font-awesome.min.css" rel="stylesheet">
<link href="/style.css" rel="stylesheet">
<link href="/css/animate.css" rel="stylesheet">
<link href="/css/responsive.css" rel="stylesheet">
<link href="/css/colors.css" rel="stylesheet">
<link href="/css/version/marketing.css" rel="stylesheet">


<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <div id="wrapper">
        <header class="market-header header">
            @extends('layouts.navbar')
        </header><!-- end market-header -->

        <section id="cta" class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 align-self-center">
                        <h2>A digital marketing blog</h2>
                        <p class="lead"> Aenean ut hendrerit nibh. Duis non nibh id tortor consequat cursus at mattis
                            felis. Praesent sed lectus et neque auctor dapibus in non velit. Donec faucibus odio semper
                            risus rhoncus rutrum. Integer et ornare mauris.</p>
                        <a href="#" class="btn btn-primary">Try for free</a>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="newsletter-widget text-center align-self-center">
                            <h3>Subscribe Today!</h3>
                            <p>Subscribe to our weekly Newsletter and receive updates via email.</p>
                            <form class="form-inline" method="post">
                                <input type="text" name="email" placeholder="Add your email here.." required
                                    class="form-control" />
                                <input type="submit" value="Subscribe" class="btn btn-default btn-block" />
                            </form>
                        </div><!-- end newsletter -->
                    </div>
                </div>
            </div>
        </section>

        <section class="section lb">
            <div class="page-wrapper" style="background: #fff; padding: 40px 0;">
                <div class="container">
                    <div class="row">
                        {{-- col-lg-8 ограничит ширину, чтобы контент не растягивался на весь экран --}}
                        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">

                            <div class="blog-custom-build">
                                @if ($posts->count())
                                    @foreach ($posts as $post)
                                        <div class="blog-box wow fadeIn" style="margin-bottom: 50px;">

                                            {{-- Изображение поста --}}
                                            <div class="post-media" style="max-width: 100%; margin-bottom: 20px;">
                                                <a href="{{ route('posts.single', ['slug' => $post->slug]) }}"
                                                    title="">
                                                    <img src="{{ asset($post->getImage()) }}" alt=""
                                                        class="img-fluid"
                                                        style="width: 100%; height: auto; display: block;">
                                                    <div class="hovereffect">
                                                        <span></span>
                                                    </div>
                                                </a>
                                            </div><!-- end media -->

                                            {{-- Мета-данные и текст поста --}}
                                            <div class="blog-meta big-meta text-center">
                                                <div class="post-sharing" style="margin-bottom: 15px;">
                                                    <ul class="list-inline">
                                                        <li><a href="#" class="fb-button btn btn-primary"><i
                                                                    class="fa fa-facebook"></i> <span
                                                                    class="down-mobile">Share on Facebook</span></a>
                                                        </li>
                                                        <li><a href="#" class="tw-button btn btn-primary"><i
                                                                    class="fa fa-twitter"></i> <span
                                                                    class="down-mobile">Tweet on Twitter</span></a></li>
                                                        <li><a href="#" class="gp-button btn btn-primary"><i
                                                                    class="fa fa-google-plus"></i></a></li>
                                                    </ul>
                                                </div><!-- end post-sharing -->

                                                <h4><a href="{{ route('posts.single', ['slug' => $post->slug]) }}"
                                                        title=""
                                                        style="color: #222; font-weight: bold;">{{ $post->title }}</a>
                                                </h4>
                                                <p style="color: #555; margin-top: 10px;">{!! $post->description !!}</p>

                                                <div style="margin-top: 15px;">
                                                    @if ($post->category)
                                                        <small><a
                                                                href="{{ route('categories.single', ['slug' => $post->category->slug]) }}"
                                                                title="">{{ $post->category->title }}</a></small>
                                                    @endif
                                                    <small><a href="#"
                                                            title="">{{ $post->getPostDate() }}</a></small>
                                                    <small><a href="#" title=""><i class="fa fa-eye"></i>
                                                            {{ $post->views }}</a></small>
                                                </div>
                                            </div><!-- end meta -->

                                        </div><!-- end blog-box -->
                                        <hr class="invis" style="margin: 40px 0; border-top: 1px solid #eee;">
                                    @endforeach
                                @else
                                    {{-- Текст из задания --}}
                                    <div class="alert alert-info">
                                        <p>По вашему запросу ничего не найдено...</p>
                                    </div>
                                @endif
                            </div><!-- end blog-custom-build -->

                            {{-- Пагинация --}}
                            <div class="row" style="margin-top: 30px;">
                                <div class="col-md-12">
                                    <nav aria-label="Page navigation">
                                        {{ $posts->appends(['s' => request('s')])->links() }}
                                    </nav>
                                </div>
                            </div>

                        </div><!-- end col -->

                        {{-- Сюда при необходимости можно подключить сайдбар (col-lg-4) --}}

                    </div><!-- end row -->
                </div><!-- end container -->
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    @extends('layouts.sidebar')
                </div><!-- end col -->
            </div><!-- end page-wrapper -->

        </section>

        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <div class="widget">
                            <h2 class="widget-title">Recent Posts</h2>
                            <div class="blog-list-widget">
                                <div class="list-group">
                                    <a href="marketing-single.html"
                                        class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="w-100 justify-content-between">
                                            <img src="upload/small_04.jpg" alt=""
                                                class="img-fluid float-left">
                                            <h5 class="mb-1">5 Beautiful buildings you need to before dying</h5>
                                            <small>12 Jan, 2016</small>
                                        </div>
                                    </a>

                                    <a href="marketing-single.html"
                                        class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="w-100 justify-content-between">
                                            <img src="upload/small_05.jpg" alt=""
                                                class="img-fluid float-left">
                                            <h5 class="mb-1">Let's make an introduction for creative life</h5>
                                            <small>11 Jan, 2016</small>
                                        </div>
                                    </a>

                                    <a href="marketing-single.html"
                                        class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="w-100 last-item justify-content-between">
                                            <img src="upload/small_06.jpg" alt=""
                                                class="img-fluid float-left">
                                            <h5 class="mb-1">Did you see the most beautiful sea in the world?</h5>
                                            <small>07 Jan, 2016</small>
                                        </div>
                                    </a>
                                </div>
                            </div><!-- end blog-list -->
                        </div><!-- end widget -->
                    </div><!-- end col -->

                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <div class="widget">
                            <h2 class="widget-title">Popular Posts</h2>
                            <div class="blog-list-widget">
                                <div class="list-group">
                                    <a href="marketing-single.html"
                                        class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="w-100 justify-content-between">
                                            <img src="upload/small_01.jpg" alt=""
                                                class="img-fluid float-left">
                                            <h5 class="mb-1">Banana-chip chocolate cake recipe with customs</h5>
                                            <span class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </span>
                                        </div>
                                    </a>

                                    <a href="marketing-single.html"
                                        class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="w-100 justify-content-between">
                                            <img src="upload/small_02.jpg" alt=""
                                                class="img-fluid float-left">
                                            <h5 class="mb-1">10 practical ways to choose organic vegetables</h5>
                                            <span class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </span>
                                        </div>
                                    </a>

                                    <a href="marketing-single.html"
                                        class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="w-100 last-item justify-content-between">
                                            <img src="upload/small_03.jpg" alt=""
                                                class="img-fluid float-left">
                                            <h5 class="mb-1">We are making homemade ravioli, nice and good</h5>
                                            <span class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            </div><!-- end blog-list -->
                        </div><!-- end widget -->
                    </div><!-- end col -->

                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <div class="widget">
                            <h2 class="widget-title">Popular Categories</h2>
                            <div class="link-widget">
                                <ul>
                                    <li><a href="#">Marketing <span>(21)</span></a></li>
                                    <li><a href="#">SEO Service <span>(15)</span></a></li>
                                    <li><a href="#">Digital Agency <span>(31)</span></a></li>
                                    <li><a href="#">Make Money <span>(22)</span></a></li>
                                    <li><a href="#">Blogging <span>(66)</span></a></li>
                                    <li><a href="#">Entertaintment <span>(11)</span></a></li>
                                    <li><a href="#">Video Tuts <span>(87)</span></a></li>
                                </ul>
                            </div><!-- end link-widget -->
                        </div><!-- end widget -->
                    </div><!-- end col -->
                </div><!-- end row -->

                <div class="row">
                    <div class="col-md-12 text-center">
                        <br>
                        <br>
                        <div class="copyright">&copy; Markedia. Design: <a href="http://html.design">HTML Design</a>.
                        </div>
                    </div>
                </div>
            </div><!-- end container -->
        </footer><!-- end footer -->

        <div class="dmtop">Scroll to Top</div>

    </div><!-- end wrapper -->

    <!-- Core JavaScript
    ================================================== -->
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animate.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>
