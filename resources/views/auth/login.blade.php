
@extends('dashboard.layouts.master2')
@section('css')
<!-- Sidemenu-respoansive-tabs css -->
<link href="{{URL::asset('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">
@endsection
@section('content')
		<div class="container-fluid">
			<div class="row no-gutter">
				<!-- The image half -->
				<div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
					<div class="row wd-100p mx-auto text-center">
						<div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
							<img src="{{URL::asset('assets/img/logo-final.png')}}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
						</div>
					</div>
				</div>
				<!-- The content half -->
				<div class="col-md-6 col-lg-6 col-xl-5 bg-white">
					<div class="login d-flex align-items-center py-2">
						<!-- Demo content-->
						<div class="container p-0">
							<div class="row">
								<div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
									<div class="card-sigin">
										<div class="mb-5 d-flex">
                                             <a href="{{ url('/' . $page='index') }}">
                                                <img src="{{URL::asset('assets/img/logo-final.png')}}"
                                                 class="sign-favicon ht-40" alt="logo">
                                                </a><h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">Saphire</h1></div>
										<div class="card-sigin">
											<div class="main-signup-header">
												<h2 class="text-dark">welcome back</h2>
												<h5 class="font-weight-semibold mb-4">please sign in to continue</h5>
                                                <form method="POST" action="{{ route('login') }}">
                        @csrf

													<div class="form-group">
														<label>email</label> <input class="form-control" placeholder="Enter your email" name="email" type="text">
													</div>
													<div class="form-group">
														<label>password</label> <input class="form-control"   name="password" placeholder="Enter your password" id="password" type="password">
														<input type="checkbox" id="checkbox" class="mb-2 mt-2">Show_Password
                                                    </div><button class="btn btn-dark btn-block " style="background-color:#110c2b;"type="submit">sign in</button>

												</form>
												<div class="main-signin-footer mt-5">

												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div><!-- End -->
					</div>
				</div><!-- End -->
			</div>
		</div>
@endsection
@section('js')
@endsection
<script>
document.addEventListener('DOMContentLoaded', function() {
  let checkbox = document.querySelector('#checkbox');
  let password = document.querySelector('#password');

  checkbox.addEventListener('change', function() {
    password.type = checkbox.checked ? 'text' : 'password';
  });
});
</script>
