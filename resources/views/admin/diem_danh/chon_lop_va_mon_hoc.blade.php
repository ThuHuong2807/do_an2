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
<div class="container-fluid">
<form action="{{ route('diem_danh.view_diem_danh_theo_lop_va_mon_hoc') }}" method = "get"> 
	{{csrf_field()}}
<br>
Select class
<select class="form-control" name="ma_lop">
	@foreach ($array_lop as $lop)
		<option value="{{$lop->ma_lop}}">
			{{$lop->ten_lop}}
		</option>
	@endforeach
</select>
<br>
Select subject
<select class="form-control" name="ma_mon_hoc">
	@foreach ($array_mon_hoc as $mon_hoc)
		<option value="{{$mon_hoc->ma_mon_hoc}}">
			{{$mon_hoc->ten_mon_hoc}}
		</option>
	@endforeach
</select>
<br>
<button>Select</button>
</form>
</div>
</div>
@endsection