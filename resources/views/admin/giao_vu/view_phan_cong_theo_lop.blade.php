@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Assignment of teaching
                <small>View assignment schedule</small>
            </h1>
        </div>


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
<form action="admin/giao_vu/view_phan_cong_theo_lop" method = "get"> 
    {{csrf_field()}}
<br>
    Select class
        <select class="form-control" name="ma_lop">
            @foreach ($array_lop as $lop)
                <option value="{{$lop->ma_lop}}"
                    @if ($ma_lop == $lop->ma_lop)
                        selected="" 
                    @endif
                >
                    {{$lop->ten_lop}}
                </option>
            @endforeach
        </select>
        <br>
  <button>Select</button>
</form>
<br>
<br>
     <table class="table table-striped table-bordered table-hover" id="dataTables-example">
         <thead>
            <tr>
                <th>Subject</th>
                <th>Teacher</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($array as $phan_cong)
                <tr>
                    <td>
                        {{$phan_cong->ten_mon_hoc}}
                    </td>
                    <td>
                        {{$phan_cong->ten_giao_vien}}
                    </td>
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

