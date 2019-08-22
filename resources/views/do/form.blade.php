@extends('layout')
@section('title')
	DO
@endsection
@section('header')
	<a href="/do"><button type="button" class="btn btn-primary btn-outline"><span class="btn-label-icon left fa fa-arrow-left"></span>Kembali</button></a> Input DO
@endsection
@section('css')
	<style type="text/css">
		.no-search .select2-search {
		    display:none
		}
	</style>
@endsection
@section('content')
	<form class="form-horizontal" method="post" id="do-form" enctype="multipart/form-data">
	  <div class="form-group form-message-dark">
	    <label for="nomor_do" class="col-md-3 control-label">nomor do</label>
	    <div class="col-md-9">
	      <input type="text" name="nomor_do" class="form-control" id="nomor_do" placeholder="nomor_do" value="{{ isset($data->nomor_do) ? $data->nomor_do : ''}}" required>
	    </div>
	  </div>
	  <div class="form-group form-message-dark">
	    <label for="tgl_terima" class="col-md-3 control-label">Tgl DO</label>
	    <div class="col-md-9">
	      <input type="text" name="tgl_terima" class="form-control" id="tgl_terima" placeholder="tgl_terima" value="{{ isset($data->tgl_terima) ? $data->tgl_terima : ''}}" required>
	    </div>
	  </div>
	  <div class="form-group form-message-dark">
	    <label for="file_sn" class="col-md-3 control-label">File SN</label>
	    <div class="col-md-9">
	      <input type="file" name="file_sn" class="form-control" id="file_sn" placeholder="file_sn" value="{{ isset($data->file_sn) ? $data->file_sn : '' }}" required>
	    </div>
	  </div>
	  <div class="form-group form-message-dark">
	    <label for="surat_jalan" class="col-md-3 control-label">Surat Jalan</label>
	    <div class="col-md-9">
	      <input type="file" name="surat_jalan" class="form-control" id="surat_jalan" placeholder="surat_jalan" required>
	    </div>
	    @if(isset($data->surat_jalan))
	    	<a href="/upload/surat_jalan/{{ $data->surat_jalan }}">Download</a>
	    @endif
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
	    	@foreach($sn as $nte)
	      <tr>
	        <td>1</td>
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
    $('#tgl_terima').datepicker({
    	format: 'yyyy-mm-dd'
    });
	});
</script>
@endsection