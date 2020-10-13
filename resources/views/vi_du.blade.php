<form action="{{ route('vi_du_post') }}" method='post'>
	{{ csrf_field() }}
	<select multiple name="array_lop[]">
		@foreach ($array_lop as $lop)
			<option value="{{ $lop->ma_lop }}">
				{{ $lop->ten_lop }}
			</option>
		@endforeach
	</select>
	<button>OK</button>
</form>
