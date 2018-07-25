@extends('admin.layouts.index')

@section('style')
<!-- Font Awesome -->
<link rel="stylesheet" href="../libraryadmin/plugins/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="../libraryadmin/plugins/iCheck/all.css">
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
                <h1 class="m-0 text-dark">Update User</h1>
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
						<h3 class="card-title">Form Update User</h3>
					</div>
					<!-- /.card-header -->
					<!-- form start -->
					<form action="admin/user/update/{{$updateUser->id}}" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<div class="card-body">
							<div class="form-group">
								<label for="exampleInputName1">Name</label>
								<input name="name" value="{{$updateUser->name}}" type="text" class="form-control" id="exampleInputName1" placeholder="Enter Name" required>
							</div>
							<div class="form-group">
								<label for="exampleInputUserName1">User Name</label>
								<input name="username" value="{{$updateUser->username}}" type="text" class="form-control" id="exampleInputUserName1" placeholder="Enter User Name" disabled="">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Email address</label>
								<input name="email" value="{{$updateUser->email}}" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" disabled="">
							</div>
							<div class="form-group">
								<input type="checkbox" class="icheckbox_minimal-red" id="changePassword" name="changePassword">
								<label for="exampleInputPassword1">Password</label>
								<input name="password" type="password" class="form-control password" id="exampleInputPassword1" placeholder="Enter Password" disabled="">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Confirm Password</label>
								<input name="confirmpassword" type="password" class="form-control password" id="exampleInputPassword1" placeholder="Confirm Password" disabled="">
							</div>
							<div class="form-group">
								<label for="exampleInputAge1">Age</label>
								<input name="age" value="{{$updateUser->age}}" type="text" class="form-control" id="exampleInputAge1" placeholder="Enter age">
							</div>
							<div class="form-group">
								<label for="exampleInputJob1">Job</label>
								<input name="job" value="{{$updateUser->job}}" type="text" class="form-control" id="exampleInputJob1" placeholder="Enter Job">
							</div>
							<div class="form-group">
								<label for="exampleInputAuth1">Auth</label>
								<br>
								<label>
									<input
										type="radio" class="iradio_minimal-red" name="auth" value="0"
										@if ($updateUser->role == 0)	
			                            	{{"checked"}}
			                            @endif
									> Nomal User
								</label>
								<label>
									<input 
										type="radio" class="iradio_minimal-red" name="auth" value="1"
										@if ($updateUser->role == 1)	
			                            	{{"checked"}}
			                            @endif
			                        > Admin
								</label>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Point</label>
								<input name="point" value="{{$updateUser->point}}" type="text" class="form-control" id="exampleInputPoint1" placeholder="Enter Point" required>
							</div>
							<div class="form-group">
								<label for="exampleInputEducation1">Education</label>
								<input name="education" value="{{$updateUser->education}}" type="text" class="form-control" id="exampleInputEducation1" placeholder="Enter Education">
							</div>
							<div class="form-group">
								<label for="exampleInputAddress1">Address</label>
								<input name="address" value="{{$updateUser->address}}" type="text" class="form-control" id="exampleInputAddress1" placeholder="Enter Address">
							</div>
							<div class="form-group">
								<label for="exampleInputJapanlv1">Japanese level</label>
								<input name="japanlv" value="{{$updateUser->japanlv}}" type="text" class="form-control" id="exampleInputJapanlv1" placeholder="Enter Japanese level">
							</div>
							<div class="form-group">
								<label for="exampleInputEnglv1">English level</label>
								<input name="englv" value="{{$updateUser->englv}}" type="text" class="form-control" id="exampleInputEnglv1" placeholder="Enter English level">
							</div>
							
						</div>
						<!-- /.card-body -->

						<div class="card-footer">
								<button type="submit" class="btn btn-primary">Update <i class="fa fa-location-arrow"></i></button>
							<a href="">
								<button type="reset" class="btn btn-primary">Reset <i class="fa fa-refresh"></i></button>
							</a>
							<a href="admin/user/list">
								<button type="button" class="btn btn-secondary">Cancel <i class="fa fa-cancel"></i></button>
							</a>
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
<!-- iCheck 1.0.1 -->
<script src="../libraryadmin/plugins/iCheck/icheck.min.js"></script>

<script>
    $(document).ready(function(){
		$("#changePassword").change(function(){
			if($(this).is(":checked")) {
				$(".password").removeAttr('disabled');
			}
			else {
				$(".password").attr('disabled','');
			}
		});
	});
</script>

<script>
	
</script>

@endsection