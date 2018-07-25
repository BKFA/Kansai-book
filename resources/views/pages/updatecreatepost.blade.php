@extends('pages.layouts.index')

@section('title', 'Create New Post')

@section('content')
<div class="col-md-6 blog-main bg-white rounded box-shadow">
    <form action="posts/update/{{$post->id}}/{{$post->ansititle}}" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<div class="card-body">
			<div class="form-group">
				<label>Topic</label>				
				<select class="form-control select2" name="topic" style="width: 100%;">
					@foreach ($topicPost as $tp)
                    	<option value="{{$tp->id}}">{{$tp->name}}</option>
                    @endforeach
				</select>
			</div>
			<div class="form-group">
				<label>Title</label>
				<input class="form-control" name="title" type="text" placeholder="Please enter Title" value="{{$post->title}}">
			</div>
			<div class="form-group">
				<label>Description</label>
				<textarea name="description" name="description" class="form-control" rows="3" >{{$post->description}}</textarea>
			</div>
			<div class="form-group">
				<label>Content Post</label>
				<textarea id="demo" name="content" class="form-control ckeditor" rows="10">{{$post->content}}</textarea>
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

@endsection

@section('script')

<script>
    $(document).ready(function(){
        $("input[name=imgpost]").change(function(){
        	$("#imgpost").html($("input[name=imgpost]").val());
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