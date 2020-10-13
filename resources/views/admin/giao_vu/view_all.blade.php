@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Academic staff
                <small>List</small>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Full name</th>
                    <th>Date of birth</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Phone number</th>
                    <th>Address</th>
                      @if(Session::has('ma_giao_vien'))
                        <th>Edit</th>
                    @endif

                </tr>
            </thead>
            <tbody>
                @foreach ($giao_vu as $giao_vu)
                    {{-- expr --}}
                <tr class="odd gradeX" align="center">
                    <td>{{$giao_vu->ma_giao_vu}}</td>
                    <td>{{$giao_vu->ten_giao_vu}}</td>
                    <td>{{$giao_vu->ngay_sinh}}</td>
                    <td>
                        @if ($giao_vu->gioi_tinh==0)
      							  Male
    					@else
   							     Female
  					    @endif
                    </td>
                    <td>{{$giao_vu->email}}</td>
                    <td>{{$giao_vu->so_dien_thoai}}</td>
                    <td>{{$giao_vu->dia_chi}}</td>
                     @if(Session::has('ma_giao_vien'))
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/giao_vu/view_update/{{$giao_vu->ma_giao_vu}}">Edit</a></td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection


