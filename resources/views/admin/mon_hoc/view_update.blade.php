@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Subject
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
                <form action="admin/mon_hoc/view_update/{{$mon_hoc->ma_mon_hoc}}" method="post">
               
                	<input type="hidden" name="_token" value="{{csrf_token()}}" />
                       <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="ten_mon_hoc" placeholder="Enter class name" value="{{$mon_hoc->ten_mon_hoc}}" />
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