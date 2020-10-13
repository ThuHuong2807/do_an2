@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">
<div class="container-fluid">
       <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Academic staff
                <small>Add</small>
            </h1>
        </div>
        <!-- /.col-lg-12 -->

	{{--  <form method = "post" enctype="multipart/form-data" action="{{ url('admin/phan_cong_day_hoc/import') }}">
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
        </form> --}}


<form action="{{ route('phan_cong_day_hoc.process_phan_cong_day_hoc') }}" method = "get"> 
	{{csrf_field()}}
	<br>
Select teacher
<select class="form-control"  name="ma_giao_vien">
	@foreach ($array_giao_vien as $giao_vien)
		<option value="{{$giao_vien->ma_giao_vien}}">
			{{$giao_vien->ten_giao_vien}}
		</option>
	@endforeach
</select>
<br>
Select class
<select class="form-control"  name="ma_lop">
    @foreach ($array_lop as $lop)
        <option value="{{ $lop->ma_lop }}">
            {{ $lop->ten_lop }}
        </option>
    @endforeach
</select>
<br>
Select subject
<select class="form-control"  name="ma_mon_hoc">
	@foreach ($array_mon_hoc as $mon_hoc)
		<option value="{{$mon_hoc->ma_mon_hoc}}">
			{{$mon_hoc->ten_mon_hoc}}
		</option>
	@endforeach
</select>
<br>
<input type="submit" name="" value="submit">
</form>
</div>
</div>
</div>
@endsection
