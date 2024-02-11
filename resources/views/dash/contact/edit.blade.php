@extends('dashboard.layouts.master')
@section('css')
<!-- Internal Select2 css -->

<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('title')
{{ trans('website/section_trans.update') }} {{ trans('website/section_trans.contact') }}
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">
                                {{--  {{ trans('Dashboard/main-sidebar.Contact') }}  --}}
                            Contact
                            </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                                {{--  {{ trans('Dashboard/section_trans.update') }}  --}}

                                update</span>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')

				<!-- row -->

					<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
						<div class="card  box-shadow-0">
							<div class="card-header">
								<h4 class="card-title mb-1">
                                    {{--  {{ trans('Dashboard/section.Update') }}  --}}
                                Update
                                </h4>
<form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{ route( 'contact.update',$contact->id) }}" >
    @csrf
    @method('PUT')
    {{--  <div class="form-group">
        <input type="text" id='address' value="{{ $contact->address }}" class="form-control" name="address" id="inputName" placeholder="Enter address">
        @error('address')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>  --}}
    {{--  <div class="form-group">
        <label>
            {{--  {{ trans('Dashboard/login.email') }}  --}}

        {{--  email</label>  --}}
        {{--  @foreach ($contact->email as $email )  --}}


{{--  <input type="text" class="form-control" id="" name="email" value="{{ old('email', $contact->email ?? '') }}">  --}}
{{--  @endforeach  --}}
{{--  @error('email.*')  --}}
    {{--  <div class="alert alert-danger">{{ $message }}</div>  --}}
{{--  @enderror  --}}

{{--  </div>  --}}

        {{--  @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>  --}}
    {{--  {{ $contact->phones[0]->phone }}  --}}

 <div class="form-group">
<label for="phone_numbers">phone</label>

@foreach ($contact->phone as $phone )


<input type="text" class="form-control" id="phone_numbers" name="phone_numbers[]" value="{{ old('phone_numbers.0', $phone->phone  ?? '') }}">
@endforeach
@error('phone_numbers.*')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

</div>
 <div class="form-group">
<label for="phone_numbers">email</label>

@foreach ($contact->email as $email )


<input type="text" class="form-control" id="phone_numbers" name="email[]" value="{{ old('email.0', $email->email  ?? '') }}">
@endforeach
@error('email.*')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

</div>
 <div class="form-group">
<label for="phone_numbers">address</label>

@foreach ($contact->address as $address )


<input type="text" class="form-control" id="address" name="address[]" value="{{ old('address.0', $address->address  ?? '') }}">
@endforeach
@error('address.*')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

</div>

    <div class="form-group mb-0 mt-3 justify-content-end">
        <button type="submit" class="btn btn-secondary">

      Update
        </button>
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
