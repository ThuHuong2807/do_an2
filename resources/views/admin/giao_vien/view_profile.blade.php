@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Teacher
                    <small>View proflie</small>
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

                <form>
               
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                       <div class="form-group">
                        <label>Full name</label>
                        <input class="form-control" name="ten_giao_vien" placeholder="Enter Teacher name" value="{{$giao_vien->ten_giao_vien}}" />
                    </div>
                    <div class="form-group">
                        <label>Date of birth</label>
                        <input class="form-control" name="ngay_sinh" type="date" placeholder="Please Enter Date of birth" value="{{$giao_vien->ngay_sinh}}" >
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <td>
                            <input type="radio" name="gioi_tinh" value="0" @if ($giao_vien->gioi_tinh==0) checked @endif>Male
                            <input type="radio" name="gioi_tinh" value="1" @if ($giao_vien->gioi_tinh==1) checked @endif>Female
                        </td>
                    </div>
                     <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="email" placeholder="Please Enter Email" value="{{$giao_vien->email}}" />
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" name="mat_khau" placeholder="Please Enter Password" value="{{$giao_vien->mat_khau}}" />
                    </div>
                     <div class="form-group">
                        <label>Phone number</label>
                        <input class="form-control" name="so_dien_thoai" placeholder="Please Enter Phone number" value="{{$giao_vien->so_dien_thoai}}" />
                    </div>
                
                     <div class="form-group">
                        <label>Address</label>
                       <input class="form-control" name="dia_chi" placeholder="Please Enter Address" value="{{$giao_vien->dia_chi}}" />
                    </div>
                    <br>
                    <button type="submit" class="btn btn-default">Edit </button>
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