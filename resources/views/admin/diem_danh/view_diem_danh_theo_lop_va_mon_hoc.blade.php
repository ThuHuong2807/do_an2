@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Attendance
                <small>List</small>
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

 
    
        <!-- /.col-lg-12 -->
<form action="{{ route('diem_danh.view_diem_danh_theo_lop_va_mon_hoc') }}" method = "get"> 
	{{csrf_field()}}
<br>
Select class
<br>
<select class="form-control" name="ma_lop">
	@foreach ($array_lop as $lop)
		<option value="{{$lop->ma_lop}}"
				@if ($ma_lop==$lop->ma_lop)
					selected
				@endif>
			{{$lop->ten_lop}}
		</option>
	@endforeach
</select>
<br>
Select subject
<select class="form-control" name="ma_mon_hoc">
	@foreach ($array_mon_hoc as $mon_hoc)
		<option value="{{$mon_hoc->ma_mon_hoc}}"
			@if ($ma_mon_hoc==$mon_hoc->ma_mon_hoc)
					selected
				@endif>
			{{$mon_hoc->ten_mon_hoc}}
		</option>
	@endforeach
</select>
<br>
<button>Select</button>
</form>
<br>

<form action="{{ route('diem_danh.process_diem_danh') }}">
<input type="hidden" name="ma_mon_hoc" value = "{{$ma_mon_hoc}}">
<input type="hidden" name="ma_lop" value = "{{$ma_lop}}">

  <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr align="center">
	                <th>ID</th>
					<th>Full name</th>
					<th>School status</th>
                </tr>
            </thead>
            <tbody>
             @foreach ($array_sinh_vien as $sinh_vien)
		<tr>
			<td>
				{{$sinh_vien->ma_sinh_vien}}
			</td>
			<td>
				{{$sinh_vien->ten_sinh_vien}}
			</td>
			<td>
				<select name="array_diem_danh[{{$sinh_vien->ma_sinh_vien}}]">
					<option value="1" @if ($array_diem_danh[$sinh_vien->ma_sinh_vien] == 1) selected @endif>
						joined
					</option>
					<option value="2" @if ($array_diem_danh[$sinh_vien->ma_sinh_vien] == 2) selected @endif>
						Absent
					</option>
					<option value="3" @if ($array_diem_danh[$sinh_vien->ma_sinh_vien] == 3) selected @endif>
						Permitted
					</option>
					<option value="4" @if ($array_diem_danh[$sinh_vien->ma_sinh_vien] == 4) selected @endif>
						Unpermitted
					</option>
				</select>
			</td>
		</tr>
	@endforeach
            </tbody>
        </table>
<button>
	Submit
</button>
<br>
<br>
<h1 id="count">The number of students:</h1>
<br>
	<h1 class="abc">Joined: {{count($sv_di_hoc)}}</h1>

	<h1 class="abc">Absent: {{count($sv_nghi_hoc)}}</h1>

	<h1 class="abc">Permitted: {{count($sv_di_muon)}}</h1>

	<h1 class="abc">Unpermitted: {{count($sv_co_phep)}}</h1>
		<br>
		<br>
		<br>
		<br>

   	 	</div>
   	<!-- /.row -->
	</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection

<style type="text/css">
	.abc {
            color: blue;
            font-size: 23px;
          }
    #count{
    	color: red;
    	font-size: 25px
    }
</style>
