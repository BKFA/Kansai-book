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
                <h1 class="m-0 text-dark">List Advertisements</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="admin/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row mb-2 ">
            <div class="col-sm-12  row justify-content-center align-items-center">
                <a href="/admin/adve/create" class="btn-success btn" style="float: right;"><i class="fa fa-plus" ></i></a>
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
				<div class="card">
					<div class="card-body">
						<table id="example1" class="table table-bordered">
							<thead>
							<tr>
								<th>ID</th>
								<th>Description</th>
								<th>Link</th>
								<th>Image</th>
								<th>Update</th>
								<th>Delete</th>
							</tr>
							</thead>
							@if(sizeof($adves) > 0)
            					@foreach($adves as $adve)
								<tr>
									<td>{{$adve->idadve}}</td>
									<td><p data-toggle="tooltip" title="{{$adve->des}}">{{cutString($adve->des, 20)}}</p></td>
									
									<td>
										<a data-toggle="tooltip" title="{{$adve->urladve}}" href="{{$adve->urladve}}">{{$adve->urladve}}
										</a>
									</td>
									<td>
										<style>
											img {
											    border: 1px solid #ddd;
											    border-radius: 4px;
											    padding: 5px;
											    width: 150px;
											}

											img:hover {
											    box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
											}
										</style>
										@if($adve->urlimg == null)
											<a target="_blank" href="/upload/default.png" class="row justify-content-center align-items-center">
											  	<img src="/upload/default.png" alt="Forest" style="width:50px">
											</a>
										@else
											<a target="_blank" href="/upload/adve/{{$adve->urlimg}}">
											  	<img src="/upload/adve/{{$adve->urlimg}}" alt="Forest" style="width:100px">
											</a>
										@endif
									</td>
									
									<td>
										<div class="m-sm-auto">
											<a href="admin/adve/update/{{$adve->idadve}}" title="Update">
												<button type="button" class="btn btn-warning btn-sm"><span class="fa fa-edit"></span>	
												</button>
											</a>
										</div>
									</td>            
									<td>
										<div class="m-sm-auto">
											<button type="button" title="Delete" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delModal{{$adve->idadve}}"> <span class="fa fa-trash"></span>	
											</button>
										</div>
									</td>
								</tr>
								@endforeach
            				@endif
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
	$(document).ready(function(){
	    $('[data-toggle="tooltip"]').tooltip();   
	});
</script>

@endsection