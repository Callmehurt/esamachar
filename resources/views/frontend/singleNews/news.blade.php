@extends('frontend.layout.index')

@section('content')
@section('facebook')

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{asset($news->title)}}">
    <meta property="og:description" content="">
    <meta property="og:image" content="{{asset($news->thumbnail)}}">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="{{asset($news->thumbnail)}}">
    <meta property="twitter:domain" content="e-samachar.com">
    <meta property="twitter:url" content="">
    <meta name="twitter:title" content="{{$news->title}}">
    <meta name="twitter:description" content="">
    <meta name="twitter:image" content="{{asset($news->thumbnail)}}">

@endsection

    <div class="about-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mt-5">
                    <!-- Trending Tittle -->
                    <div class="about-right mb-90">
                        <div class="about-img">
                            <img src="{{asset($news->thumbnail)}}" alt="">
                        </div>
                        <div class="section-tittle mb-30 pt-30">
                            <h3>{{$news->title}}</h3>
                        </div>
                        <div class="about-prea">
                            <div style="margin-bottom: 15px;">
                                <div class="sharethis-inline-share-buttons"></div>
                            </div>
                            {!! $news->news_content !!}
                        </div>
                    </div>
                    <!-- From -->
                    <div class="row">
                        <div class="col-lg-8">
                            <form class="form-contact contact_form mb-80" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <textarea class="form-control w-100 error" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder="Enter Message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input class="form-control error" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input class="form-control error" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input class="form-control error" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'" placeholder="Enter Subject">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <button type="submit" class="button button-contactForm boxed-btn">Send</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-5">
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
                        <img src="{{asset('assets/img/news/news_card.jpg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection