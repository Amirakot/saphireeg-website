@extends('website.layouts.header')
@section('section')
<div class="wrap">
    @include('website.layouts.logo')
    <section class="menu-wrap flex-md-column-reverse d-md-flex">
        @include('website.layouts.nav')

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

                <a href="{{ route('showNewsdetalis',$new->id) }}" class="block-20"
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
                <h3 class="heading"><a href="{{ route('showNewsdetalis',$new->id) }}">
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
