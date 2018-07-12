@extends('admin.layouts.index')

@section('style')
<!-- Font Awesome -->
<link rel="stylesheet" href="../libraryadmin/plugins/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Select2 -->
 <link rel="stylesheet" href="../libraryadmin/plugins/select2/select2.min.css">
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
                <h1 class="m-0 text-dark">Create New Post</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="admin/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div><!-- /.col -->
            <div class="col-sm-12">
            	@if(count($errors) > 0)
				 	<div class="p-3 mb-3 rounded alert rounded box-shadow" style="background: #EE7C60 !important; font-size: 14px; margin-top: 10px;">
	            		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	                    <strong>
		                    @foreach($errors->all() as $err)
			                  	{{$err}}<br>
			              	@endforeach()
	                	</strong>
	            	</div>
		        @endif
		        @if(session('loi'))
		        	<div class="p-3 mb-3 rounded alert rounded box-shadow" style="background: #EE7C60 !important; font-size: 14px; margin-top: 10px;">
	            		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	                    <strong>
		                    {{session('loi')}}
	                	</strong>
	            	</div>
                @endif
		        @if(session('thongbao'))
		          	<div class="p-3 mb-3 rounded alert rounded box-shadow" style="background: #7DF5B4 !important; font-size: 14px; margin-top: 10px;">
	            		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	                    <strong>{{session('thongbao')}}</strong>
	            	</div>
		        @endif
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
					<div class="card-header">
						<h3 class="card-title">Form Create</h3>
					</div>
					<!-- /.card-header -->
					<!-- form start -->
					<form action="admin/post/create" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<div class="card-body">
							<div class="form-group">
								<label>Topic</label>
								<select class="form-control select2" style="width: 100%;" name="idTopic">
									@foreach ($topic as $t)
			                        	<option value="{{$t->idtopic}}">{{$t->nametopic}}</option>
			                        @endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Title</label>
								<input class="form-control" type="text" placeholder="Please enter Title" name="title">
							</div>
	
							<div class="form-group">
			                  	<label>Multiple</label>
				                <select class="form-control tags" multiple="multiple" data-placeholder="Select a Enter Tag" style="width: 100%;" name="idTag[]">
								  	@foreach ($tag as $tg)
			                        	<option value="{{$tg->idtag}}">{{$tg->tag}}</option>
			                        @endforeach
								</select>
							</div>

							<div class="form-group">
								<label>Description</label>
								<textarea class="form-control" rows="5" placeholder="Enter Description ..." name="description"></textarea>
							</div>
							<div class="form-group">
								<label>Content Post</label>
								<textarea id="demo" name="content" class="form-control ckeditor" rows="10"></textarea>
							</div>

							<div class="form-group">
                                <label>Ảnh</label>
                                <br>
                                <label>
                                    <input type="file" class="form-control" name="img" id="file" />
                                </label>
                                <div id="status_upload"></div>
                                <div class="preview">
                                    <div class="imgpreview" align="center">
                                        <img id="previewing" src="" />
                                    </div>
                                    <div class="message"></div>
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
<!-- Select2 -->
<script src="../libraryadmin/plugins/select2/select2.full.min.js"></script>
<!-- FastClick -->
<script src="../libraryadmin/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../libraryadmin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../libraryadmin/dist/js/demo.js"></script>

<script>
    $(document).ready(function(){

    	$(".tags").select2({
		 	tags: true
		});

        var message = document.getElementsByClassName("message")[0];
	    var file_upload = document.getElementById('file');
	    // hiển thị ảnh nếu validation thành công
	    file_upload.addEventListener('change', function(e) {
	        var file = this.files[0];
	        var imagefile = file.type;
	        var match = ["image/jpeg", "image/png", "image/jpg"];
	        if (!((imagefile == match[0]) || (imagefile == match[1]) ||
	                (imagefile == match[2]))) {
	        	
	            message.innerHTML = "File phải có định dạng jpeg, jpg and png";
	            document.getElementById('previewing').style.display = "none";
	            return false;
	        } else {
	            message.innerHTML = "Chấp nhận";
	            var reader = new FileReader();
	            reader.onload = function imageIsLoaded(e) {
	                var previewing = document.getElementById('previewing');
	                previewing.style.display = "block";
	                previewing.setAttribute('src', e.target.result);
	                previewing.setAttribute('width', '500px');
	                previewing.setAttribute('height', '100%');
	            }
	            reader.readAsDataURL(this.files[0]);
	        }
	    });
        
    });

</script>

@endsection