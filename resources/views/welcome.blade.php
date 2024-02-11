@extends('website.layouts.header')
@section('section')
		<div class="wrap">
	  @include('website.layouts.logo')
		<section class=" flex-md-column-reverse d-md-flex">
@include('website.layouts.nav')
	    <!-- END nav -->
	    <div class="hero-wrap js-fullheight">
		    <div class="home-slider js-fullheight owl-carousel">
		     @foreach($sliders as  $slider)

                <div class="slider-item js-fullheight" style="background-image:url({{ asset($slider->image) }});">
		      	<div class="overlay"></div>
		        <div class="container">
		          <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
			          <div class="col-md-10 text-center ftco-animate">
			          	<div class="text w-100">
			          		<h2>{{ $slider->title }}</h2>
				            <h1 class="mb-4"> {!! $slider->description !!} </h1>
                            {{--  vision enter  --}}
				            <p><a href="" class="btn btn-primary">Know More</a></p>
			            </div>
			          </div>
			        </div>
		        </div>
		      </div>
             @endforeach


		    </div>
		  </div>
		</section>

    <section class="ftco-section ftco-no-pt ftco-no-pb bg-light ftco-appointment">
    	<div class="container">
    		<div class="row">
                                            @foreach($abouts as $about)

                <div class="col-lg-7">

    				<div class="row justify-content-start py-5 pr-md-4">

                        {{--  @endforeach  --}}
		          <div class="col-md-12 heading-section ftco-animate py-md-4">
		            <h2 class="mb-4">
{{ $about->title }}
                    </h2>
		            <p>

{!! $about->description !!}                    </p>
		            <div class="tabulation-2 mt-4">
									<ul class="nav nav-pills nav-fill d-md-flex d-block">
									  <li class="nav-item mb-md-0 mb-2">
									    <a class="nav-link active py-3" data-toggle="tab" href="#home1">Our Mission</a>
									  </li>
									  <li class="nav-item px-lg-2 mb-md-0 mb-2">
									    <a class="nav-link py-3" data-toggle="tab" href="#home2">
                                            Our Vision</a>
									  </li>
									  <li class="nav-item">
									    <a class="nav-link py-3 mb-md-0 mb-2" data-toggle="tab" href="#home3">Our Goal</a>
									  </li>
									</ul>
									<div class="tab-content rounded mt-2">
									  <div class="tab-pane container p-0 active" id="home1">
									  	<p>
											Our mission is to provide our valued customers with the highest possible value-added, benchmarked for excellence, end-to-end performance services. We are committed to sustainable business practices and the implementation of ambitious innovative solutions, all while maintaining a strong commitment to quality and safety environmental standards. Our goal is to not only meet but exceed expectations, consistently delivering exceptional results.<a href="Sapphire-mission.html"> Discover more</a>
										</p>
									  </div>
									  <div class="tab-pane container p-0 fade" id="home2">
									  	<p>
											Our vision is to be recognized as a reliable, premier partner of choice and a leading operator in the offshore, marine, oil & gas industries. We aspire to be a safe and forward-thinking company that sets industry standards and exceeds expectations.	<a href="Sapphire-vision.html"> Discover more</a>									</p>
									  </div>
									  <div class="tab-pane container p-0 fade" id="home3">
									  	<p>
											At Sapphire, we are dedicated to excellence in providing top-notch petroleum and marine services. Our strategic goals reflect our commitment to continuous improvement, innovation, and sustainable growth.<a href="Strategic-goals.html"> Discover more</a>
										</p>
									  </div>
									</div>
								</div>








		          	</div>
		        	</div>

					 <p><a href="Top-managment.html" class="btn btn-primary">More about</a></p>

	        	</div>
                    @endforeach

								<div class="col-lg-5  " style="background-color:#fff;">
				<img  class="center-img img-fluid" src="{{ asset($about->image) }}">

				</div>


        </div>
    	</div>
    </section>

    <section class="ftco-counter" id="section-counter">
    	<div class="container">
				<div class="row">
                 @php
    $icons = ['fa-calendar', 'fa-briefcase', 'fa-users', 'fa-bar-chart'];
    $arrayIndex = 0; // Initialize the index for the icons array
