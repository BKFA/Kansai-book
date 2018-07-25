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
<link rel="stylesheet" href="../libraryadmin/plugins/thumbnail/thumbnail.css">
@endsection

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">List Posts</h1>
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
			<div class="col-12">
				<div class="card">
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
					<div class="card-body table-responsive">
						<table id="example1" class="table table-bordered table-striped text-center">
							<thead>
							<tr>
								<th>ID</th>
								<th>Topic</th>
								<th>User</th>
								<th>Title</th>
								<th>Description</th>
								<th>Content</th>
								<th>Image</th>
								<th>View</th>
								<th>Update</th>
								<th>Delete</th>
							</tr>
							</thead>
							@php $i=0 @endphp
							@foreach ($post as $p)
							<tr>
								<td>
									<div class="thumbnail">
										<h6>@php echo ++$i; @endphp</h6>
									</div>
								</td>
								<td>
									<div class="thumbnail">
										<h6>{{cutString($p->topic->name,20)}}</h6>
										<p>{{$p->topic->name}}</p>
									</div>
								</td>
								<td>
									<div class="thumbnail">
										<h6>{{cutString($p->user->username,20)}}</h6>
										<p>{{$p->user->username}}</p>
									</div>
								</td>
								<td>
									<div class="thumbnail">
										<h6>{{cutString($p->title,20)}}</h6>
										<p>{{$p->title}}</p>
									</div>
								</td>
								<td>
									<div class="mrg-top-15">
										<button type="button" title="See More" class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal1{{$p->id}}">
											{{cutString($p->description, 20)}} ... <h3 class="fa fa-eye nav-icon"></h3>	
										</button>

                                        <!-- Modal -->
										<div class="modal fade" id="myModal1{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
										    <div class="modal-dialog modal-dialog-centered" role="document">
										        <div class="modal-content">
										            <div class="modal-header">
										                <h5 class="modal-title" id="exampleModalCenterTitle"><strong>Description {{$p->title}}</strong></h5>
										                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										                    <span aria-hidden="true">&times;</span>
										                </button>
										            </div>
										            <div class="modal-body">
										                <div class="container" align="left">
										                    <h6>{{$p->description}}</h6>
										                </div>
										            </div>
										        </div>
										    </div>
										</div>
									</div>
								</td>
								<td>
									<div class="mrg-top-15">
										<button type="button" title="See More" class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal2{{$p->id}}">
											{{cutString($p->content, 20)}} ... <h3 class="fa fa-eye nav-icon"></h3>	
										</button>

                                        <!-- Modal -->
										<div class="modal fade" id="myModal2{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
										    <div class="modal-dialog modal-dialog-centered" role="document">
										        <div class="modal-content">
										            <div class="modal-header">
										                <h5 class="modal-title" id="exampleModalCenterTitle"><strong>Content {{$p->title}}</strong></h5>
										                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										                    <span aria-hidden="true">&times;</span>
										                </button>
										            </div>
										            <div class="modal-body">
										                <div class="container" align="left">
										                    <h6>{{$p->content}}</h6>
										                </div>
										            </div>
										        </div>
										    </div>
										</div>
									</div>
								</td>
								<td>
									<div class="thumbnail">
										<img src="upload/images/imgpost/{{$p->urlimage}}" width="60" height="40" >
                                        <span>
                                            <img src="upload/images/imgpost/{{$p->urlimage}}" with="200" height="150" title="Image {{$p->urlimage}}">
                                        </span>
									</div>
								</td>
								<td>
									<div>
										<p>{{$p->view}}</p>
									</div>
								</td>
								
								<td>
									<div class="m-sm-auto">
										<a href="admin/post/update/{{$p->id}}" title="Update">
											<button type="button" class="btn btn-block btn-warning btn-sm">Update <h3 class="fa fa-edit nav-icon"></h3>	
											</button>
										</a>
									</div>
								</td>            
								<td>
									<div class="m-sm-auto">
										<button type="button" title="Delete {{cutString($p->title, 40)}}" class="btn btn-block btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalCenter">Delete <h3 class="fa fa-edit nav-icon"></h3>	
										</button>
										@include('admin.post.delete')
									</div>
								</td>
							</tr>
							@endforeach
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