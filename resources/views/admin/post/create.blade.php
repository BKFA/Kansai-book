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
        <!-- form start -->
        <form action="admin/post/create" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="row">
                <div class="col-md-8">
                <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Form Create</h3>
                        </div>
                        <!-- /.card-header -->
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
                                <input id="title" class="form-control" type="text" placeholder="Please enter Title" name="title">
                            </div>
    
                            <div class="form-group">
                                <label>Tag</label>
                                <select class="form-control tags" multiple="multiple" data-placeholder="Select a Enter Tag" style="width: 100%;" name="idTag[]">
                                    @foreach ($tag as $tg)
                                        <option value="{{$tg->idtag}}">{{$tg->tag}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Add Tag</label>
                                <input class="form-control" type="text" placeholder="Please enter tag" name="addTag">
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" rows="5" placeholder="Enter Description ..." name="description"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Content Post</label>
                                <textarea id="demo" name="content" class="form-control ckeditor" rows="10"></textarea>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                    <!-- general form elements disabled -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Sub Elements</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Ansin Title</label>
                                <input type="text" class="form-control" placeholder="Slug ..." id="slug" name="slug">
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="active">
                                    <label class="form-check-label">Active</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Ảnh</label>
                                <br>
                                <div class="input-group">
                                    <input type="file" class="form-control" name="img" id="file" />
                                    <div id="status_upload"></div>
                                </div>
                                <div class="preview">
                                    <div class="imgpreview" align="center">
                                        <img id="previewing" src=""  class="img-fluid" />
                                    </div>
                                    <div class="message"></div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Seo</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- textarea -->
                            <div class="form-group">
                                <label>META Description</label>
                                <textarea class="form-control" rows="3" placeholder="Enter ..." name="metades"></textarea>
                            </div>
                            <div class="form-group">
                                <label>META Keywords</label>
                                <textarea class="form-control" rows="3" placeholder="Enter ..." name="metakey"></textarea>
                            </div>
                            <!-- input states -->
                            <div class="form-group has-success">
                                <label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> SEO Title</label>
                                <input type="text" class="form-control" id="inputSuccess" placeholder="Enter ..." name="seotitle">
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
            <div class="card-footer row justify-content-center align-items-center">
                <button type="submit" class="btn btn-primary">Create <i class="fa fa-location-arrow"></i></button>
                <button type="reset" class="btn btn-primary"  style="margin-left: 30px;">Reset <i class="fa fa-refresh"></i></button>
            </div>
        </form>
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
<script src="{{ asset('libraryadmin/plugins/voca/voca.min.js') }}"></script>

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
                document.getElementById('file').value = null;
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
                    previewing.setAttribute('width', '285px');
                   
                }
                reader.readAsDataURL(this.files[0]);
            }
        });
        
    });

    $('#slug').keyup(function () {
      $(this).val(v.slugify($(this).val()))
     })

    $('#title').keyup(function () {
      $('#slug').val(v.slugify($(this).val()))
    })

</script>

@endsection