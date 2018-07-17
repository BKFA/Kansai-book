<nav class="navbar navbar-expand-md fixed-top navbar-dark bg-primary" style="z-index: 1000; background: #1292d3 !important;">
    <a class="navbar-brand" href="/" style="font-weight: bold;"><img src="../librarypages/img/ava.png" alt="Kansaibook" class="img-fluid ava"><span class="">ANSAIBOOK</span></a>
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
            <li class="nav-item">
                <a class="nav-link" href="#"><span class="fa fa-pencil-square-o"></span> Answer</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><span class="fa fa-file-text-o"></span> Documents</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><span class="fa fa-question-circle-o"></span> Add Question</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Topics</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" method="POST">
            <div class="input-group" style="padding: 3px;">
                <input class="form-control border-secondary search" data-action="grow" type="search" value="" placeholder="Search">
            </div>
        </form>
        @if(!Auth::user())
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/login"><span class="fa fa-sign-in"></span> Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/register"><span class="fa fa-user-plus"></span> Register</a>
                </li>
            </ul>
        @else
        <div class="dropdown">
            <a href="#" class="btn-sm justify-content-between align-items-center" data-toggle="dropdown"><img src="../librarypages/img/avatar.png" alt="User Avatar" class="img-size-30 img-circle ava"></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="#"><span class="fa fa-user-circle-o"></span> {{Auth::user()->name}}</a>
                <a class="dropdown-item" 
                    href="{{ route('logout') }}" 
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <span class="fa fa-sign-out"></span>
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
        <a class="btn btn-danger btn-sm" href="/posts/create"><span class="fa fa-pencil-square-o"></span> Create Post</a>
        @endif
    </div>
</nav>