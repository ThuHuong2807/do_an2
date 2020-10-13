@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">View teaching schedule
                <small>List</small>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
		<tr>
			<th>Class</th>
			<th>Subject</th>
		</tr>
	</thead>
	<tbody>
	@foreach ($array_lich_day as $phan_cong)
		<tr>
			<td>
				{{$phan_cong->ten_lop}}
			</td>
			<td>
				{{$phan_cong->ten_mon_hoc}}
			</td>
		</tr>
	@endforeach
</table>
</tbody>
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
