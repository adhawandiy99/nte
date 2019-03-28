@extends('layout')
@section('title')
	Search Item
@endsection
@section('header')
	Search Item
@endsection
@section('content')
	<form class="form-horizontal" method="get" id="search">
	 	<div class="input-group">
		  <input type="text" name="q" class="form-control" placeholder="Search for..." value="{{ Request::input('q') }}" required>
		  <span class="input-group-btn">
		    <button type="submit" class="btn">Search!</button>
		  </span>
		</div>
	</form>
	<br/>
	@if(isset($data))
		<div class="table-responsive">
		  <table class="table table-bordered">
		    <thead>
		      <tr>
		        <th>SN</th>
		        <th>jenis_nte</th>
		        <th>merk</th>
		        <th>model</th>
		        <th>TglDO</th>
		        <th>TglKeluar</th>
		        <th>Status</th>
		      </tr>
		    </thead>
		    <tbody>
		      <tr>
		        <td>{{ $data->sn }}</td>
		        <td>{{ $data->jenis_nte }}</td>
		        <td>{{ $data->merk }}</td>
		        <td>{{ $data->model }}</td>
		        <td>{{ @$data->tgl_terima }}</td>
		        <td>{{ @$data->tgl_keluar }}</td>
		        <td>{{ $data->status }}</td>
		      </tr>
		    </tbody>
		  </table>
		</div>
	@elseif(Request::input('q'))
		Not Found .....!
	@endif
@endsection
@section('js')
	<script type="text/javascript">
		$(function(){
			$('#search').pxValidate();
		});
	</script>
@endsection