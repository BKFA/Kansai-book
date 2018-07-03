@extends('admin.layouts.index')

@section('style')
<!-- Font Awesome -->
<link rel="stylesheet" href="../libraryadmin/plugins/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="../libraryadmin/dist/css/adminlte.min.css">
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
@endsection

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Create New Topic</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="admin/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<!-- general form elements -->
				<div class="card card-primary">
					@if(count($errors) > 0)
					<div class="alert alert-danger">
						@foreach($errors->all() as $err)
						{{$err}}<br>
						@endforeach()
					</div>
					@endif
					@if(session('notify'))
					<div class="alert alert-success"> 
						{{session('notify')}}
					</div>
					@endif
					<div class="card-header">
						<h3 class="card-title">Form Create</h3>
					</div>
					<!-- /.card-header -->
					<!-- form start -->
					<form action="admin/topic/create" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<div class="card-body">
							<div class="form-group">
								<label>Topic</label>
								<select class="form-control select2" style="width: 100%;">
									@foreach ($topic as $t)
			                        	<option value="{{$t->idtopic}}">{{$t->nametopic}}</option>
			                        @endforeach
								</select>
							</div>
							<div class="form-group">
								<label>User Upload</label>
								<select class="form-control select2" style="width: 100%;">
									@foreach ($user as $u)
			                        	<option value="{{$u->iduser}}">{{$u->name}}</option>
			                        @endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Title</label>
								<input class="form-control" type="text" placeholder="Please enter Title">
							</div>
							<div class="form-group">
								<label>Description</label>
								<textarea id="demo" name="description"  class="form-control ckeditor" rows="1"></textarea>
							</div>
							<div class="form-group">
								<label>Content Post</label>
								{{-- <input class="form-control" type="text" placeholder="Please enter Content"> --}}
								<textarea id="demo" name="content" class="form-control ckeditor" rows="10"></textarea>
							</div>
							
							<div class="form-group">
								<label>Image</label>
								<div class="input-group">
									<div class="custom-file">
										<input type="file" class="custom-file-input" id="imgpost" name="imgpost">
										<label class="custom-file-label">Choose image</label>
									</div>
									<div style="width: 100vw;" id="imgupload">	
                    				</div>
								</div>
							</div>
						</div>
						<!-- /.card-body -->

						<div class="card-footer">
							<button type="submit" class="btn btn-primary">Create <i class="fa fa-location-arrow"></i></button>
							<button type="reset" class="btn btn-primary">Reset <i class="fa fa-refresh"></i></button>
						</div>
					</form>
				</div>
				<!-- /.card -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection

@section('script')

<!-- jQuery -->
<script src="../libraryadmin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../libraryadmin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="../libraryadmin/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../libraryadmin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../libraryadmin/dist/js/demo.js"></script>

<script>
    $(document).ready(function(){
        $("input[name=file]").change(function(){
        	$("#filename").html($("input[name=file]").val());
        });
        $("input[name=imgpost]").change(function(e) {
	    	var file = e.originalEvent.srcElement.files[e.originalEvent.srcElement.files.length-1];
			var img = document.createElement("img");
			var reader = new FileReader();
			reader.onloadend = function() {
     			img.src = reader.result;
			}
			reader.readAsDataURL(file);
			$("#imgupload").html(img);
			img.width = "500";
		});
    });
</script>

@endsection