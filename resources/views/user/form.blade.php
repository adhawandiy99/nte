@extends('layout')
@section('title')
	User
@endsection
@section('header')
	<a href="/user"><button type="button" class="btn btn-primary btn-outline"><span class="btn-label-icon left fa fa-arrow-left"></span>Kembali</button></a> User
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
	    <label for="Username" class="col-md-3 control-label">ID User</label>
	    <div class="col-md-9">
	      <input type="text" name="username" class="form-control" id="Username" placeholder="Username" value="{{ isset($data->username) ? $data->username : ''}}" required>
	    </div>
	  </div>
	  <div class="form-group form-message-dark">
	    <label for="Password" class="col-md-3 control-label">Password</label>
	    <div class="col-md-9">
	      <input type="Password" name="password" class="form-control" id="Password" placeholder="Password" required>
	      <small class="text-muted">Please do not use too weak password.</small>
	    </div>
	  </div>
	  <div class="form-group form-message-dark">
	    <label for="Nama" class="col-md-3 control-label">Nama</label>
	    <div class="col-md-9">
	      <input type="text" name="nama" class="form-control" id="Nama" placeholder="Nama" value="{{ isset($data->nama) ? $data->nama : '' }}" required>
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
	});
</script>
@endsection