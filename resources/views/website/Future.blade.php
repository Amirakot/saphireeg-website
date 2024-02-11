@extends('website.layouts.header')
@section('section')
<div class="wrap">
    @include('website.layouts.logo')
    <section class="menu-wrap flex-md-column-reverse d-md-flex">
        @include('website.layouts.nav')
        <div class="hero-wrap hero-wrap-2" style="background-image: url('images/mission.jpg');" data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text align-items-end">
                    <div class="col-md-9 ftco-animate pb-5">
                        <p class="breadcrumbs mb-2">
                            <span class="mr-2"><a href="{{ route('welcome') }}">Home <i class="fa fa-chevron-right"></i></a></span> <span>Services Under Water<i class="fa fa-chevron-right"></i></span>
                        </p>
                        <h1 class="mb-0 bread"></h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="ts-features" class="ts-features" style="padding: 70px 0;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6" style="background-color:#fff;">
                    <div class="slideshow-container">
                        @foreach($futures as $future)
                            @foreach($future->futureimage as $index => $image)
                                <div class="mySlides fade">
                                    <img src="{{ asset('storage/'.$image->image) }}" width="500" height="500" class="responsive">
                                </div>
                            @endforeach
                        @endforeach
                        <div style="text-align:center;">
                            @foreach($future->futureimage as $index => $img)
                                <span class="dot" onclick="currentSlide({{ $index + 1 }})"></span>
                            @endforeach
                        </div>
                    </div>
                </div>

                @foreach($futures as $future)
                    <div class="col-lg-6 mt-4 mt-lg-0">
                        <h3 class="into-sub-title">{{ $future->title }}</h3>
                        <p>{!! $future->description !!}</p>
                        <div class="accordion accordion-group" id="our-values-accordion">
                            @foreach($future->futerlevel1 as $futurelevel1)
                                <div class="card">
                                    <div class="card-header p-0 bg-transparent">
                                        <h2 class="mb-0">
                                            <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{{ $futurelevel1->id }}" aria-expanded="true" aria-controls="collapse{{ $futurelevel1->id }}">
                                                {{ $futurelevel1->title }}
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapse{{ $futurelevel1->id }}" class="collapse" aria-labelledby="heading{{ $futurelevel1->id }}" data-parent="#our-values-accordion">
                                        <div class="card-body">{!! $futurelevel1->description !!}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div><!-- Row end -->
        </div><!-- Container end -->
    </section><!-- Feature area end -->

    <section class="ftco-section ftco-no-pb ftco-no-pt">
        <div class="container">
            <div class="row justify-content-center pb-5 mb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading">Sapphire for Petroleum & Marine Services</span>
                    <h2>Our Gallery</h2>
                </div>
            </div>
        </div>
        <div class="container-fluid px-md-0">
            <div class="row no-gutters">
                @foreach($galleries as $gallery)
                    <div class="col-md-3 ftco-animate">
                        <div class="work img d-flex align-items-end" style="background-image: url({{ asset($gallery->image) }});">
                            <a href="{{ $gallery->image }}" class="icon image-popup d-flex justify-content-center align-items-center">
                                <span class="fa fa-expand"></span>
                            </a>
                            <div class="desc w-100 px-4">
                                <div class="text w-100 mb-3">
                                    <h2><a href=""></a>{{ $gallery->title }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
<script>
    let slideIndex = 0;
    showSlides();

    function showSlides() {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) { slideIndex = 1 }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        setTimeout(showSlides, 5000); // Change image every 5 seconds
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }
</script>

@endsection
