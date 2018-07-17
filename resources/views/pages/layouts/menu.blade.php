<nav class="navbar navbar-expand-md fixed-top navbar-dark bg-primary" style="z-index: 1000; background: #1292d3 !important;">
    <a class="navbar-brand" href="#" style="font-weight: bold;"><img src="img/ava.png" alt="Kansaibook" class="img-fluid ava"><span class="">ANSAIBOOK</span></a>
    <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
        <span class="navbar-toggler-icon"></span>
    </button>
    <style>

    </style>
    <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link active" href="#"><span class="fa fa-home"></span> Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Topics</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    @foreach($topic_all as $topic)
                    <a class="dropdown-item" href="list/{{$topic->idtopic}}">{{$topic->nametopic}}</a>
                    @endforeach
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><span class="fa fa-question-circle-o"></span> Add Question</a>
            </li>
            
        </ul>
        <form class="form-inline my-2 my-lg-0" method="POST">
            <div class="input-group" style="padding: 3px;">
                <input class="form-control border-secondary search" data-action="grow" type="search" value="" placeholder="Search">
            </div>
        </form>
        <div class="dropdown">
            <a href="#" class="btn-sm justify-content-between align-items-center" data-toggle="dropdown"><img src="img/avatar.png" alt="User Avatar" class="img-size-30 img-circle ava"></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="#"><span class="fa fa-user-circle-o"></span> Frofile</a>
                <a class="dropdown-item" href="#"><span class="fa fa-sign-out"></span> Log out</a>
            </div>
        </div>
    </div>
</nav>