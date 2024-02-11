@extends('website.layouts.header')

@section('section')
    <div class="wrap">
        @include('website.layouts.logo')
        <section class="menu-wrap flex-md-column-reverse d-md-flex">
            @include('website.layouts.nav')
            <div class="hero-wrap hero-wrap-2" style="background-image: url('images/core-banner.jpg');" data-stellar-background-ratio="0.5">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row no-gutters slider-text align-items-end">
                        <div class="col-md-9 ftco-animate pb-5">
                            <p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span> <span>Vision <i class="fa fa-chevron-right"></i></span></p>
                            <h1 class="mb-0 bread">Core Values</h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="ts-service-area" class="ts-service-area top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5" style="background-color:#fff;">
                        <img class="center-img img-fluid" src="images/core.png">
                    </div>

                    <div class="col-lg-6">
                        <div class="ts-intro">
                            <h3 class="into-sub-title">Core Values</h3>
                        </div><!-- Intro box end -->

                        <div class="gap-20"></div>
                        @php
                            $icons = [
                               'fa-handshake',
                               'fa-user-tie',
                               'fa-user-check',
                               'fa-clock',
                               'fa-check-circle',
                               'fa-users',
                               'fa-thumbs-up',
                               'fa-graduation-cap',
                               'fa-star',
                               'fa-ship',
                               'fa-bell',
                            ];
                            $arrayIndex=0;
                        @endphp

                        <div class="row">
                            @foreach($corevisions as $core)
                                <div class="col-md-6">
                                    <div class="ts-service-box">
                                        <span class="ts-service-icon">
                                            <i class="fas {{$icons[$arrayIndex] }}"></i>
                                        </span>
                                        <div class="ts-service-box-content">
                                            <h3 class="service-box-title">{{ $core->title }}</h3>
                                        </div>
                                    </div><!-- Service box end -->
                                </div><!-- col end -->
                                @php
                                    $arrayIndex++; // Increment the index for the icons array
                                    // Reset the index if it exceeds the length of the icons array
                                    if ($arrayIndex >= count($icons)) {
                                        $arrayIndex = 0;
                                    }
                                @endphp
                            @endforeach
                        </div><!-- Content row end -->
                    </div><!-- Container end -->
                </div><!-- Feature are end -->
            </div>
        </section>

        <section class="ftco-section ftco-no-pb ftco-no-pt">
            <div class="container">
                <div class="row justify-content-center pb-5 mb-3 top">
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
@endsection
