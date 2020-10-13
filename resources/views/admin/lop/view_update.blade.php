@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Class
                	<small>Edit</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
              <div class="col-lg-7" style="padding-bottom:120px">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $err)
                            {{$err}}<br>
                        @endforeach
                    </div>
                @endif

                @if (session('thong_bao'))
                    <div class="alert alert-success">
                        {{session('thong_bao')}}
                    </div>
                @endif
                <form action="admin/lop/view_update/{{$lop->ma_lop}}" method="post">
               
                	<input type="hidden" name="_token" value="{{csrf_token()}}" />
                       <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="ten_lop" placeholder="Enter class name" value="{{$lop->ten_lop}}" />
                    </div>
                   
                    <button type="submit" class="btn btn-default">Edit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection