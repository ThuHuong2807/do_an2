@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Students
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
                    <th>Class</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sinh_vien as $sv)
                    {{-- expr --}}
                <tr class="odd gradeX" align="center">
                    <td>{{$sv->ma_sinh_vien}}</td>
                    <td>{{$sv->ten_sinh_vien}}</td>
                    <td>{{$sv->ngay_sinh}}</td>
                    <td>
                        @if ($sv->gioi_tinh==0)
                            Male
                        @else
                            Female
                        @endif
                    </td>
                    <td>{{$sv->email}}</td>
                    <td>{{$sv->so_dien_thoai}}</td>
                    <td>{{$sv->dia_chi}}</td>
                    <td>{{$sv->ten_lop}}</td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/sinh_vien/view_update/{{$sv->ma_sinh_vien}}">Edit</a></td>
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


