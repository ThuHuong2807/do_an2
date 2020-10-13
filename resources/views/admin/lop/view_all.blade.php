@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Class
                <small>List</small>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Edit</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lop as $lop)
                    {{-- expr --}}
                <tr class="odd gradeX" align="center">
                    <td>{{$lop->ma_lop}}</td>
                    <td>{{$lop->ten_lop}}</td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/lop/view_update/{{$lop->ma_lop}}">Edit</a></td>
                   <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/lop/view_details/{{ $lop->ma_lop }}">Details</a></td>

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


