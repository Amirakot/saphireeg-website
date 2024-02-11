
    <footer class="footer ftco-section" style=" background-color:rgba(125,145,164,0.8); background-image: url('images/footer.jpg');
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover; ">
      <div class="container">
        <div class="row mb-3">
          <div class="col-md-7 col-lg">
            <div class="ftco-footer-widget mb-4">
              <h2 class="logo2"><a href="index.php"><img src="{{asset('images/Untitled-4.png')}}" style="height: 25vh;" ></a></h2>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-4" style="padding-left: 12%;">




                <li class="ftco-animate"><a href="#"><span class="fa fa-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="fa fa-instagram"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="fa fa-linkedin"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-lg">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2" >Services</h2>

              <ul class="list-unstyled">
                 @foreach($servicelevel1 as $key => $service)
                <li><a href="{{ route('servicelevel1',$service->id) }}" class="py-1 d-block"><span class="fa fa-check mr-3"></span>
                    {{ $service->title }}
                </a></li>

     @endforeach

              </ul>
            </div>
          </div>
          <div class="col-md-6 col-lg">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2" >Contact information</h2>
                @foreach($contacts as $contact)
    <div class="block-23 mb-3">
        <ul>
            @foreach($contact->address as $address)
                <li><span class="icon fa fa-map-marker"></span><span class="text"><a href="{{ $address->google_map_url }}" target="_blank">{{ $address->address }}</a></span></li>
            @endforeach
            @foreach($contact->phone as $phone)
                <li><span class="icon fa fa-phone"></span><a href="tel:{{ $phone->phone }}" target="_blank"><span class="text">Tel: +{{ $phone->phone }}</span></a></li>
            @endforeach
            @foreach($contact->email as $email)
                <li><span class="icon fa fa-paper-plane"></span><a href="mailto:{{ $email->email }}" target="_blank"><span class="text">E-mail: {{ $email->email }}</span></a></li>
            @endforeach
        </ul>
    </div>
@endforeach


            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
				<img src="{{asset('images/copyright.png')}}" width="35%">
          </div>
        </div>
      </div>
    </footer>



  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="{{ asset('js/jquery.min.js')}}"></script>
  <script src="{{ asset('js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{ asset('js/popper.min.js')}}"></script>
  <script src="{{ asset('js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('js/jquery.easing.1.3.js')}}"></script>
  <script src="{{ asset('js/jquery.waypoints.min.js')}}"></script>
  <script src="{{ asset('js/jquery.stellar.min.js')}}"></script>
  <script src="{{ asset('js/jquery.animateNumber.min.js')}}"></script>
  <script src="{{ asset('js/bootstrap-datepicker.js')}}"></script>
  <script src="{{ asset('js/jquery.timepicker.min.js')}}"></script>
  <script src="{{ asset('js/owl.carousel.min.js')}}"></script>
  <script src="{{ asset('js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{ asset('js/scrollax.min.js')}}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{ asset('js/google-map.js')}}"></script>
  <script src="{{ asset('js/main.js')}}"></script>



	<script>
// Prevent closing from click inside dropdown
$(document).on('click', '.dropdown-menu', function (e) {
  e.stopPropagation();
});

// make it as accordion for smaller screens
if ($(window).width() < 992) {
  $('.dropdown-menu a').click(function(e){
    e.preventDefault();
      if($(this).next('.submenu').length){
        $(this).next('.submenu').toggle();
      }
      $('.dropdown').on('hide.bs.dropdown', function () {
     $(this).find('.submenu').hide();
  })
  });
}
</script>








	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



  </body>
</html>
