@extends('layout')
@section('title')
	Opname
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
	<form class="form-horizontal" method="post" id="user-form">
	  <div class="form-group form-message-dark">
	    <label for="tgl_opname" class="col-md-3 control-label">tgl_opname</label>
	    <div class="col-md-9">
	      <input type="text" name="tgl_opname" class="form-control" id="tgl_opname" placeholder="tgl_opname" value="{{ isset($data->tgl_opname) ? $data->tgl_opname : ''}}" required>
	    </div>
	  </div>
    <div class="form-group">
	    <div class="col-md-offset-3 col-md-9">
	      <button type="submit" class="btn"><span class="btn-label-icon left fa fa-database"></span>Submit</button>
	    </div>
	  </div>
	</form>

    
	</form>
@endsection
@section('js')
<script type="text/javascript">
  $(function() {
    $('#user-form').pxValidate();
    $('#tgl_opname').datepicker({
    	format: 'yyyy-mm-dd'
    });
	});
</script>
@endsection