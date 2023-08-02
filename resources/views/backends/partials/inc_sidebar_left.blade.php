<aside class="main-sidebar sidebar-dark-primary elevation-4">
    
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          @if(Auth::user()->profile)
          <img src="{{ asset('storage/'.Auth::user()->profile) }}" class="img-circle elevation-2" alt="{{ asset(Auth::user()->name) }}">
          @else
          <img src="{{ asset('storage/default_profile.png') }}" alt="" srcset="" width="100" height="auto">
          @endif
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ (Route::is('admin.dashboard')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>

          </li>
    <!-- user edit -->

          <li class="nav-item">

            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            @canany('User access','User add','User edit','User delete')
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.users.create')}}" class="nav-link {{ (Route::is('admin.users.create')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.users.index')}}" class="nav-link {{ (Route::is('admin.users.index')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View</p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="{{ route('admin.users.edit')}}" class="nav-link {{ (Route::is('admin.users.edit')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Edit</p>
                </a>
              </li> --}}
            </ul>
            @endcanany
          </li>

    <!-- end user edit -->
    <!-- Role page -->
    <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-chalkboard-teacher"></i>
          <p>
            Role
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        @canany('Role access','Role add','Role edit','Role delete')
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('admin.roles.create')}}" class="nav-link {{ (Route::is('admin.roles.create')) ? 'active' : '' }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Create</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.roles.index') }}" class="nav-link {{ (Route::is('admin.roles.index')) ? 'active' : '' }}">
              <i class="far fa-circle nav-icon"></i>
              <p>View</p>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a href="pages/charts/flot.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Edit</p>
            </a>
          </li> --}}
        </ul>
        @endcanany
      </li>
<!-- end role page -->
 <!-- Permission page -->
 <li class="nav-item">
    <a href="#" class="nav-link">
      <i class="nav-icon fas fa-chalkboard-teacher"></i>
      <p>
        Permission
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    @canany('Permission access','Permission add','Permission edit','Permission delete')
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{ route('admin.permissions.index') }}" class="nav-link {{ (Route::is('admin.permissions.index')) ? 'active' : '' }}">
          <i class="far fa-circle nav-icon"></i>
          <p>Create</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.permissions.index') }}" class="nav-link {{ Route::currentRouteNamed('admin.permissions.index') ? 'active' : '' }}">
          <i class="far fa-circle nav-icon"></i>
          <p>View</p>
        </a>
      </li>
      {{-- <li class="nav-item">
        <a href="pages/charts/flot.html" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Edit</p>
        </a>
      </li> --}}
    </ul>
    @endcanany
  </li>
<!-- end permission page -->

    {{-- =======================================
    *                                          *
    *               Teacher Page               *
    *                                          *
    ========================================--}}
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chalkboard-teacher"></i>
              <p>
                Teacher
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.teachers.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.teachers.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/flot.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Edit</p>
                </a>
              </li>
            </ul>
          </li>
    <!-- end teacher page -->
    <!-- Student page -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Student
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/charts/chartjs.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/chartjs.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/flot.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Edit</p>
                </a>
              </li>
            </ul>
          </li>
    <!-- Student  end -->
    <!-- Events Start -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Events
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/charts/chartjs.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/chartjs.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/flot.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Edit</p>
                </a>
              </li>
            </ul>
          </li>
    <!-- Events End -->

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
