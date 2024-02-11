@extends('website.layouts.header')
@section('section')
    <div class="wrap">
        @include('website.layouts.logo')
        <section class="menu-wrap flex-md-column-reverse d-md-flex">
            @include('website.layouts.nav')
<div class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('images/bg_2.jpg') }}');" data-stellar-background-ratio="0.5">
	      <div class="overlay"></div>
	      <div class="container">
	        <div class="row no-gutters slider-text align-items-end">
	          <div class="col-md-9 ftco-animate pb-5">
	          	<p class="breadcrumbs mb-2"><span class="mr-2"><a href="{{ route('welcome') }}">Home <i class="fa fa-chevron-right"></i></a></span> <span>Career<i class="fa fa-chevron-right"></i></span></p>
	            <h1 class="mb-0 bread">Career Form</h1>
	          </div>
	        </div>
	      </div>
	    </div>
		</section>


  <section class="ftco-section bg-light">
    	<div class="container">
    		<div class="row justify-content-center">
					<div class="col-md-12">
						<div class="wrapper">
							<div class="row no-gutters">
								<div class="col-md d-flex">
									<div class="contact-wrap w-100 p-md-5 p-4">
										<h3 class="mb-4">Welcome in our team</h3>
										 <form id="survey-form">

    <!-- name -->
    <label id="name-label" class="row-label" for="name">Name:</label>
    <input id="name" class="row-input" type="text" placeholder="Enter your name" required>

    <!-- email -->
    <label id="email-label" class="row-label" for="email">Email:</label>
    <input id="email" class="row-input" type="email" placeholder="Enter your email" required>

    <!-- education dropdown -->
    <label class="row-label" for="dropdown">Level of education:</label>
    <select id="dropdown" class="row-input" required>
      <option disabled selected>Select an option</option>
      <option value="primary">Primary education</option>
      <option value="secondary">Secondary education</option>
      <option value="higher">Higher education</option>
      <option value="na">No answer</option>
    </select>

    <!-- years of experience -->
    <label id="number-label" class="row-label" for="number">Years of experience (optional):</label>
    <input id="number" class="row-input" type="number" placeholder="Enter number of years of experience" min="0" max="50">

    <!-- programs checkbox -->
    <p class="row-label">Known programs:</p>

    <label class="row-input small" for="box-windows">
      <input type="checkbox" id="box-windows" name="checkbox" value="windows">
      <span class="inline-label">Windows</span>
    </label>

    <label class="row-input small" for="box-word">
      <input type="checkbox" id="box-word" name="checkbox" value="word">
      <span class="inline-label">Word</span>
    </label>

    <label class="row-input small" for="box-excel">
      <input type="checkbox" id="box-excel" name="checkbox" value="excel">
      <span class="inline-label">Excel</span>
    </label>

    <label class="row-input small" for="box-powerpoint">
      <input type="checkbox" id="box-powerpoint" name="checkbox" value="powerpoint">
      <span class="inline-label">Power Point</span>
    </label>

    <label class="row-input small" for="box-outlook">
      <input type="checkbox" id="box-outlook" name="checkbox" value="outlook">
      <span class="inline-label">Outlook</span>
    </label>

    <!-- salary radio -->
    <p class="row-label">Expected salary:</p>

    <label class="row-input small" for="below-3k">
      <input type="radio" id="below-3k" name="radio" value="below-3k">
      <span class="inline-label">Below $3K</span>
    </label>

    <label class="row-input small" for="3k-4k">
      <input type="radio" id="3k-4k" name="radio" value="3k-4k">
      <span class="inline-label">$3K - $4K</span>
    </label>

    <label class="row-input small" for="4k-5k">
      <input type="radio" id="4k-5k" name="radio" value="4k-5k">
      <span class="inline-label">$4K - $5K</span>
    </label>

    <label class="row-input small" for="above-5k">
      <input type="radio" id="above-5k" name="radio" value="above-5k">
      <span class="inline-label">Above $5K</span>
    </label>

    <label class="row-input small" for="dont-know">
      <input type="radio" id="dont-know" name="radio" value="dont know">
      <span class="inline-label">Don't know</span>
    </label>

    <!-- comments textarea -->
    <label class="row-label" for="comments">Additional informations:</label>
    <textarea id="comments" placeholder="Enter other informations here..."></textarea>

    <!-- submit button -->

    <button id="submit" type="submit">Submit</button>

  </form>
									</div>
								</div>

						</div>
					</div>
				</div>
    	</div>
    </section>
    <div  class="google-maps">
	<iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3411.8048110836226!2d29.951764775599873!3d31.226136674350027!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMzHCsDEzJzM0LjEiTiAyOcKwNTcnMTUuNiJF!5e0!3m2!1sen!2seg!4v1703668983208!5m2!1sen!2seg"  width="100%" height="400px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>



	</div>
    @endsection

