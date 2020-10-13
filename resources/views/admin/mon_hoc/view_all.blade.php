@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Subject
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
                </tr>
            </thead>
            <tbody>
                @foreach ($mon_hoc as $mon_hoc)
                    {{-- expr --}}
                <tr class="odd gradeX" align="center">
                    <td>{{$mon_hoc->ma_mon_hoc}}</td>
                    <td>{{$mon_hoc->ten_mon_hoc}}</td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/mon_hoc/view_update/{{$mon_hoc->ma_mon_hoc}}">Edit</a></td>

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


