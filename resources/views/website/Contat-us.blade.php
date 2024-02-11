@extends('website.layouts.header')

@section('section')
    <div class="wrap">
        @include('website.layouts.logo')
        <section class="menu-wrap flex-md-column-reverse d-md-flex">
            @include('website.layouts.nav')
            <div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row no-gutters slider-text align-items-end">
                        <div class="col-md-9 ftco-animate pb-5">
                            <p class="breadcrumbs mb-2"><span class="mr-2"><a href="{{ route('welcome') }}">Home <i class="fa fa-chevron-right"></i></a></span> <span>Contact Us<i class="fa fa-chevron-right"></i></span></p>
                            <h1 class="mb-0 bread">Contact Us</h1>
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
                                <div class="col-md-7 d-flex">
                                    <div class="contact-wrap w-100 p-md-5 p-4">
                                        <h3 class="mb-4">Get in touch</h3>
                                        <form method="POST" id="contactForm" class="contactForm">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <textarea name="message" class="form-control" id="message" cols="30" rows="7" placeholder="Message"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="submit" value="Send Message" class="btn btn-primary">
                                                        <div class="submitting"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-5 d-flex align-items-stretch">
                                    <div class="info-wrap bg-primary w-100 p-lg-5 p-4">
                                        <h3 class="mb-4 mt-md-4">Contact us</h3>
                                        @foreach($contacts as $contact)
                                            <div class="dbox w-100 d-flex align-items-start">
                                                <div class="icon d-flex align-items-center justify-content-center">
                                                    <span class="fa fa-map-marker"></span>
                                                </div>
                                                <div class="text pl-3">
                                                    <p>
                                                        <a href="https://www.google.com/maps?q=31.2261367,29.9543397&z=17&hl=en" target="_blank">Head Office<br>
                                                            @foreach($contact->address as $address)
                                                            {{--  {{ $address }}  --}}
                                                            {{--  @foreach($address as $key => $value)  --}}
                                                                {{ $address->address }}<br>

                                                            {{--  @endforeach  --}}
                                                            @endforeach
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="dbox w-100 d-flex align-items-center">
                                                <div class="icon d-flex align-items-center justify-content-center">
                                                    <span class="fa fa-phone"></span>
                                                </div>
                                                <div class="text pl-3">
                                                    <p><span>Phone:</span>
                                                        @foreach($contact->phone as $phone)
                                                            <a href="tel:+{{ $phone->phone }}">{{ $phone->phone }}</a><br>
                                                        @endforeach
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="dbox w-100 d-flex align-items-center">
                                                <div class="icon d-flex align-items-center justify-content-center">
                                                    <span class="fa fa-paper-plane"></span>
                                                </div>
                                                <div class="text pl-3">
                                                    <p><span>Email:</span>
                                                        @foreach($contact->email as $email)
                                                            <a href="mailto:{{ $email->email }}">{{ $email->email }}</a><br>
                                                        @endforeach
                                                    </p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="google-maps">
            <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3411.8048110836226!2d29.951764775599873!3d31.226136674350027!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMzHCsDEzJzM0LjEiTiAyOcKwNTcnMTUuNiJF!5e0!3m2!1sen!2seg!4v1703668983208!5m2!1sen!2seg" width="100%" height="400px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
@endsection
