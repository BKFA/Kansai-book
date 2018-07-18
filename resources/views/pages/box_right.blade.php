<div class="col-md-3 blog-sidebar">
    <div class="p-3 mb-3 rounded alert rounded box-shadow" style="background: #f7f0e6 !important; font-size: 14px; margin-top: 10px;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Kansaibook</strong> la mot website ho tro hoc tieng nhat so mot Viet Nam!!!
    </div>
    <div class="my-3 p-3 bg-white rounded box-shadow">
        <h6 class="border-bottom border-gray pb-2 mb-0">Hot Post</h6>
        <ol class="hot-post">
            @foreach($post_hot as $post_hot)
            <li><a href="#">{{$post_hot->title}}</a></li>
            @endforeach
        </ol>
        <div class="row justify-content-center align-items-center">
            <button class="btn btn-outline-primary btn-sm">Read More <span class="fa fa-angle-double-right" style="font-size: 12px"></span></button>
        </div>
    </div>
    <div class="my-3 p-3 bg-white rounded box-shadow">
        <h6 class="border-bottom border-gray pb-2 mb-0">Hot Authors</h6>
        @foreach($user_hot as $user_hot)
        <div class="media text-muted pt-3 border-bottom">
            <img src="img/avatar.png" alt="User Avatar" class="mr-2  img-size-40 img-circle">
            <div class="media-body pb-3 mb-0 small lh-125 border-gray">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <strong class="text-gray-dark">{{$user_hot->name}}</strong>
                    <a href="#" class="btn btn-outline-primary btn-sm"><span class="fa fa-user-plus"></span> Follow</a>
                </div>
                <span class="d-block">{{$user_hot->username}}</span>
            </div>
        </div>
        @endforeach
        <div class="row justify-content-center align-items-center">
            <small class="d-block text-right mt-3">
                            <a href="#">All suggestions</a>
                        </small>
        </div>
    </div>
    <div class="p-3 bg-white rounded box-shadow">
        <h4 class="border-bottom border-gray pb-2 mb-0">Tag</h4>
        <ul class="footer_labels">
            @foreach($tag_all as $tag_all)
            <li><a class="btn btn-outline-secondary btn-sm" href="#">{{$tag_all->contenttag}}</a></li>
            @endforeach
        </ul>
    </div>
</div>