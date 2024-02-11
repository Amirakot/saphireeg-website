@extends('dashboard/layouts.master')
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('title')

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">
                            stastic </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                                {{--  {{ trans('Dashboard/section.update') }}  --}}
                            update
                            </span>
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


							<div class="card-body pt-0">
<form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{ route('stastic.update',$stastic->id) }}">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label>title</label>
        <input type="text" class="form-control" value="{{ $stastic->title }}" name='title' id="inputName" >
    </div>


    <div class="form-group">
                <label>description</label>
        <textarea type="text" name="description" class="ckeditor form-control" id="texterea" >{{ $stastic->description }}</textarea>
    </div>







    <div class="form-group">
        <button class="btn btn-dark">
        add
        </button>

    </div>
</form>
							</div>
						</div>
					</div>
                    </div>



@endsection
@section('js')
<!-- Internal Data tables -->
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
