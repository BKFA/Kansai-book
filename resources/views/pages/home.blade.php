@extends('pages.layouts.index')

@section('title', 'Trang chu')

@section('content')

<div class="col-md-3 blog-left markdown-toc">
    <div class="pz bpi afo" style="border: none;">
        <div class="qf" style="background: #f5f8fa; border: none; height: 50px; "></div>
        <div class="qa avz bg-white rounded box-shadow">
            <a href="profile/index.html">
              <img
                class="bpj"
                src="img/avatar.png">
            </a>
            <h6 class="qb">
                          <a class="boa" href="profile/index.html">Trọng Bình</a>
                        </h6>
            <p class="afo">I wish i was a little bit taller, wish i was a baller, wish i had <b style="color: red;">a girl</b>… also.</p>
            <ul class="bpk">
                <li class="bpl">
                    <a href="#" class="boa" data-toggle="modal" data-target="#myModal">
                      Followers
                      <h6 class="aej">12</h6>
                    </a>
                    <!-- The Modal -->
                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Suggestions</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="media text-muted pt-3 border-bottom">
                                        <a href="#" class="btn-sm justify-content-between align-items-center" data-toggle="dropdown"><img src="img/avatar.png" alt="User Avatar" class="img-size-30 img-circle"></a>
                                        <div class="media-body pb-3 mb-0 small lh-125 border-gray">
                                            <div class="d-flex justify-content-between align-items-center w-100">
                                                <strong class="text-gray-dark">Full Name</strong>
                                                <a href="#" class="btn btn-outline-primary btn-sm">Follow</a>
                                            </div>
                                            <span class="d-block">@username</span>
                                        </div>
                                    </div>
                                    <div class="media text-muted pt-3  border-bottom">
                                        <a href="#" class="btn-sm justify-content-between align-items-center" data-toggle="dropdown"><img src="img/avatar.png" alt="User Avatar" class="img-size-30 img-circle"></a>
                                        <div class="media-body pb-3 mb-0 small lh-125 border-gray">
                                            <div class="d-flex justify-content-between align-items-center w-100">
                                                <strong class="text-gray-dark">Full Name</strong>
                                                <a href="#" class="btn btn-outline-primary btn-sm">Follow</a>
                                            </div>
                                            <span class="d-block">@username</span>
                                        </div>
                                    </div>
                                    <div class="media text-muted pt-3  border-bottom">
                                        <a href="#" class="btn-sm justify-content-between align-items-center" data-toggle="dropdown"><img src="img/avatar.png" alt="User Avatar" class="img-size-30 img-circle"></a>
                                        <div class="media-body pb-3 mb-0 small lh-125 border-gray">
                                            <div class="d-flex justify-content-between align-items-center w-100">
                                                <strong class="text-gray-dark">Full Name</strong>
                                                <a href="#" class="btn btn-outline-primary btn-sm">Follow</a>
                                            </div>
                                            <span class="d-block">@username</span>
                                        </div>
                                    </div>
                                    <br>
                                    <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal">Close</button>
                                    <!-- </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="bpl">
                    <a href="#userModal" class="boa" data-toggle="modal">
                      Following
                      <h6 class="aej">1</h6>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="my-3 p-3 bg-white rounded box-shadow">
        <h6 class="border-bottom border-gray pb-2 mb-0">Public</h6>
        <ul class="dc axg">
            <li><span class="axc aff fa fa-tags" style="font-size: 16px;"></span><a href="#">Tags</a></li>
            <li><span class="axc aff fa fa-link" style="font-size: 16px;"></span><a href="#"> Links</a></li>
            <li><span class="axc aff fa fa-users" style="font-size: 16px;"></span><a href="#"> Users</a></li>
            <li><span class="axc aff fa fa-briefcase" style="font-size: 16px;"></span><a href="#"> Jobs</a></li>
            <li><span class="axc aff fa fa-newspaper-o" style="font-size: 16px;"></span><a href="#"> Tech News</a></li>
        </ul>
    </div>
    <div class="my-3 p-3 bg-white rounded box-shadow">
        <img src="img/qc.jpg" alt="" class="img-fluid">
    </div>
</div>
<div class="col-md-6 blog-main bg-white rounded box-shadow">
    <h3 class="pb-3 mb-4 border-bottom row justify-content-center align-items-center">
       Top Questions
    </h3>
    <div class="blog-post">
        @foreach($post_new as $post_new)
            <div><a href="/detail/{{$post_new->ansititle}}">{{$post_new->title}}</a></div>
        @endforeach
    </div>
</div>

@endsection