<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">News</li>
            <!-- Optionally, you can add icons to the links -->
            <li>
                <a href="{{route('news.index')}}"><i class="fa fa-link"></i> <span>News List</span></a>
            </li>

            <li>
                <a href="{{route('news.new')}}"><i class="fa fa-link"></i> <span>Post News</span></a>
            </li>

            <li class="header">Gallery</li>

            <li>
                <a href="{{route('news.new')}}"><i class="fa fa-link"></i> <span>Photo Gallery</span></a>
            </li>
            <li>
                <a href="{{route('news.new')}}"><i class="fa fa-link"></i> <span>Video Gallery</span></a>
            </li>

            <li class="header">Options</li>

            <li>
                <a href="{{route('category.index')}}"><i class="fa fa-link"></i> <span>Categories</span></a>
            </li>
            <li>
                <a href="{{route('category.index')}}"><i class="fa fa-link"></i> <span>Area</span></a>
            </li>

            <li class="header">Setup Link</li>



            <li class="treeview">
                <a href="#"><i class="fa fa-link"></i> <span>Settings</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('settings.index')}}">Site</a></li>
                    <li><a href="{{route('settings.index')}}">Menu</a></li>
                    <li><a href="{{route('email.index')}}">Email Server</a></li>
                    <li><a href="{{route('role.index')}}"> {{ trans('core.role')}}</a></li>
                    <li><a href="{{route('user.index')}}">{{ trans('core.user')}}</a></li>
                </ul>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>