@endphp

@foreach($statistics as $statistic)
    <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
        <div class="block-18 text-center">
            <div class="text">
                <div class="icon"><span class="fa {{$icons[$arrayIndex]}}"></span></div>
              <strong class="number" data-number="{{ ($statistic->title) }}">{{ $statistic->title }}</strong>

                <span>{!! $statistic->description !!}</span>
            </div>
        </div>
    </div>
    @php
        $arrayIndex++; // Increment the index for the icons array
        // Reset the index if it exceeds the length of the icons array
        if ($arrayIndex >= count($icons)) {
            $arrayIndex = 0;
        }
    @endphp
@endforeach


        </div>
    	</div>
    </section>

<section class="ftco-section">
    <div class="container">
        @foreach($visionlevel as $key => $vision)
            <div class="row justify-content-center mb-5">
                <div class="col-md-8 text-center heading-section ftco-animate">
                    <span class="subheading">Sapphire for Petroleum & Marine Services</span>
                    <h2 class="mb-4">{{ $vision->title }}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row tabulation mt-4 ftco-animate">
                        <div class="col-md-4 d-flex align-items-stretch">
                            <ul class="nav nav-pills nav-fill d-md-flex d-block flex-column">
                                @foreach($vision->visionlevel2 as $index => $version)
                                    <li class="nav-item text-left">
                                        <a class="nav-link {{ $index == 0 ? 'active' : '' }} py-4" data-toggle="tab" href="#services-{{$version->id}}">
                                            <span class="flaticon-roof mr-2"></span>
                                            {{ $version->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-8 pl-md-4">
                            <div class="tab-content">
                                @foreach($vision->visionlevel2 as $index => $version)
                                    <div class="tab-pane container p-0 {{ $index == 0 ? 'active' : '' }}" id="services-{{$version->id}}">
                                        <h3>{{ $version->title }}</h3>
                                        <p>{!! $version->description !!}</p>
                                        <p class="text-center">
                                            <img src="" class="responsive">
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
            <h2>Our Fleets</h2>
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

    <section class="ftco-section " style=" background-color:rgba(125,145,164,0.8); background-image: url('images/core-bg.jpg');
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover; ">
      <div class="container">
        <div class="row justify-content-center pb-5 mb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
           	<span class="subheading">Sapphire for Petroleum & Marine Services</span>
            <h2><span style="color:#fff">Core Values</span></h2>
          </div>
        </div>
        <div class="row ftco-animate">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel ftco-owl">
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
    $array = 0; // Initialize the index for the icons array
@endphp

@foreach($corevisions as $index => $core)
    <div class="item">
        <div class="testimony-wrap py-4">
            <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></span></div>
            <div class="text">
                <div class="d-flex align-items-center">
                    <span class="ts-service-icon">
                        <i class="fas {{$icons[$array] }}"></i>
                    </span>
                    <div class="pl-3">
                        <p class="name">{{ $core->title }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @php
        $array++; // Increment the index for the icons array
        // Reset the index if it exceeds the length of the icons array
        if ($array >= count($icons)) {
            $array = 0;
        }
    @endphp
@endforeach


            </div>
          </div>
        </div>
      </div>
    </section>

		<section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center pb-5 mb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">News &amp; Blog</span>
            <h2>Latest news from our blog</h2>
          </div>
        </div>
        <div class="row d-flex">
        @foreach($news as $new)

            <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              @foreach($new->newsimage->take(1) as $image)

                <a href="blog-single.html" class="block-20"
              style="background-image: url('{{asset('storage/'.$image->image)  }}');">
              </a>
              @endforeach

              <div class="text p-3">
              	<div class="posted mb-3 d-flex">

              		<div class="desc pl-3">
              			<span>{{ $new->title }}</span>
              			<span>{{ $new->date }}</span>
              		</div>
              	</div>
                <h3 class="heading"><a href="#">
{{ $new->description }}
                </a></h3>
              </div>
            </div>
          </div>
        @endforeach

        </div>
      </div>
    </section>
@endsection
{{--  @include('website.layouts.footer')  --}}
