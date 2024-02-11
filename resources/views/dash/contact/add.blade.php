@extends('dashboard.layouts.master')
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection

@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">
                                {{--  {{ trans('dashboard/main-sidebar.Contact') }}  --}}
                                Contact
                            </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                                {{--  {{ trans('Dashboard/section.add') }}  --}}
                            add
                            </span>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')

				<!-- row -->
				<div class="">
					<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
						<div class="card  box-shadow-0">
							<div class="card-header">
								<h4 class="card-title mb-1">add contact</h4>

							<div class="card-body pt-0">
								<form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{ route('contact.store') }}" >
                                    @csrf


								<div class="form-group">
    <label for="phone_numbers">Phone Numbers</label>
    <input type="tel" class="form-control @error('phone_numbers.*') is-invalid @enderror" id="phone_numbers" name="phone_numbers[]" value="{{ old('phone_numbers.0') }}" placeholder="Enter phone number">
    <input type="tel" class="form-control mt-2 @error('phone_numbers.*') is-invalid @enderror" name="phone_numbers[]" value="{{ old('phone_numbers.1') }}" placeholder="Enter another phone number (optional)">
    {{--  <input type="tel" class="form-control mt-2 @error('phone_numbers.*') is-invalid @enderror" name="phone_numbers[]" value="{{ old('phone_numbers.1') }}" placeholder="Enter another phone number (optional)">
    <input type="tel" class="form-control mt-2 @error('phone_numbers.*') is-invalid @enderror" name="phone_numbers[]" value="{{ old('phone_numbers.1') }}" placeholder="Enter another phone number (optional)">  --}}
    @error('phone_numbers.*')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

								<div class="form-group">
    <label for="phone_numbers">email</label>
    <input type="text" class="form-control @error('email.*') is-invalid @enderror" id="email" name="email[]" value="{{ old('email.0') }}" placeholder="Enter email">
    <input type="text" class="form-control mt-2 @error('email.*') is-invalid @enderror" name="email[]" value="{{ old('email.1') }}" placeholder="Enter another  email (optional)">
    {{--  <input type="tel" class="form-control mt-2 @error('phone_numbers.*') is-invalid @enderror" name="phone_numbers[]" value="{{ old('phone_numbers.1') }}" placeholder="Enter another phone number (optional)">
    <input type="tel" class="form-control mt-2 @error('phone_numbers.*') is-invalid @enderror" name="phone_numbers[]" value="{{ old('phone_numbers.1') }}" placeholder="Enter another phone number (optional)">  --}}
    @error('email.*')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="address">Address</label>
    <input type="text" class="form-control @error('address.*') is-invalid @enderror" id="address" name="address[]" value="{{ old('address.0') }}" placeholder="Enter address">
    <input type="text" class="form-control mt-2 @error('address.*') is-invalid @enderror" name="address[]" value="{{ old('address.1') }}" placeholder="Enter another address (optional)">
    @error('address.*')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

									<div class="form-group mb-0 mt-3 justify-content-end">
										<button type="submit" class="btn btn-secondary">
									add
										</button>
                                        <div>

									</div>
								</form>
							</div>
						</div>
					</div>


@endsection
@section('js')
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
@endsection
