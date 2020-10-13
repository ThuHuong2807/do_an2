@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Teacher
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
                    @if(Session::has('ma_giao_vu'))
                        <th>Edit</th>
                    @endif

                </tr>
            </thead>
            <tbody>

                @foreach ($giao_vien as $giao_vien)

                    {{-- expr --}}
                <tr class="odd gradeX" align="center">

                    <td>{{$giao_vien->ma_giao_vien}}</td>
                    <td>{{$giao_vien->ten_giao_vien}}</td>
                    <td>{{$giao_vien->ngay_sinh}}</td>
                    <td>
                        @if ($giao_vien->gioi_tinh==0)
      							  Male
    					@else
   							     Female
  					    @endif
                    </td>
                     <td>{{$giao_vien->email}}</td>
                     <td>{{$giao_vien->so_dien_thoai}}</td>
                      <td>{{$giao_vien->dia_chi}}</td>
                    @if(Session::has('ma_giao_vu'))
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/giao_vien/view_update/{{$giao_vien->ma_giao_vien}}">Edit</a></td>
                    {{-- @php
                        print_r(session('ma_giao_vu'));
                    @endphp --}}
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


