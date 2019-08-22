@extends('layout')
@section('title')
	Search
@endsection
@section('header')
	Search Pengeluaran
@endsection
@section('content')
<div class="table-primary">
  <table class="table table-bordered" id="datatables">
    <thead>
      <tr>
        <th>#</th>
        <th>Model</th>
        <th>Stok</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    	@foreach($data as $no => $d)
      <tr>
        <th scope="row">{{ ++$no }}</th>
        <td>{{ $d->model }}</td>
        <td>{{ $d->stok }}</td>
        <td><button type="button" class="btn btn-xs lihat-sn" data-flag="{{ $d->model }}"><span class="btn-label-icon left fa fa-list-ol"></span>Lihat SN</button></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>


<div class="modal" id="modal-base">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4 class="modal-title">List SN</h4>
        </div>
        <div class="modal-body">
          
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
	<script>
		$(function(){
			$('#search').submit(function(evt){
				if(!$('#start').val() || !$('#end').val()){
					evt.preventDefault();
				}
			});
			$('#datepicker-range').datepicker({
				format: 'yyyy-mm-dd'
			});
      $('.lihat-sn').click(function(e){
        var flag=e.target.dataset.flag;
        $.get("/stokByModel/"+flag, function( data ) {
          $(".modal-body").html( data );
        });
        $('#modal-base').modal('show');
      });
		});
	</script>
@endsection