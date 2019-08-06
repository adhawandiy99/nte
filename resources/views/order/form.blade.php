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
	    <label for="No_Tiket" class="col-md-3 control-label">No_Tiket</label>
	    <div class="col-md-9">
	      <input type="text" name="No_Tiket" class="form-control" id="No_Tiket" placeholder="No_Tiket" value="{{ isset($data->No_Tiket) ? $data->No_Tiket : '' }}">
	    </div>
	  </div>
	  <div class="form-group form-group-lg">
	    <label for="Headline" class="col-md-3 control-label">Headline</label>
	    <div class="col-md-9">
	      <textarea name="Headline" class="form-control" id="Headline" placeholder="Headline">{{ isset($data->Headline) ? $data->Headline : '' }}</textarea>
	    </div>
	  </div>
	  <div class="form-group form-group-lg">
	    <label for="PIC" class="col-md-3 control-label">PIC</label>
	    <div class="col-md-9">
	      <input type="text" name="PIC" class="form-control" id="PIC" placeholder="PIC" value="{{ isset($data->PIC) ? $data->PIC : '' }}">
	    </div>
	  </div>
	  <div class="form-group form-group-lg">
	    <label for="Alamat" class="col-md-3 control-label">Alamat</label>
	    <div class="col-md-9">
	      <textarea name="Alamat" class="form-control" id="Alamat" placeholder="Alamat">{{ isset($data->Alamat) ? $data->Alamat : '' }}</textarea>
	    </div>
	  </div>
	  <div class="form-group form-group-lg">
	    <label for="Wilayah" class="col-md-3 control-label">Wilayah</label>
	    <div class="col-md-9">
	      <input type="text" name="Wilayah" class="form-control" id="Wilayah" placeholder="Wilayah" value="{{ isset($data->Wilayah) ? $data->Wilayah : '' }}">
	    </div>
	  </div>
	  <div class="form-group form-group-lg">
	    <label for="Teknisi_ID" class="col-md-3 control-label">Teknisi_ID</label>
	    <div class="col-md-9">
	      <input type="text" name="Teknisi_ID" class="form-control" id="Teknisi_ID" placeholder="Teknisi_ID" value="{{ isset($data->Teknisi_ID) ? $data->Teknisi_ID : '' }}">
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
    $('#Teknisi_ID').select2({
      placeholder: 'Select',
      data: <?= json_encode($teknisi); ?>,
      multiple:false
    });
	});
	
</script>
@endsection