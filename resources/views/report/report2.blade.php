@extends('layout')
@section('title')
	Report
@endsection
@section('header')
	Report Pemakaian Material
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
	        <th>Nama_Material</th>
	        <th>Satuan</th>
	        <th>Deskripsi</th>
	        <th>Material Terpakai</th>
	      </tr>
	    </thead>
	    <tbody>
	    	@foreach($data as $no => $d)
	      <tr>
	        <th scope="row">{{ ++$no }}</th>
	        <td>{{ $d->Nama_Material }}</td>
	        <td>{{ $d->Satuan }}</td>
	        <td>{{ $d->Deskripsi }}</td>
	        <td>{{ $d->Total }}</td>
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
		});
	</script>
@endsection