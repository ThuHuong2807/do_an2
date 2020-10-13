@extends('admin.layout.index') 

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Students
                <small>Add</small>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
        <form method = "post" enctype="multipart/form-data" action="{{ url('admin/sinh_vien/import') }}">
            {{csrf_field()}}
               <div class="form-group">
                    <table>
                        <tr>
                            <td with="40%" align="right"><lable>Select file for upload</lable></td>
                            <td with="30">
                                <input type="file" name="select_file">
                            </td>
                            <td with="30%" align="left">
                                <input type="submit" name="upload" class="btn btn-primary" value="Upload">
                            </td>
                        </tr>
                        <tr>
                            <td with="40%" align="right"></td>
                            <td with="30"><span class="text-muted">.xls,xslx
                            </span></td>
                            <td with="30" align="left"></td>
                        </tr>
                    </table>
                </div>
        </form>


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
            
            <form action="admin/sinh_vien/view_insert" method="POST">
            	<input type="hidden" name="_token" value="{{csrf_token()}}" />
                   <div class="form-group">
                    <label>Name student</label>
                    <input class="form-control" name="ten_sinh_vien" placeholder="Please Enter Student name" />
                </div>
                <div class="form-group">
                    <label>Date of birth</label>
                    <input class="form-control" name="ngay_sinh" type="date" placeholder="Please Enter Date of birth" >
                </div>
                <div class="form-group">
                    <label>Gender</label>
                     <td>
                        <input type="radio" name="gioi_tinh" value="0" checked="checked">Male
                         <input type="radio" name="gioi_tinh" value="1">Female
                     </td>
                </div>
                 <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" name="email" placeholder="Please Enter Email" />
                </div>
                 <div class="form-group">
                    <label>Phone number</label>
                    <input class="form-control" name="so_dien_thoai" placeholder="Please Enter Phone number" />
                </div>
                 <div class="form-group">
                    <label>Class</label>
                    <label>
                        <select name="ma_lop">
                             <?php foreach ($array_lop as $lop): ?>
                                 <option value="{{$lop->ma_lop}}">
                                     {{$lop->ten_lop}}
                                 </option>
                            <?php endforeach ?>
                         </select>
                    </label>  
                    </div>           
                 <div class="form-group">
                    <label>Address</label>
                   <input class="form-control" name="dia_chi" placeholder="Please Enter Address" />
                <br>
                <button type="submit" class="btn btn-default">Add</button>
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