@extends('admin.layouts.index')

@section('style')
<!-- Font Awesome -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../libraryadmin/plugins/font-awesome/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- DataTables -->
<link rel="stylesheet" href="../libraryadmin/plugins/datatables/dataTables.bootstrap4.css">
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
                <h1 class="m-0 text-dark">List Topics</h1>
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
				<div class="card">
					<div class="card-body">
						<table id="example1" class="table table-bordered">
							<thead>
							<tr>
								<th>ID</th>
								<th>Name</th>
								<th>AnsiName</th>
								<th>AnsiName</th>
								<th>AnsiName</th>
								<th>Update</th>
								<th>Delete</th>
							</tr>
							</thead>
							<tr>
								<td>1</td>
								<td>Update software</td>
								<td>Update software</td>
								<td>Update software</td>
								<td>Update software</td>
								<td>
									<div class="m-sm-auto">
										<a href="admin/topic/update/id" title="Update">
											<button type="button" class="btn btn-block btn-warning btn-sm">Update <h3 class="fa fa-edit nav-icon"></h3>	
											</button>
										</a>
									</div>
								</td>            
								<td>
									<div class="m-sm-auto">
										<button type="button" title="Delete" class="btn btn-block btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalCenter">Delete <h3 class="fa fa-edit nav-icon"></h3>	
										</button>
										@include('admin.topic.delete')
									</div>
								</td>
							</tr>
							<tr>
								<td>2</td>
								<td>Update software</td>
								<td>Update software</td>
								<td>Update software</td>
								<td>Update software</td>
								<td>
									<div class="m-sm-auto">
										<a href="admin/topic/update/id" title="Update">
											<button type="button" class="btn btn-block btn-warning btn-sm">Update <h3 class="fa fa-edit nav-icon"></h3>	
											</button>
										</a>
									</div>
								</td>            
								<td>
									<div class="m-sm-auto">
										<button type="button" title="Delete" class="btn btn-block btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalCenter">Delete <h3 class="fa fa-edit nav-icon"></h3>	
										</button>
										@include('admin.topic.delete')
									</div>
								</td>
							</tr>
							<tr>
								<td>3</td>
								<td>Update software</td>
								<td>Update software</td>
								<td>Update software</td>
								<td>Update software</td>
								<td>
									<div class="m-sm-auto">
										<a href="admin/topic/update/id" title="Update">
											<button type="button" class="btn btn-block btn-warning btn-sm">Update <h3 class="fa fa-edit nav-icon"></h3>	
											</button>
										</a>
									</div>
								</td>            
								<td>
									<div class="m-sm-auto">
										<button type="button" title="Delete" class="btn btn-block btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalCenter">Delete <h3 class="fa fa-edit nav-icon"></h3>	
										</button>
										@include('admin.topic.delete')
									</div>
								</td>
							</tr>
						</table>
					</div>
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
<!-- DataTables -->
<script src="../libraryadmin/plugins/datatables/jquery.dataTables.js"></script>
<script src="../libraryadmin/plugins/datatables/dataTables.bootstrap4.js"></script>
<!-- SlimScroll -->
<script src="../libraryadmin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../libraryadmin/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../libraryadmin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../libraryadmin/dist/js/demo.js"></script>
<!-- page script -->
<script>
	$(function () {
		$("#example1").DataTable();
	});
</script>

@endsection