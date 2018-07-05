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
                <h1 class="m-0 text-dark">Create New User</h1>
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
					<form action="admin/user/create" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<div class="card-body">
							<div class="form-group">
								<label for="exampleInputName1">Name</label>
								<input name="name" type="text" class="form-control" id="exampleInputName1" placeholder="Enter Name" required>
							</div>
							<div class="form-group">
								<label for="exampleInputUserName1">User Name</label>
								<input name="username" type="text" class="form-control" id="exampleInputUserName1" placeholder="Enter User Name" required>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Password</label>
								<input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password" required>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Email address</label>
								<input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required>
							</div>
							<div class="form-group">
								<label for="exampleInputAge1">Age</label>
								<input name="age" type="text" class="form-control" id="exampleInputAge1" placeholder="Enter email">
							</div>
							<div class="form-group">
								<label for="exampleInputJob1">Job</label>
								<input name="job" type="text" class="form-control" id="exampleInputJob1" placeholder="Enter Job">
							</div>
							<div class="form-group">
								<label for="exampleInputAuth1">IDAuth</label>
								<input name="idauth" type="text" class="form-control" id="exampleInputAuth1" placeholder="Enter Auth" required>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Point</label>
								<input name="point" type="text" class="form-control" id="exampleInputPoint1" placeholder="Enter Point" required>
							</div>
							<div class="form-group">
								<label for="exampleInputEducation1">Education</label>
								<input name="education" type="text" class="form-control" id="exampleInputEducation1" placeholder="Enter Education">
							</div>
							<div class="form-group">
								<label for="exampleInputAddress1">Address</label>
								<input name="address" type="text" class="form-control" id="exampleInputAddress1" placeholder="Enter Address">
							</div>
							<div class="form-group">
								<label for="exampleInputJapanlv1">Japanese level</label>
								<input name="japanlv" type="text" class="form-control" id="exampleInputJapanlv1" placeholder="Enter Japanese level">
							</div>
							<div class="form-group">
								<label for="exampleInputEnglv1">English level</label>
								<input name="englv" type="text" class="form-control" id="exampleInputEnglv1" placeholder="Enter English level">
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

@endsection