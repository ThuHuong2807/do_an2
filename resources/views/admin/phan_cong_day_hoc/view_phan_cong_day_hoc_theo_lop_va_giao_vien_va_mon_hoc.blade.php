@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Assignment of teaching
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



	<table class="table table-striped table-bordered table-hover" id="dataTables-example">
		 <thead>
			<tr>
				<th>Teacher</th>
				<th>Subject</th>
				<th>Class</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($phan_cong_day_hoc as $phan_cong)
				<tr>
					<td>
						{{$phan_cong->ten_giao_vien}}
					</td>
					<td>
						{{$phan_cong->ten_mon_hoc}}
					</td>
					<td>
						{{$phan_cong->ten_lop}}
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
@endsection