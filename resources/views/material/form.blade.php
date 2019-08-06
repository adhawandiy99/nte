@extends('layout')
@section('title')
	Order
@endsection
@section('header')
	<a href="/order"><button type="button" class="btn btn-primary btn-outline"><span class="btn-label-icon left fa fa-arrow-left"></span>Kembali</button></a> Order
@endsection
@section('css')
	<style type="text/css">
		.no-search .select2-search {
		    display:none
		}
	</style>
@endsection
@section('content')
	<form class="form-horizontal" method="post">
	  <div class="form-group form-group-lg">
	    <label for="Nama_Material" class="col-md-3 control-label">Nama_Material</label>
	    <div class="col-md-9">
	      <input type="text" name="Nama_Material" class="form-control" id="Nama_Material" placeholder="Nama_Material" value="{{ isset($data->Nama_Material) ? $data->Nama_Material : '' }}">
	    </div>
	  </div>
	  <div class="form-group form-group-lg">
	    <label for="Satuan" class="col-md-3 control-label">Satuan</label>
	    <div class="col-md-9">
	      <input type="text" name="Satuan" class="form-control" id="Satuan" placeholder="Satuan" value="{{ isset($data->Satuan) ? $data->Satuan : '' }}">
	    </div>
	  </div>
	  <div class="form-group form-group-lg">
	    <label for="Deskripsi" class="col-md-3 control-label">Deskripsi</label>
	    <div class="col-md-9">
	      <textarea name="Deskripsi" class="form-control" id="Deskripsi" placeholder="Deskripsi">{{ isset($data->Deskripsi) ? $data->Deskripsi : '' }}</textarea>
	    </div>
	  </div>
    <div class="form-group">
	    <div class="col-md-offset-3 col-md-9">
	      <button type="submit" class="btn"><span class="btn-label-icon left fa fa-database"></span>Simpan</button>
	    </div>
	  </div>
	</form>

    
	</form>
@endsection
@section('js')
<script type="text/javascript">
  $(function() {
	});
	
</script>
@endsection