  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>



    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->


      <!-- Messages Dropdown Menu -->

      <!-- Notifications Dropdown Menu -->
      <!-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>

    </ul> -->


  </nav>
  <!-- /.navbar -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="javascript:;" class="brand-link" style="text-align: center;">
      <span class="brand-text font-weight-light" style="font-weight: Bold !important; font-size: 20px;" >Cresmanage Hub</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" id="namesss">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
    <img src="{{ url('upload/profile/')  }}/{{ Auth::user()->profile_pic }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;" alt="User Image">
</div>


        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

 <!-- <div class="image">

          <img src="{{ Auth::user()->profile_pic }}" class="img-circle elevation-2" alt="User Image">
        </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        @if(Auth::user()->user_type==1)
        <li class="nav-item">
            <a href="{{ url('admin/dashboard') }}" class="nav-link @if(Request::segment(2)=='dashboard') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard

              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/admin/list') }}" class="nav-link @if(Request::segment(2)=='admin') active @endif">
              <i class="nav-icon far fa-user"></i>
              <p>
                Admin
              </p>
            </a>
          </li>
          <li class="nav-item">
          <li class="nav-item">
              <a href="{{ url('admin/teacher/list') }}" class="nav-link @if(Request::segment(2) == 'teacher') active @endif">
                  <i class="nav-icon far fa-user"></i>
                  <p>
                      Teacher
                  </p>
              </a>
          </li>

          {{-- <li class="nav-item">
            <a href="{{ url('admin/school_year/list') }}" class="nav-link @if(Request::segment(2)=='school_year') active @endif">
              <i class="nav-icon far fa-user"></i>
              <p>
              School Year
              </p>
            </a>
          </li> --}}

          <li class="nav-item">
            <a href="{{ url('admin/student/list') }}" class="nav-link @if(Request::segment(2)=='student') active @endif">
              <i class="nav-icon far fa-user"></i>
              <p>
              Student
              </p>
            </a>
          </li>

             <li class="nav-item @if(Request::segment (2) == 'class'|| Request::segment(2) == 'subject' || Request::
              segment (2) == 'assign_subject' || Request::segment(2) == 'assign_class_teacher' ||  Request::segment(2) ==
              'class_timetable') menu-is-opening menu-open @endif">

              <a href="#" class="nav-link @if(Request::segment (2) == 'class' || Request::segment(2) == 'subject' ||
              Request::segment(2) == 'assign_subject' || Request::segment(2) == 'assign_class_teacher' ||  Request::
              segment(2) == 'class_timetable') active @endif">
             <i class="nav-icon fas fa-table"></i>
             <p>

              Academics
            <i class="fas fa-angle-left right"></i>
               </p>
                  </a>
                   <ul class="nav nav-treeview">
                   <li class="nav-item">
                 <a href="{{ url('admin/class/list') }}" class="nav-link @if(Request::segment(2) == 'class')active @endif">
                 <i class="far fa-circle nav-icon"></i>
                Class
              </p>
            </a>


          <li class="nav-item">
            <a href="{{ url('admin/subject/list') }}" class="nav-link @if(Request::segment(2)=='subject') active @endif">
            <i class="far fa-circle nav-icon"></i>
              <p>
              Subject
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('admin/assign_subject/list') }}" class="nav-link @if(Request::segment(2)=='assign_subject') active @endif">
            <i class="far fa-circle nav-icon"></i>
              <p>
              Assign Subject
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('admin/class_timetable/list') }}" class="nav-link @if(Request::segment(2)=='class_timetable') active @endif">
            <i class="far fa-circle nav-icon"></i>
              <p>
              Class Timetable
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="{{ url('admin/assign_class_teacher/list') }}" class="nav-link @if(Request::segment(2) == 'assign_class_teacher') active @endif">
            <i class="far fa-circle nav-icon"></i>
            <p>
            Assign Class Teacher
        </p>
    </a>
</li>
</ul>



        {{-- <li class="nav-item @if(Request::segment(2) == 'communicate') menu-is-opening menu-open @endif">
    <a href="#" class="nav-link @if(Request::segment(2) == 'communicate') active @endif">
        <i class="nav-icon fas fa-table"></i>
        <p>
            Communicate
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ url('admin/communicate/notice_board') }}" class="nav-link @if(Request::segment(3) == 'notice_board') active @endif">
                <i class="far fa-circle nav-icon"></i>
                <p>Notice Board</p>
            </a>
        </li>
    </ul>
</li> --}}

