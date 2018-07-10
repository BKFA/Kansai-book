<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin/dashboard" class="brand-link">
        <img src="../libraryadmin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"style="opacity: .8">
        <span class="brand-text font-weight-light">KansaiBook Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="../libraryadmin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <a href="/admin/dashboard" class="nav-link active">
                        <i class="nav-icon fa fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/admin/dashboard" class="nav-link">
                        <i class="nav-icon fa fa-database"></i>
                        <p>
                            Database
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="javascript:void(0)" class="nav-link">
                        <i class="nav-icon fa fa-bar-chart"></i>
                        <p>
                            Topics
                        <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="admin/topic/list" class="nav-link">
                                <i class="fa fa-list nav-icon"></i>
                                <p>List Topics</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="admin/topic/create" class="nav-link">
                                <i class="fa fa-plus-square nav-icon"></i>
                                <p>Add New Topic</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="javascript:void(0)" class="nav-link">
                        <i class="nav-icon fa fa-file-text"></i>
                        <p>
                            Posts
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/post/list" class="nav-link">
                                <i class="fa fa-list nav-icon"></i>
                                <p>List Posts</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/admin/post/create" class="nav-link">
                                <i class="fa fa-plus-square nav-icon"></i>
                                <p>Add New Post</p>
                            </a>
                        </li>

                    </ul>
                </li>

                {{-- <li class="nav-item has-treeview">
                    <a href="javascript:void(0)" class="nav-link">
                        <i class="nav-icon fa fa-tags"></i>
                        <p>
                            Tags
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/forms/general.html" class="nav-link">
                                <i class="fa fa-list nav-icon"></i>
                                <p>List Tags</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/forms/advanced.html" class="nav-link">
                                <i class="fa fa-plus-square nav-icon"></i>
                                <p>Add New Tags</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}

                <li class="nav-header">USERS</li>
                <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p>
                            Users
                            {{-- <span class="badge badge-info right">2</span> --}}
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/user/list" class="nav-link">
                                <i class="fa fa-list nav-icon"></i>
                                <p>List Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/user/create" class="nav-link">
                                <i class="fa fa-user-plus nav-icon"></i>
                                <p>Add New User</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- <li class="nav-item has-treeview">
                    <a href="javascript:void(0)" class="nav-link">
                        <i class="nav-icon fa fa-envelope-o"></i>
                        <p>
                            Mailbox
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/mailbox/mailbox.html" class="nav-link">
                                <i class="fa fa-envelope-open nav-icon"></i>
                                <p>Inbox</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/mailbox/compose.html" class="nav-link">
                                <i class="fa fa-reply nav-icon"></i>
                                <p>Compose</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}
                <li class="nav-item has-treeview">
                    <a href="javascript:void(0)" class="nav-link">
                        <i class="nav-icon fa fa-commenting"></i>
                        <p>
                            Comments
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/mailbox/mailbox.html" class="nav-link">
                                <i class="fa fa-list nav-icon"></i>
                                <p>List Comments</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/mailbox/compose.html" class="nav-link">
                                <i class="fa fa-list nav-icon"></i>
                                <p>List SubComments</p>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li class="nav-header">SYSTEM</li>

                <li class="nav-item has-treeview">
                    <a href="javascript:void(0)" class="nav-link">
                        <i class="nav-icon fa fa-podcast"></i>
                        <p>
                            Advertisements
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="admin/advertisement/list" class="nav-link">
                                <i class="fa fa-list nav-icon"></i>
                                <p>List Advertisements</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="admin/advertisement/create" class="nav-link">
                                <i class="fa fa-plus-square nav-icon"></i>
                                <p>Add Advertisement</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- <li class="nav-item has-treeview">
                    <a href="javascript:void(0)" class="nav-link">
                        <i class="nav-icon fa fa-picture-o"></i>
                        <p>
                            Images
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/mailbox/mailbox.html" class="nav-link">
                                <i class="fa fa-list nav-icon"></i>
                                <p>List Images</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/mailbox/compose.html" class="nav-link">
                                <i class="fa fa-plus-square nav-icon"></i>
                                <p>Add Image</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>