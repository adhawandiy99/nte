@extends('layout')
@section('title')
	pengeluaran
@endsection
@section('header')
	List pengeluaran <a href="/out/input"> <button type="button" class="btn btn-primary btn-outline"><span class="btn-label-icon left fa fa-file-o"></span>Input</button></a>
@endsection
@section('css')
	<link href="/manual/datatable/buttons.dataTables.min.css" rel="stylesheet" type="text/css">
@endsection
@section('content')
	<div class="table-primary">
	  <table class="table table-bordered" id="datatables">
	    <thead>
	      <tr>
	        <th>#</th>
	        <th>tujuan</th>
	        <th>tgl_keluar</th>
	        <th>penerima_nama</th>
	        <th>Action</th>
	      </tr>
	    </thead>
	    <tbody>
	    	@foreach($data as $no => $d)
	      <tr>
	        <th scope="row">{{ ++$no }}</th>
	        <td>{{ $d->tujuan }}</td>
	        <td>{{ $d->tgl_keluar }}</td>
	        <td>{{ $d->petugas_nama }}</td>
	        <td>
	        	<a href="/out/{{ $d->id }}">
	        		<button type="button" class="btn btn-success btn-outline btn-rounded btn-xs">
	        			<span class="btn-label-icon left fa fa-pencil"></span>Edit
	        		</button>
	        	</a>
	        	<a href="/deleteout/{{ $d->id }}">
	        		<button type="button" class="btn btn-danger btn-outline btn-rounded btn-xs">
	        			<span class="btn-label-icon left fa fa-trash"></span>Hapus
	        		</button>
	        	</a>
	        </td>
	      </tr>
	      @endforeach
	    </tbody>
	  </table>
	</div>
@endsection
@section('js')
	<script src="/manual/datatable/dataTables.buttons.min.js"></script>
  <script src="/manual/datatable/buttons.print.min.js"></script>
	<script type="text/javascript">
		$(function(){
	    	$('#datatables_wrapper .dataTables_filter input').attr('placeholder', 'Search...');
				$('#FormDelete').submit(function(e){
					var txt;
			    var r = confirm("Delete User?");
			    if(r == false) {
			      e.preventDefault();
	    		}
			});
		});
	</script>
@endsection