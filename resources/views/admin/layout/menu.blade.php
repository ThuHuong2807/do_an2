<div class="navbar-default sidebar" role="navigation">
<div class="sidebar-nav navbar-collapse">
<ul class="nav" id="side-menu">
    <li class="sidebar-search">
        <div class="input-group custom-search-form">
            <input type="text" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
                <button class="btn btn-default" type="button">
                    <i class="fa fa-search"></i>
                </button>
            </span>
        </div>
        <!-- /input-group -->
    </li>
      @if (Session::has('ma_giao_vien'))
   <li>
        <a href="admin/diem_danh/chon_lop_va_mon_hoc"><i class="fa fa-cube fa-fw"></i>Attendance<span class="fa arrow"></span></a>
        <!-- /.nav-second-level -->
    </li>
   @endif
        @if (Session::has('ma_giao_vu'))

          <li>
            <a href="#"><i class="fa fa-cube fa-fw"></i>Class management<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="admin/lop/view_all">List </a>
                </li>
                <li>
                    <a href="admin/lop/view_insert">Add </a>
                </li>

            </ul>
            <!-- /.nav-second-level -->
        </li>


        <li>
            <a href="#"><i class="fa fa-cube fa-fw"></i>Academic management<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="admin/giao_vu/view_all">List</a>
                </li>
                <li>
                    <a href="admin/giao_vu/view_insert">Add</a>
                </li>

            </ul>
            <!-- /.nav-second-level -->
        </li>

          <li>
        <a href="#"><i class="fa fa-cube fa-fw"></i>Subject management<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="admin/mon_hoc/view_all">List</a>
            </li>
            <li>
                <a href="admin/mon_hoc/view_insert">Add </a>
            </li>

        </ul>
        <!-- /.nav-second-level -->
    </li>

         <li>
        <a href="#"><i class="fa fa-cube fa-fw"></i>Student management<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="admin/sinh_vien/view_all">List </a>
            </li>
            <li>
                <a href="admin/sinh_vien/view_insert">Add </a>
            </li>

        </ul>
        <!-- /.nav-second-level -->
    </li>
    

     
    {{-- @endif --}}
    @endif
   <li>
        <a href=""><i class="fa fa-cube fa-fw"></i>Teacher management<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="admin/giao_vien/view_all">List</a>
            </li>
            @if (Session::has('ma_giao_vu'))
              <li>
                <a href="admin/giao_vien/view_insert">Add</a>
            </li>
            @endif
        </ul>
        <!-- /.nav-second-level -->
    </li>
        @if (Session::has('ma_giao_vu'))
    <li>
        <a href="admin/phan_cong_day_hoc/chon_lop_va_mon_hoc_va_giao_vien"><i class="fa fa-cube fa-fw"></i> Assignment of teaching<span class="fa arrow"></span></a>
        <!-- /.nav-second-level -->
    </li>

      <li>
        <a href=""><i class="fa fa-cube fa-fw"></i>View assignment schedule<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="admin/giao_vu/view_phan_cong_theo_giao_vien">View by teacher</a>
            </li>
            <li>
                <a href="admin/giao_vu/view_phan_cong_theo_lop">View by class</a>
            </li>
        </ul>
        <!-- /.nav-second-level -->
    </li>
    {{-- <li>
        <a href="admin/giao_vu/view_phan_cong_theo_lop_va_giao_vien"><i class="fa fa-cube fa-fw"></i>View assignment schedule<span class="fa arrow"></span></a>
        <!-- /.nav-second-level -->
    </li> --}}

    @endif

      @if (Session::has('ma_giao_vien'))
      <li>
        <a href="admin/giao_vien/view_lich_day"><i class="fa fa-cube fa-fw"></i>View teaching schedule<span class="fa arrow"></span></a>
        <!-- /.nav-second-level -->
    </li>
    

    @endif
</ul>
</div>
<!-- /.sidebar-collapse -->
</div>