@extends('website.layouts.header')
@section('section')
				<div class="wrap">
	  @include('website.layouts.logo')
		<section class="menu-wrap flex-md-column-reverse d-md-flex">
@include('website.layouts.nav')
		<!-- END nav -->
@foreach($aboutlevel1 as $key => $value)

@endforeach
	    <div class="hero-wrap hero-wrap-2"
style="
    @foreach ($value->aboutheaderimage as $i)
        background-image: url('{{ asset($i->image) }}');
    @endforeach
"         data-stellar-background-ratio="0.5">
	      <div class="overlay"></div>
	      <div class="container">
	        <div class="row no-gutters slider-text align-items-end">
	          <div class="col-md-9 ftco-animate pb-5">
	          	<p class="breadcrumbs mb-2"><span class="mr-2">
                    <a href="{{ route('welcome') }}">Home
                         <i class="fa fa-chevron-right">
                            </i></a></span> <span>{{ $value->about->title }} <i class="fa fa-chevron-right"></i></span></p>
	            <h1 class="mb-0 bread">
                    {{$value->title  }}
                </h1>
	          </div>
	        </div>
	      </div>
	    </div>
		</section>


    <section class="ftco-section">
    	<div class="container">

         @foreach($aboutlevel1 as $key => $about)
            <div class="row justify-content-center mb-5">
                <div class="col-md-8 text-center heading-section ftco-animate">
                    <span class="subheading">{!! $about->description !!}</span>
                    <h2 class="mb-4">{{ $about->title }}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row tabulation mt-4 ftco-animate">
                        <div class="col-md-4 d-flex align-items-stretch">
                            <ul class="nav nav-pills nav-fill d-md-flex d-block flex-column">
                                @foreach($aboutlevel1 as $aboutle)
@endforeach
                                @foreach($aboutle->aboutlevel2 as $index => $aboutlevel)
                                    <li class="nav-item text-left">
                                        <a class="nav-link {{ $index == 0 ? 'active' : '' }} py-4" data-toggle="tab" href="#services-{{$aboutlevel->id}}">
                                            <span class="flaticon-roof mr-2"></span>
                                            {{ $aboutlevel->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-8 pl-md-4">
                            <div class="tab-content">
                                @foreach($aboutle->aboutlevel2 as $index => $level)
                                    <div class="tab-pane container p-0 {{ $index == 0 ? 'active' : '' }}" id="services-{{$level->id}}">
                                        <h3>{{ $level->title }}</h3>
                                        <p>{!! $level->description !!}</p>
                                        <p class="text-center">
                                            <img src="{{ asset($level->image) }}" height="250px" width="600px" class="responsive">
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
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
	              	{{--  <span>Fleet</span>  --}}
	              </div>
              </div>
            </div>
          </div>
                    @endforeach



        </div>
			</div>
		</section>
@endsection

