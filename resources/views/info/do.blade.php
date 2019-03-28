@extends('layout')
@section('title')
	Search DO
@endsection
@section('header')
	Search DO
@endsection
@section('content')
	<form class="form-horizontal" method="get" id="search">
	 	<div class="input-group">
		  <input type="text" name="q" class="form-control" placeholder="Search DO..." value="{{ Request::input('q') }}" required>
		  <span class="input-group-btn">
		    <button type="submit" class="btn">Search!</button>
		  </span>
		</div>
	</form>
	<br/>
	@if(isset($data))
		<div class="row m-b-1">
			<div class="col-md-4 text-center">nomor_do : <span class="label label-info">{{ $data->nomor_do }}</span></div>
			<div class="col-md-4 text-center">tgl_terima : <span class="label label-warning">{{ $data->tgl_terima }}</span></div>
			<div class="col-md-4 text-center">penerima_nama : <span class="label label-info">{{ $data->penerima_nama }}</span></div>
		</div>
		<div class="table-responsive">
		  <table class="table table-bordered">
		    <thead>
		      <tr>
		        <th>SN</th>
		        <th>jenis_nte</th>
		        <th>merk</th>
		        <th>model</th>
		      </tr>
		    </thead>
		    <tbody>
		    	@foreach($nte as $no => $nt)
		      <tr>
		        <td>{{ $nt->sn }}</td>
		        <td>{{ $nt->jenis_nte }}</td>
		        <td>{{ $nt->merk }}</td>
		        <td>{{ $nt->model }}</td>
		      </tr>
		      @endforeach
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