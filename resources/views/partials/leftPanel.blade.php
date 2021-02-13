<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ isset(Auth::user()->name) ? Auth::user()->name : 'Tej'}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <!--li class="header">MAIN NAVIGATION</li-->
            <li class="active treeview menu-open">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul  class="treeview-menu">
                    <li class="active"><a href="{!! url('/home') !!}"><i class="fa fa-circle-o"></i>Home</a></li>
                </ul>
            </li>
        
            @can('user-list')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>User Management</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    <span class="label label-primary pull-right">3</span>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('users.index') }}"><i class="fa fa-circle-o"></i>Manage Users</a></li>
                    @can('role-list')
                    <li><a href="{{ route('roles.index') }}"><i class="fa fa-circle-o"></i>Manage Role</a></li>
                    @endcan
                    @can('permission-list')
                    <li><a href="{{ route('permissions.index') }}"><i class="fa fa-circle-o"></i>Manage Permissions</a></li>
                    @endcan
                </ul>
            </li>
            @endcan
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-share"></i> <span>Masters</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                @can('countryState-list')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Address / AY</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              <span class="label label-primary pull-right">4</span>
            </span>
                </a>
                <ul class="treeview-menu">
                    @can('Acyear-list')
                    <li><a href="{{ route('academicyears.index') }}"><i class="fa fa-circle-o"></i>Academic Year</a></li>
                    @endcan
                    <li><a href="{{ route('countries.index') }}"><i class="fa fa-circle-o"></i>Manage Countries</a></li>
                    <li><a href="{{ route('states.index') }}"><i class="fa fa-circle-o"></i>Manage States</a></li>
                    <li><a href="{{ route('districts.index') }}"><i class="fa fa-circle-o"></i>Manage District</a></li>
                    <li><a href="{{ route('blocks.index') }}"><i class="fa fa-circle-o"></i>Manage Block</a></li>
                </ul>
            </li>
            @endcan
            @can('baseforms-list')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>HO Manpower</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              <span class="label label-primary pull-right">6</span>
            </span>
                </a>
                <ul class="treeview-menu">
                    @can('projectmanager-list')   
                        <li><a href="{{ route('projectmanagers.index') }}"><i class="fa fa-circle-o"></i>ProjectManagers</a></li>
                    @endcan

                    @can('projectofficer-list')   
                        <li><a href="{{ route('projectofficers.index') }}"><i class="fa fa-circle-o"></i>Project Officers</a></li>
                    @endcan
                    @can('territoryofficer-list')   
                        <li><a href="{{ route('territoryofficers.index') }}"><i class="fa fa-circle-o"></i>Territory Officers</a></li>
                    @endcan
                    <!-- @can('poc-list')   
                        <li><a href="{{ route('pocs.index') }}"><i class="fa fa-circle-o"></i>POC</a></li>
                    @endcan -->
                    
                </ul>
            </li>
            @endcan
            @can('donor-list')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>Donor</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    <span class="label label-primary pull-right">3</span>
            </span>
                </a>
                <ul class="treeview-menu">
                    @can('donor-list')
                    <li><a href="{{ route('donors.index') }}"><i class="fa fa-circle-o"></i>Donors</a></li>
                    @endcan
                    @can('donorProject-list')
                    <li><a href="{{ route('donorprojects.index') }}"><i class="fa fa-circle-o"></i>Donor Projects</a></li>
                    @endcan
                    @can('donationduration-list')
                    <li><a href="{{ route('donationdurations.index') }}"><i class="fa fa-circle-o"></i>Donation Duration</a></li>
                    @endcan
                    @can('donationfreq-list')
                    <li><a href="{{ route('donationfrequencies.index') }}"><i class="fa fa-circle-o"></i>Donation Frequency</a></li>
                    @endcan
                    @can('donortype-list')
                    <li><a href="{{ route('donortypes.index') }}"><i class="fa fa-circle-o"></i>Donor Type</a></li>
                    @endcan
                    @can('donationtype-list')   
                        <li><a href="{{ route('donationtypes.index') }}"><i class="fa fa-circle-o"></i>Donation Type</a></li>
                    @endcan
                </ul>
            </li>
            @endcan
            @can('pngo-list')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-share"></i>
                    <span>Pngo</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        <span class="label label-primary pull-right">3</span>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('pngo-list')
                    <li><a href="{{ route('pngos.index') }}"><i class="fa fa-circle-o"></i>Pngo</a></li>
                    @endcan
                    @can('pngotype-list')
                    <li><a href="{{ route('pngotypes.index') }}"><i class="fa fa-circle-o"></i>Pngo Type</a></li>
                    @endcan
                    @can('pngoproject-list')
                    <li><a href="{{ route('pngoprojects.index') }}"><i class="fa fa-circle-o"></i>Pngo Projects</a></li>
                    @endcan
                   
                </ul>
            </li>
            @endcan
            @can('student-list')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-th"></i>
                    <span>Student</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    <span class="label label-primary pull-right">3</span>
            </span>
                </a>
                <ul class="treeview-menu">
                    @can('student-list')
                    <li><a href="{{ route('students.index') }}"><i class="fa fa-circle-o"></i>Students</a></li>
                    @endcan
                    @can('leavereason-list')   
                        <li><a href="{{ route('leavereasons.index') }}"><i class="fa fa-circle-o"></i>LeaveReasons </a></li>
                    @endcan
                    @can('studentattendance-list')
                    <li><a href="{{ route('studentattendances.index') }}"><i class="fa fa-circle-o"></i>Student Attendance</a></li>
                    @endcan
                   
                </ul>
            </li>
            @endcan
            @can('teacher-list')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-share"></i>
                    <span>Teachers</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    <span class="label label-primary pull-right">3</span>
            </span>
                </a>
                <ul class="treeview-menu">
                    @can('teacher-list')
                    <li><a href="{{ route('teachers.index') }}"><i class="fa fa-circle-o"></i>Teachers</a></li>
                    @endcan
                    @can('teacherattendance-list')
                    <li><a href="{{ route('teacherattendances.index') }}"><i class="fa fa-circle-o"></i>Teacher Attendance</a></li>
                    @endcan
                    @can('teacherscore-list')
                    <li><a href="{{ route('teacherscores.index') }}"><i class="fa fa-circle-o"></i>Teacher Score</a></li>
                    @endcan
                   
                </ul>
            </li>
            @endcan
            @can('lc-list')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-th"></i>
                    <span>Learning Centers</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    <span class="label label-primary pull-right">3</span>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('lc-list')
                    <li><a href="{{ route('lcs.index') }}"><i class="fa fa-circle-o"></i>Learning Centers</a></li>
                    @endcan
                    @can('facility-list')   
                        <li><a href="{{ route('facilities.index') }}"><i class="fa fa-circle-o"></i>Facilities</a></li>
                    @endcan
                   
                </ul>
            </li>
            @endcan
         
                </ul>
            </li>
            <!---------->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pencil-square-o"></i> <span>Field Input</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
               
           
            @can('student-list')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-th"></i>
                    <span>Student</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    <span class="label label-primary pull-right">3</span>
            </span>
                </a>
                <ul class="treeview-menu">
                    <!-- @can('student-list')
                    <li><a href="{{ route('students.index') }}"><i class="fa fa-circle-o"></i>Students</a></li>
                    @endcan -->
                  
                    @can('studentattendance-list')
                    <li><a href="{{ route('studentattendances.index') }}"><i class="fa fa-circle-o"></i>Student Attendance</a></li>
                    @endcan
                   
                </ul>
            </li>
            @endcan
            @can('teacher-list')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-share"></i>
                    <span>Teachers</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    <span class="label label-primary pull-right">3</span>
            </span>
                </a>
                <ul class="treeview-menu">
                    @can('teacherattendance-list')
                    <li><a href="{{ route('teacherattendances.index') }}"><i class="fa fa-circle-o"></i>Teacher Attendance</a></li>
                    @endcan
                    @can('teacherscore-list')
                    <li><a href="{{ route('teacherscores.index') }}"><i class="fa fa-circle-o"></i>Teacher Score</a></li>
                    @endcan
                   
                </ul>
            </li>
            @endcan
            @can('lc-list')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-th"></i>
                    <span>Learning Centers</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    <span class="label label-primary pull-right">3</span>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('lc-list')
                    <li><a href="{{ route('lcs.index') }}"><i class="fa fa-circle-o"></i>Learning Centers</a></li>
                    @endcan
                    @can('facility-list')   
                        <li><a href="{{ route('facilities.index') }}"><i class="fa fa-circle-o"></i>Facilities</a></li>
                    @endcan
                  
                </ul>
            </li>
            @endcan
          
                </ul>
            </li>
            @can('lcticket-list')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-ticket"></i>
                    <span>Tickets</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    <span class="label label-primary pull-right">3</span>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('lcticket-list')   
                        <li><a href="{{ route('lctickets.index') }}"><i class="fa fa-circle-o"></i>Tickets</a></li>
                    @endcan
                    @can('lcticketcategory-list')   
                        <li><a href="{{ route('lcticketcategories.index') }}"><i class="fa fa-circle-o"></i>LcTicket Category</a></li>
                    @endcan
                    @can('ticketcomment-list')   
                        <li><a href="{{ route('ticketcomments.index') }}"><i class="fa fa-circle-o"></i>Ticket Comments</a></li>
                    @endcan
                    <!-- @can('commentcategory-list')   
                        <li><a href="{{ route('commentcategories.index') }}"><i class="fa fa-circle-o"></i>Comments Category</a></li>
                    @endcan -->
                </ul>
            </li>
            @endcan
           
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-file-text-o"></i>
                    <span>Reports</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    <span class="label label-primary pull-right">3</span>
                    </span>
                </a>
                <ul class="treeview-menu">
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-th"></i>
                                <span>LC Month Ops</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                    <span class="label label-primary pull-right">3</span>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="#"><i class="fa fa-circle-o"></i>R-CSC</a></li>
                                <li><a href="#"><i class="fa fa-circle-o"></i>R-CSCTime</a></li>
                                <li><a href="#"><i class="fa fa-circle-o"></i>R-Overall</a></li>
                                <li><a href="#"><i class="fa fa-circle-o"></i>R-Project</a></li>
                                <li><a href="#"><i class="fa fa-circle-o"></i>R-PM</a></li>
                                <li><a href="#"><i class="fa fa-circle-o"></i>R-QTA</a></li>
                                <li><a href="#"><i class="fa fa-circle-o"></i>R-Average</a></li>
                            </ul>
                        </li>  
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-th"></i>
                                <span>Teacher Report</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                    <span class="label label-primary pull-right">1</span>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="#"><i class="fa fa-circle-o"></i>QTA</a></li>
                            </ul>
                        </li> 
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-th"></i>
                                <span>Acad-Initiative</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                    <span class="label label-primary pull-right">3</span>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="#"><i class="fa fa-circle-o"></i>Facility Report</a></li>
                            </ul>
                        </li> 
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-rupee"></i>
                    <span>Budgets</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    <span class="label label-primary pull-right">3</span>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i>Budgets</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i>FUC</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i>Variance Analysis</a></li>
                </ul>
            </li>
        </ul>
        
    </section>
    <!-- /.sidebar -->
</aside>