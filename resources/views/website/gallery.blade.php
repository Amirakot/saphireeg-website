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
	          	  	<p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span> <span>Gallery<i class="fa fa-chevron-right"></i></span></p>
	            <h1 class="mb-0 bread">Sapphire Gallery</h1>
	          </div>
	        </div>
	      </div>
	    </div>
		</section>

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
@endsection