<li class="nav-item">
        <a href="{{ url('/log-viewer') }}" class="nav-link @if(Request::segment (2)== 'log-viewer') active @endif">
        <i class="far fa-circle nav-icon"></i>
              <p>
                Activity logs
             </p>
           </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('admin/account') }}" class="nav-link @if(Request::segment (2)== 'account') active @endif">
            <i class="far fa-circle nav-icon"></i>
                  <p>
                    My Account
                 </p>
               </a>
            </li>
          <li class="nav-item">
            <a href="{{ url('admin/change_password') }}" class="nav-link @if(Request::segment(2)=='change_password') active @endif">
              <i class="nav-icon far fa-user"></i>
              <p>
              Change Password
              </p>
            </a>
          </li>



        @elseif(Auth::user()->user_type==2)

        <li class="nav-item">
        <a href="{{ url('teacher/dashboard') }}" class="nav-link @if(Request::segment(2)=='teacher') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>


          <li class="nav-item">
        <a href="{{ url('teacher/my_student') }}" class="nav-link @if(Request::segment(2)=='my_student') active @endif">
        <i class="nav-icon far fa-user"></i>

                <p>
                My Student
              </p>
            </a>
          </li>

          <li class="nav-item">
        <a href="{{ url('teacher/my_class_subject') }}" class="nav-link @if(Request::segment(2)=='my_class_subject') active @endif">
        <i class="nav-icon far fa-user"></i>
<i class="nav-icon fas fa-book"></i>
                <p>
                My Class & Subject
              </p>
            </a>
          </li>

{{--
          <li class="nav-item">
    <a href="{{ url('teacher/my_notice_board') }}" class="nav-link @if(Request::segment(2) == 'my_notice_board') active @endif">
        <i class="nav-icon fas fa-book"></i>

            <p>My Notice Board</p>
            <span class="badge badge-danger right">!</span>
    </a>
</li> --}}
<li class="nav-item">
    <a href="{{ url('teacher/account') }}" class="nav-link @if(Request::segment (2)== 'account') active @endif">
    <i class="nav-icon far fa-user"></i>
          <p>
            My Account
         </p>
       </a>
    </li>



          <li class="nav-item">
            <a href="{{ url('teacher/change_password') }}" class="nav-link @if(Request::segment(2)=='change_password') active @endif">
              <i class="nav-icon far fa-user"></i>
              <p>
              Change Password
              </p>
            </a>
          </li>




        @elseif(Auth::user()->user_type==3)
        <li class="nav-item">
        <a href="{{ url('student/dashboard') }}" class="nav-link @if(Request::segment(2)=='student') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
        <a href="{{ url('student/my_subject') }}" class="nav-link @if(Request::segment (2)== 'my_subject') active @endif">
        <i class="nav-icon far fa-user"></i>
              <p>
                My Subject
             </p>
           </a>
        </li>
          <li class="nav-item">
        <a href="{{ url('student/my_grades') }}" class="nav-link @if(Request::segment(2)=='my_grades') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                My Grades
              </p>
            </a>
          </li>

          {{-- <li class="nav-item">
              <a href="{{ url('student/my_notice_board') }}" class="nav-link @if(Request::segment(2) == 'my_notice_board') active @endif">
                  <i class="nav-icon far fa-user"></i>
                  <p>
                      My Notice Board
                      <span class="badge badge-danger right">!</span>

                  </p>
              </a>
          </li> --}}


        <li class="nav-item">
       <a href="{{ url('student/fees_collection') }}" class="nav-link @if(Request::segment(2) == 'fees_collection') active @endif">
        <i class="nav-icon far fa-user"></i>
          <p>
              Fees Collection
                      </p>
                  </a>
               </li>


        <li class="nav-item">
        <a href="{{ url('student/account') }}" class="nav-link @if(Request::segment (2)== 'account') active @endif">
        <i class="nav-icon far fa-user"></i>
              <p>
                My Account
             </p>
           </a>
        </li>


          <li class="nav-item">
            <a href="{{ url('student/change_password') }}" class="nav-link @if(Request::segment(2)=='change_password') active @endif">
              <i class="nav-icon far fa-user"></i>
              <p>
              Change Password
              </p>
            </a>
          </li>




        @elseif(Auth::user()->user_type==4)
        <li class="nav-item">
        <a href="{{ url('parent/dashboard') }}" class="nav-link @if(Request::segment(2)=='parent') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard

              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="{{ url('parent/change_password') }}" class="nav-link @if(Request::segment(2)=='change_password') active @endif">
              <i class="nav-icon far fa-user"></i>
              <p>
              Change Password
              </p>
            </a>
          </li>

        @endif


          <li class="nav-item">
            <a href="{{ url('logout') }}" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                Logout
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

