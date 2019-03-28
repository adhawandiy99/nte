@extends('layout')
@section('title')
	Out
@endsection
@section('header')
	<a href="/out"><button type="button" class="btn btn-primary btn-outline"><span class="btn-label-icon left fa fa-arrow-left"></span>Kembali</button></a> Input pengeluaran
@endsection
@section('css')
	<style type="text/css">
		.no-search .select2-search {
		    display:none
		}
	</style>
@endsection
@section('content')
	<form class="form-horizontal" method="post" id="do-form" enctype="multipart/form-data" autocomplete="off">
	  <div class="form-group form-message-dark">
	    <label for="tujuan" class="col-md-3 control-label">Tujuan</label>
	    <div class="col-md-9">
	      <input type="text" name="tujuan" class="form-control" id="tujuan" placeholder="tujuan" value="{{ isset($data->tujuan) ? $data->tujuan : ''}}" required>
	    </div>
	  </div>
	  <div class="form-group form-message-dark">
	    <label for="tgl_keluar" class="col-md-3 control-label">Tgl Keluar</label>
	    <div class="col-md-9">
	      <input type="text" name="tgl_keluar" class="form-control" id="tgl_keluar" placeholder="tgl_keluar" value="{{ isset($data->tgl_keluar) ? $data->tgl_keluar : ''}}" required>
	    </div>
	  </div>
	  <div class="form-group form-message-dark">
	    <label for="file_sn_out" class="col-md-3 control-label">File SN</label>
	    <div class="col-md-9">
	      <input type="file" name="file_sn_out" class="form-control" id="file_sn_out" placeholder="file_sn_out" value="{{ isset($data->file_sn_out) ? $data->file_sn_out : '' }}" required>
	    </div>
	  </div>
    <div class="form-group">
	    <div class="col-md-offset-3 col-md-9">
	      <button type="submit" class="btn"><span class="btn-label-icon left fa fa-database"></span>Submit</button>
	    </div>
	  </div>
	</form>
	@if(count($sn))
	<div class="table-primary">
	  <div class="table-header">
	    <div class="table-caption">
	      Primary Table
	    </div>
	  </div>
	  <table class="table table-bordered">
	    <thead>
	      <tr>
	        <th>#</th>
	        <th>SN</th>
	        <th>Jenis NTE</th>
	        <th>Merk</th>
	        <th>Model</th>
	      </tr>
	    </thead>
	    <tbody>
	    	@foreach($sn as $no => $nte)
	      <tr>
	        <td>{{ ++$no }}</td>
	        <td>{{ $nte->sn }}</td>
	        <td>{{ $nte->jenis_nte }}</td>
	        <td>{{ $nte->merk }}</td>
	        <td>{{ $nte->model }}</td>
	      </tr>
	      @endforeach
	    </tbody>
	  </table>
	  <div class="table-footer">
	    Footer
	  </div>
	</div>
	@endif
@endsection
@section('js')
<script type="text/javascript">
  $(function() {
    $('#do-form').pxValidate();
    $('#tgl_keluar').datepicker({
    	format: 'yyyy-mm-dd'
    });
	});
</script>
@endsection