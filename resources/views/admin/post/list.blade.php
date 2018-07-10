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
                <h1 class="m-0 text-dark">List Posts</h1>
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
                <a href="/admin/post/create" class="btn-success btn" style="float: right;"><i class="fa fa-plus" ></i></a>
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
                                <th>Topic</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Creation</th>
                                <th>Active</th>
                                <th>Tags</th>
                                <th>Seo Title</th>
                                <th>Detail</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            @if(sizeof($posts) > 0)
                                @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->topic->nametopic}}</td>
                                    <td><p data-toggle="tooltip" title="{{$post->title}}">{{cutString($post->title, 20)}}</p>
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
                                        @if($post->urlimage == null)
                                            <a target="_blank" href="/upload/default.png" class="row justify-content-center align-items-center">
                                                <img src="/upload/default.png" alt="Forest" style="width:50px">
                                            </a>
                                        @else
                                            <a target="_blank" href="/upload/post/{{$post->urlimage}}">
                                                <img src="/upload/post/{{$post->urlimage}}" alt="Forest" style="width:100px">
                                            </a>
                                        @endif
                                        
                                    </td>
                                    <td>{{$post->User->name}}</td>
                                    <td> 
                                        <input type="checkbox" name="status" value="{{ $post->id }}" {{ $post->active ? 'checked' : ''}}>
                                        <br>
                                        <span style="font-size: 12px;">View: <code>{{$post->view}}</code></span>
                                    </td>
                                    <td>
                                        @foreach ($post->tag as $tg)
                                           <button type="button" class="btn btn-outline-secondary btn-sm" style="padding: 1px;">{{$tg->tag}}</button>
                                        @endforeach
                                    </td>
                                    <td>
                                        <p data-toggle="tooltip" title="{{$post->description}}">{{cutString($post->seotitle, 20)}}
                                        </p>
                                    </td>
                                    <td>
                                        <div class="mrg-top-15">
                                            <div class="row justify-content-center align-items-center">
                                                <button type="button" class="btn btn-outline-info btn-sm" style="float: right;" data-toggle="modal" data-target="#contentModal{{$post->idpost}}"><i class="fa fa-eye" ></i></button>
                                            </div>
                                            <div class="modal fade" id="contentModal{{$post->idpost}}" tabindex="-1" role="text" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 10000">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <style>
                                                            .model-title{
                                                                color: blue;
                                                            }
                                                        </style>
                                                        <div class="modal-body">
                                                            <div class="container">
                                                                <div>
                                                                    <h5 class="model-title">ID: </h5>
                                                                        {{$post->idpost}}
                                                                    <hr>
                                                                </div>
                                                                <div>
                                                                    <h5 class="model-title">Topic</h5>
                                                                        {{$post->topic->nametopic}}
                                                                    <hr>
                                                                </div>
                                                                <div>
                                                                    <h5 class="model-title">Author</h5>
                                                                        {{$post->User->name}}
                                                                    <hr>
                                                                </div>
                                                                 <div>
                                                                    <h5 class="model-title">Description</h5>
                                                                        {{$post->description}}
                                                                    <hr>
                                                                </div>
                                                                <div>
                                                                    <h5 class="model-title">Tags</h5>
                                                                    @foreach ($post->tag as $tg)
                                                                       <button type="button" class="btn btn-outline-secondary btn-sm" style="padding: 1px;">{{$tg->tag}}</button>
                                                                    @endforeach
                                                                    <hr>
                                                                </div>
                                                                <div>
                                                                    <h5 class="model-title">Images</h5>
                                                                    @if($post->urlimage == null)
                                                                            <img src="/upload/default.png" alt="Forest">
                                                                    @else
                                                                            <img src="/upload/post/{{$post->urlimage}}" alt="Forest">
                                                                    @endif
                                                                    <hr>
                                                                </div>
                                                                <div>
                                                                    <h5 class="model-title">Content</h5>
                                                                    @php  
                                                                        echo $post->contentpost
                                                                    @endphp
                                                                    <hr>
                                                                </div>
                                                                <div>
                                                                    <h5 class="model-title">SEO Title</h5>
                                                                    {{$post->seotitle}}
                                                                    <hr>
                                                                </div>
                                                                 <div>
                                                                    <h5 class="model-title">META Description</h5>
                                                                    {{$post->metades}}
                                                                    <hr>
                                                                </div>
                                                                <div>
                                                                    <h5 class="model-title">SMETA Keywords</h5>
                                                                    {{$post->metakeyword}}
                                                                    <hr>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                          </div>
                                    </td>
                                    <td>
                                        <div class="m-sm-auto">
                                            <a href="admin/post/update/{{$post->idpost}}" title="Update">
                                                <button type="button" class="btn btn-warning btn-sm"><span class="fa fa-edit"></span>   
                                                </button>
                                            </a>
                                        </div>
                                    </td>            
                                    <td>
                                        <div class="m-sm-auto">
                                            <button type="button" title="Delete" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delModal{{$post->idpost}}"> <span class="fa fa-trash"></span>  
                                            </button>
                                            @include('admin.post.delete')
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