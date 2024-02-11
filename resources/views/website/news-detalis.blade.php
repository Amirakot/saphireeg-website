@extends('website.layouts.header')
@section('section')
<div class="wrap">
    @include('website.layouts.logo')
    <section class="menu-wrap flex-md-column-reverse d-md-flex">
        @include('website.layouts.nav')

	    <!-- END nav -->
	    <div class="hero-wrap hero-wrap-2" style="background-image: url('images/above.jpg');" data-stellar-background-ratio="0.5">
	      <div class="overlay"></div>
	      <div class="container">
	        <div class="row no-gutters slider-text align-items-end">
	          <div class="col-md-9 ftco-animate pb-5">
	          	<p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span> <span>News<i class="fa fa-chevron-right"></i></span></p>
	            <h1 class="mb-0 bread">Sapphire Latest News</h1>
	          </div>
	        </div>
	      </div>
	    </div>
		</section>

	<section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
         {{--  @foreach($newsspecific as $specyfic)  --}}

            <div class="col-lg-8 order-lg-last ftco-animate">

            <h2 class="mb-3 mt-5">{{ $newsspecific->title }}</h2>
            <p>
{!! $newsspecific->description !!}
                  @foreach($newsspecific->newsimage->take(1) as $image)

                <a href="{{ route('showNewsdetalis',$newsspecific->id) }}" class="block-20"
              style="background-image: url('{{asset('storage/'.$image->image)  }}');">
              </a>
                @endforeach



          </div>

          <div class="col-lg-4 sidebar pr-lg-5 ftco-animate">

            <div class="sidebar-box ftco-animate">
              <div class="categories">
                <h3>All Blogs</h3>
@foreach($news as $new)

                <li><a href="{{ route('showNewsdetalis',$new->id) }}">
{{ $new->title }}
                    <span class="fa fa-chevron-right"></span></a></li>
@endforeach

            </div>
            </div>

            <div class="sidebar-box ftco-animate">
              <h3>Recent Blog</h3>
              @foreach($news as $new)


              <div class="block-21 mb-4 d-flex">
                              @foreach($new->newsimage->take(1) as $image)

                <a href="{{ route('showNewsdetalis',$new->id) }}" class="block-20"
              style="background-image: url('{{asset('storage/'.$image->image)  }}');">
              </a>
                @endforeach
                <div class="text">
                  <h3 class="heading"><a href="{{ route('showNewsdetalis',$new->id) }}">
{!! $new->description !!}
                </a></h3>
                  <div class="meta">

                    <div><a href="{{ route('showNewsdetalis',$new->id) }}"><span class="icon-chat"></span> {{ $new->date }}</a></div>
                  </div>
                </div>
              </div>
              @endforeach

            </div>



          </div>

        </div>
      </div>
    </section>
    @endsection









