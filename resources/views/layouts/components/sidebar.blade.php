<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('vendor/AdminLTE/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ user_info()->first_name }} {{ user_info()->last_name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li {{ (Request::is('news*') ? 'class=active' : '') }}>
            <a href="{{ route('news.index') }}">
                <i class="fa fa-newspaper-o"></i> <span>News</span>
            </a>
        </li>
        <li {{ (Request::is('editor*') ? 'class=active' : '') }}>
            <a href="{{ route('editor.index') }}">
                <i class="fa fa-users"></i> <span>Editor</span>
            </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
</aside>