@extends('frontend.layout.index')

@section('content')
{{--    {{count($weeklyTopNews)}}--}}
    <!-- Trending Area Start -->
    <div class="trending-area fix">
        <div class="container">
            <div class="trending-main">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="trending-tittle">
                            <strong>Trending now</strong>
                            <!-- <p>Rem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
                            <div class="trending-animated">
                                <ul id="js-news" class="js-hidden">
                                    <li class="news-item">कल्पना दाहालले आफ्नो घरमा मनाइन जन्मदिन</li>
                                    <li class="news-item">बिवाह भएको केहि समय बित्न नपाउदै बेहुलाले बेहुलिको घाटि रेटि बिभत्स तरिकाले गरियो हत्या</li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Trending Top -->
                        @isset($randomFourNews[0])
                        <div class="trending-top mb-30">
                            <div class="trend-top-img">
                                <img src="{{asset($randomFourNews[0]->thumbnail)}}" alt="">
                                <div class="trend-top-cap">
                                    <span>{{$randomFourNews[0]->category}}</span>
                                    <h2><a href="{{route('frontend.viewNews', [$randomFourNews[0]->slug])}}">{{$randomFourNews[0]->title}}</a></h2>
                                </div>
                            </div>
                        </div>
                        @endisset
                        <!-- Trending Bottom -->
                        <div class="trending-bottom">
                            <div class="row">
                                @isset($randomFourNews[1])
                                <div class="col-lg-4">
                                    <div class="single-bottom mb-35">
                                        <div class="trend-bottom-img mb-30">
                                            <img src="{{asset($randomFourNews[1]->thumbnail)}}" alt="">
                                        </div>
                                        <div class="trend-bottom-cap">
                                            <span class="color1">{{$randomFourNews[1]->category}}</span>
                                            <h4><a href="{{route('frontend.viewNews', [$randomFourNews[1]->slug])}}">{{$randomFourNews[1]->title}}</a></h4>
                                        </div>
                                    </div>
                                </div>
                                @endisset
                                @isset($randomFourNews[2])
                                <div class="col-lg-4">
                                    <div class="single-bottom mb-35">
                                        <div class="trend-bottom-img mb-30">
                                            <img src="{{asset($randomFourNews[2]->thumbnail)}}" alt="">
                                        </div>
                                        <div class="trend-bottom-cap">
                                            <span class="color2">{{$randomFourNews[2]->category}}</span>
                                            <h4><h4><a href="{{route('frontend.viewNews', [$randomFourNews[2]->slug])}}">{{$randomFourNews[2]->title}}</a></h4></h4>
                                        </div>
                                    </div>
                                </div>
                                @endisset
                                @isset($randomFourNews[3])
                                <div class="col-lg-4">
                                    <div class="single-bottom mb-35">
                                        <div class="trend-bottom-img mb-30">
                                            <img src="{{asset($randomFourNews[3]->thumbnail)}}" alt="">
                                        </div>
                                        <div class="trend-bottom-cap">
                                            <span class="color3">{{$randomFourNews[3]->category}}</span>
                                            <h4><a href="{{route('frontend.viewNews', [$randomFourNews[3]->slug])}}">{{$randomFourNews[3]->title}}</a></h4>
                                        </div>
                                    </div>
                                </div>
                                @endisset
                            </div>
                        </div>
                    </div>
                    <!-- Riht content -->
                    <div class="col-lg-4">
                        @foreach($rightSideNews as $rightNews)
                        <div class="trand-right-single d-flex">
                            <div class="trand-right-img">
                                <img src="{{$rightNews->thumbnail}}" alt="">
                            </div>
                            <div class="trand-right-cap">
                                <span class="color1">{{$rightNews->category}}</span>
                                <h4><a href="{{route('frontend.viewNews', [$rightNews->slug])}}">{{$rightNews->title}}</a></h4>
                            </div>
                        </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Trending Area End -->
    <!--   Weekly-News start -->
    <div class="weekly-news-area pt-50">
        <div class="container">
            <div class="weekly-wrapper">
                <!-- section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle mb-30">
                            <h3>Weekly Top News</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="weekly-news-active dot-style d-flex dot-style">
                            @foreach($weeklyTopNews as $topNews)
                            <div class="weekly-single @if($loop->first) active @endif ">
                                <div class="weekly-img">
                                    <img src="{{asset($topNews->thumbnail)}}" alt="">
                                </div>
                                <div class="weekly-caption">
                                    <span class="color1">{{$topNews->category}}</span>
                                    <h4><a href="{{route('frontend.viewNews', [$topNews->slug])}}">{{$topNews->title}}</a></h4>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Weekly-News -->
    <!-- Whats New Start -->
    <section class="whats-news-area pt-50 pb-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row d-flex justify-content-between">
                        <div class="col-lg-3 col-md-3">
                            <div class="section-tittle mb-30">
                                <h3>Whats New</h3>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <div class="properties__button">
                                <!--Nav Button  -->
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
{{--                                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">सबै</a>--}}
                                        <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">देश</a>
                                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">राजनीतिक</a>
                                        <a class="nav-item nav-link" id="nav-last-tab" data-toggle="tab" href="#nav-last" role="tab" aria-controls="nav-contact" aria-selected="false">खेलकुद</a>
                                        <a class="nav-item nav-link" id="nav-Sports" data-toggle="tab" href="#nav-nav-Sport" role="tab" aria-controls="nav-contact" aria-selected="false">मनोरञ्जन</a>
                                        <a class="nav-item nav-link" id="nav-technology" data-toggle="tab" href="#nav-techno" role="tab" aria-controls="nav-contact" aria-selected="false">टेक्नोलोजी</a>
                                    </div>
                                </nav>
                                <!--End Nav Button  -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <!-- Nav Card -->
                            <div class="tab-content" id="nav-tabContent">
                                <!-- card one -->
{{--                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">--}}
{{--                                    <div class="whats-news-caption">--}}
{{--                                        <div class="row">--}}
{{--                                            <div class="col-lg-6 col-md-6">--}}
{{--                                                <div class="single-what-news mb-100">--}}
{{--                                                    <div class="what-img">--}}
{{--                                                        <img src="assets/img/news/whatNews1.jpg" alt="">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="what-cap">--}}
{{--                                                        <span class="color1">Night party</span>--}}
{{--                                                        <h4><a href="#">Welcome To The Best Model  Winner Contest</a></h4>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-lg-6 col-md-6">--}}
{{--                                                <div class="single-what-news mb-100">--}}
{{--                                                    <div class="what-img">--}}
{{--                                                        <img src="assets/img/news/whatNews2.jpg" alt="">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="what-cap">--}}
{{--                                                        <span class="color1">Night party</span>--}}
{{--                                                        <h4><a href="#">Welcome To The Best Model  Winner Contest</a></h4>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-lg-6 col-md-6">--}}
{{--                                                <div class="single-what-news mb-100">--}}
{{--                                                    <div class="what-img">--}}
{{--                                                        <img src="assets/img/news/whatNews3.jpg" alt="">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="what-cap">--}}
{{--                                                        <span class="color1">Night party</span>--}}
{{--                                                        <h4><a href="#">Welcome To The Best Model  Winner Contest</a></h4>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-lg-6 col-md-6">--}}
{{--                                                <div class="single-what-news mb-100">--}}
{{--                                                    <div class="what-img">--}}
{{--                                                        <img src="assets/img/news/whatNews4.jpg" alt="">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="what-cap">--}}
{{--                                                        <span class="color1">Night party</span>--}}
{{--                                                        <h4><a href="#">Welcome To The Best Model  Winner Contest</a></h4>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <!-- Card two -->
                                <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <div class="whats-news-caption">
                                        <div class="row">
                                            @foreach($deshNews as $desh)
                                            <div class="col-lg-6 col-md-6">
                                                <div class="single-what-news mb-100">
                                                    <div class="what-img">
                                                        <img src="{{asset($desh->thumbnail)}}" alt="">
                                                    </div>
                                                    <div class="what-cap">
                                                        <span class="color1">{{$desh->category}}</span>
                                                        <h4><a href="{{route('frontend.viewNews', [$desh->slug])}}">{{$desh->title}}</a></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <!-- Card three -->
                                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                    <div class="whats-news-caption">
                                        <div class="row">

                                            @foreach($politicalNews as $political)
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="single-what-news mb-100">
                                                        <div class="what-img">
                                                            <img src="{{asset($political->thumbnail)}}" alt="">
                                                        </div>
                                                        <div class="what-cap">
                                                            <span class="color1">{{$political->category}}</span>
                                                            <h4><a href="{{route('frontend.viewNews', [$political->slug])}}">{{$political->title}}</a></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                                <!-- card fure -->
                                <div class="tab-pane fade" id="nav-last" role="tabpanel" aria-labelledby="nav-last-tab">
                                    <div class="whats-news-caption">
                                        <div class="row">
                                            @foreach($sportsNews as $sports)
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="single-what-news mb-100">
                                                        <div class="what-img">
                                                            <img src="{{asset($sports->thumbnail)}}" alt="">
                                                        </div>
                                                        <div class="what-cap">
                                                            <span class="color1">{{$sports->category}}</span>
                                                            <h4><a href="{{route('frontend.viewNews', [$sports->slug])}}">{{$sports->title}}</a></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <!-- card Five -->
                                <div class="tab-pane fade" id="nav-nav-Sport" role="tabpanel" aria-labelledby="nav-Sports">
                                    <div class="whats-news-caption">
                                        <div class="row">
                                            @foreach($entertainmentNews as $entertainment)
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="single-what-news mb-100">
                                                        <div class="what-img">
                                                            <img src="{{asset($entertainment->thumbnail)}}" alt="">
                                                        </div>
                                                        <div class="what-cap">
                                                            <span class="color1">{{$entertainment->category}}</span>
                                                            <h4><a href="{{route('frontend.viewNews', [$entertainment->slug])}}">{{$entertainment->title}}</a></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <!-- card Six -->
                                <div class="tab-pane fade" id="nav-techno" role="tabpanel" aria-labelledby="nav-technology">
                                    <div class="whats-news-caption">
                                        <div class="row">
                                            @foreach($technicalNews as $technical)
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="single-what-news mb-100">
                                                        <div class="what-img">
                                                            <img src="{{asset($technical->thumbnail)}}" alt="">
                                                        </div>
                                                        <div class="what-cap">
                                                            <span class="color1">{{$technical->category}}</span>
                                                            <h4><a href="{{route('frontend.viewNews', [$technical->slug])}}">{{$technical->title}}</a></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Nav Card -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- Section Tittle -->
                    <div class="section-tittle mb-40">
                        <h3>Follow Us</h3>
                    </div>
                    <!-- Flow Socail -->
                    <div class="single-follow mb-45">
                        <div class="single-box">
                            <div class="fb-like" data-href="https://www.facebook.com/Esamachar100" data-width="" data-layout="button_count" data-action="like" data-size="large" data-share="true"></div>
                        </div>
                    </div>
                    <!-- New Poster -->
                    <div class="news-poster d-none d-lg-block">
                        <img src="assets/img/news/news_card.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Whats New End -->
    <!--   Weekly2-News start -->
    <div class="weekly2-news-area  weekly2-pading gray-bg">
        <div class="container">
            <div class="weekly2-wrapper">
                <!-- section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle mb-30">
                            <h3>Random News</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="weekly2-news-active dot-style d-flex dot-style">
                            @foreach($randomNews as $ranNews)
                                <div class="weekly2-single">
                                    <div class="weekly2-img">
                                        <img src="{{$ranNews->thumbnail}}" alt="">
                                    </div>
                                    <div class="weekly2-caption">
                                        <span class="color1">{{$ranNews->category}}</span>
                                        <p>{{\Carbon\Carbon::parse($ranNews->created_at)->format('M d Y')}}</p>
                                        <h4><a href="{{route('frontend.viewNews', [$ranNews->slug])}}">{{$ranNews->title}}</a></h4>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Weekly-News -->

    @if(count($videoNews) > 0)
    <!-- Start Youtube -->
    <div class="youtube-area video-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="video-items-active">
                        @foreach($videoNews as $video)
                        <div class="video-items text-center">
                            <iframe src="{{$video->video}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="video-info">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="video-caption">
                            <div class="top-caption">
                                <span class="color1">{{$videoNews[0]->category}}</span>
                            </div>
                            <div class="bottom-caption">
                                <h2>{{$videoNews[0]->title}}</h2>
                                <p>
                                    {!! $videoNews[0]->news_content !!}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="testmonial-nav text-center">

                            @foreach($videoNews as $videoLink)
                            <div class="single-video">
                                <iframe  src="{{$videoLink->video}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <div class="video-intro">
                                    <h4>{!! $videoLink->title !!}</h4>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- End Start youtube -->
    <!--  Recent Articles start -->
    <div class="recent-articles">
        <div class="container">
            <div class="recent-wrapper">
                <!-- section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle mb-30">
                            <h3>Recent News</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="recent-active dot-style d-flex dot-style">
                            @foreach($recentNews as $recent)
                            <div class="single-recent mb-100">
                                <div class="what-img">
                                    <img src="{{asset($recent->thumbnail)}}" alt="">
                                </div>
                                <div class="what-cap">
                                    <span class="color1">{{$recent->category}}</span>
                                    <h4><a href="{{route('frontend.viewNews', [$recent->slug])}}">{{$recent->title}}</a></h4>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Recent Articles End -->
    <!--Start pagination -->
{{--    <div class="pagination-area pb-45 text-center">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-xl-12">--}}
{{--                    <div class="single-wrap d-flex justify-content-center">--}}
{{--                        <nav aria-label="Page navigation example">--}}
{{--                            <ul class="pagination justify-content-start">--}}
{{--                                <li class="page-item"><a class="page-link" href="#"><span class="flaticon-arrow roted"></span></a></li>--}}
{{--                                <li class="page-item active"><a class="page-link" href="#">01</a></li>--}}
{{--                                <li class="page-item"><a class="page-link" href="#">02</a></li>--}}
{{--                                <li class="page-item"><a class="page-link" href="#">03</a></li>--}}
{{--                                <li class="page-item"><a class="page-link" href="#"><span class="flaticon-arrow right-arrow"></span></a></li>--}}
{{--                            </ul>--}}
{{--                        </nav>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- End pagination  -->

@endsection