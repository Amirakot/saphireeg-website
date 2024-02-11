@extends('dashboard.layouts.master')
@section('css')
<!-- Internal Select2 css -->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<!--Internal  Datetimepicker-slider css -->
<link href="{{URL::asset('assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/pickerjs/picker.min.css')}}" rel="stylesheet">
<!-- Internal Spectrum-colorpicker css -->
<link href="{{URL::asset('assets/plugins/spectrum-colorpicker/spectrum.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto"> about <i class="fa fa-level-down" aria-hidden="true"></i>  </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ADD</span>
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
								<h4 class="card-title mb-1"></h4>

							<div class="card-body pt-0">
								<form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{route('aboutlevel1.store')}}" >
                                    @csrf
									<div class="form-group">
                                        <label for="inputName">title</label>
										<input type="text" class="form-control" value="{{ old('title') }}" name='title' id="inputName" placeholder="enter title about">
									 @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="description">description</label>
										<textarea  type="text" name="description"class=" ckeditor form-control " id="description" placeholder="add description"> {{ old('description') }}</textarea>
									 @error('description')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                                    </div>

								<div class="form-group">
										<input type="file" name="image" value="{{ old('image') }}" class="form-control" multiple onchange="previewImage(event)">
									 @if($errors->has('image'))
    <div class="text-danger">{{ $errors->first('image') }}</div>
@endif
                                        <div id="preview" style="display: none;">
                                    </div>
                                    </div>



                                    <div class="form-group">
                                        <select name="about_id" id="" class="form-control">
                                            <option value="{{ old('about_id') }}"
                                            selected disabled> --about--</option>
                                            @foreach ($abouts as $about)
                                                <option value="{{ $about->id }}"> {{ $about->title }}</option>
                                            @endforeach
                                            @error('about_id')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </select>
                                    </div>


									<div class="form-group mb-0 mt-3 justify-content-end">
										<button type="submit" class="btn btn-secondary">add</button>
                                        <div>

									</div>
								</form>
							</div>
						</div>
					</div>


@endsection
@section('js')
<!--Internal  Datepicker js -->
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!--Internal  jquery.maskedinput js -->
<script src="{{URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js')}}"></script>
<!--Internal  spectrum-colorpicker js -->
<script src="{{URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js')}}"></script>
<!-- Internal Select2.min js -->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!--Internal Ion.rangeSlider.min js -->
<script src="{{URL::asset('assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
<!--Internal  jquery-simple-datetimepicker js -->
<script src="{{URL::asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js')}}"></script>
<!-- Ionicons js -->
<script src="{{URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js')}}"></script>
<!--Internal  pickerjs js -->
<script src="{{URL::asset('assets/plugins/pickerjs/picker.min.js')}}"></script>
<!-- Internal form-elements js -->
<script src="{{URL::asset('assets/js/form-elements.js')}}"></script>
@endsection
<script>
function previewImage(event) {
    var input = event.target;
    var preview = document.getElementById('preview');
    preview.innerHTML = '';
    for (var i = 0; i < input.files.length; i++) {
        var reader = new FileReader();
        reader.onload = function(e) {
            var img = document.createElement('img');
            img.src = e.target.result;
            img.style.maxWidth = '200px'; // Set a maximum width for the images

            preview.appendChild(img);
        }
        reader.readAsDataURL(input.files[i]);
    }
    preview.style.display = 'block'; // Show the preview element
}
document.addEventListener('click', function(e) {
  if (e.target.matches('.delete-about-image')) {
    e.preventDefault();
    if (confirm('Are you sure you want to delete this about image?')) {
      var aboutImageId = e.target.getAttribute('data-about-id');
      var xhr = new XMLHttpRequest();
      xhr.open('DELETE', '/delete/aboutimage/' + aboutImageId);
      xhr.setRequestHeader('Content-Type', 'application/json');
      xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
      xhr.onload = function() {
        if (xhr.status === 200) {
          // Handle success
        } else {
          // Handle error
        }
      };
      xhr.send();
    }
  }
});
</script>
{{--
 @section('script')
<script>


    ClassicEditor
        .create(document.querySelector('#description'))
        .catch(error => {
            console.error(error);
        });
</script>

@endsection  --}}
