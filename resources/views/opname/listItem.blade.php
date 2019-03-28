@extends('layout')
@section('title')
	Out
@endsection
@section('header')
	<a href="/opname"><button type="button" class="btn btn-primary btn-outline"><span class="btn-label-icon left fa fa-arrow-left"></span>Kembali</button></a> Opname
@endsection
@section('css')
	<style type="text/css">
		.no-search .select2-search {
		    display:none
		}
	</style>
@endsection
@section('content')
	@if(isset($opname))
	<div class="table-primary">
	  <table class="table table-bordered" id="datatables">
	    <thead>
	      <tr>
	        <th>#</th>
	        <th>jenis_nte</th>
	        <th>stok_terakhir</th>
	        <th>opname_value</th>
	        <th>keterangan</th>
	        <th>Action</th>
	      </tr>
	    </thead>
	    <tbody>
	    	@foreach($opname as $no => $d)
	      <tr>
	        <th scope="row">{{ ++$no }}</th>
	        <td>{{ $d->jenis_nte }}</td>
	        <td>{{ $d->stok_terakhir }}</td>
	        <td>{{ $d->opname_value }}</td>
	        <td>{{ $d->keterangan }}</td>
	        <td>
	        		<button type="button" class="btn btn-success btn-outline btn-rounded btn-xs" data-iditem="{{ $d->id }}" data-jenis="{{ $d->jenis_nte }}" data-laststok="{{ $d->stok_terakhir }}" data-opnamevalue="{{ $d->opname_value }}" data-keterangan="{{ $d->keterangan }}" data-toggle="modal" data-target="#modal-base">
	        			<span class="btn-label-icon left fa fa-pencil"></span>Edit
	        		</button>
	        </td>
	      </tr>
	      @endforeach
	    </tbody>
	  </table>
	</div>
	@endif
	<div class="modal" id="modal-base">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">×</button>
	        <h4 class="modal-title">update item</h4>
	      </div>
	      <form class="form-horizontal" method="post" id="do-form" enctype="multipart/form-data" autocomplete="off">
	      <div class="modal-body">
	        
	        	<input type="hidden" name="id" class="form-control" id="iditem" required>
					  <div class="form-group form-message-dark">
					    <label for="jenis_nte" class="col-md-3 control-label">jenis_nte</label>
					    <div class="col-md-9">
					      <input type="text" name="jenis_nte" class="form-control" id="jenis_nte" placeholder="jenis_nte" required>
					    </div>
					  </div>
					  <div class="form-group form-message-dark">
					    <label for="stok_terakhir" class="col-md-3 control-label">stok_terakhir</label>
					    <div class="col-md-9">
					      <input type="text" name="stok_terakhir" class="form-control" id="stok_terakhir" placeholder="stok_terakhir" required>
					    </div>
					  </div>
					  <div class="form-group form-message-dark">
					    <label for="opname_value" class="col-md-3 control-label">opname_value</label>
					    <div class="col-md-9">
					      <input type="text" name="opname_value" class="form-control" id="opname_value" placeholder="opname_value" required>
					    </div>
					  </div>
					  <div class="form-group form-message-dark">
					    <label for="keterangan" class="col-md-3 control-label">keterangan</label>
					    <div class="col-md-9">
					    	<textarea name="keterangan" class="form-control" id="keterangan" placeholder="keterangan" required></textarea>
					    </div>
					  </div>
					
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Simpan</button>
	      </div>
	      </form>
	    </div>
	  </div>
	</div>
	
@endsection
@section('js')
<script type="text/javascript">
  $(function() {
    $('#do-form').pxValidate();
    $('#tgl_keluar').datepicker({
    	format: 'yyyy-mm-dd'
    });
    $( "#modal-base" ).on('shown.bs.modal', function(event){
    	$("#iditem").val($(event.relatedTarget).attr("data-iditem"));
    	$("#jenis_nte").val($(event.relatedTarget).attr("data-jenis"));
    	$("#stok_terakhir").val($(event.relatedTarget).attr("data-laststok"));
    	$("#opname_value").val($(event.relatedTarget).attr("data-opnamevalue"));
    	$("#keterangan").val($(event.relatedTarget).attr("data-keterangan"));

	});
	});
</script>
@endsection