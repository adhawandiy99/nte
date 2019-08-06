@extends('layout')
@section('title')
	Report
@endsection
@section('header')
	Report Order
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
	        <th>No_Tiket</th>
	        <th>Headline</th>
	        <th>PIC</th>
	        <th>Alamat</th>
	        <th>Wilayah</th>
	        <th>Teknisi</th>
	        <th>Status</th>
	        <th>Action</th>
	      </tr>
	    </thead>
	    <tbody>
	    	@foreach($data as $no => $d)
	      <tr>
	        <th scope="row">{{ ++$no }}</th>
	        <td>{{ $d->No_Tiket }}</td>
	        <td>{{ $d->Headline }}</td>
	        <td>{{ $d->PIC }}</td>
	        <td>{{ $d->Alamat }}</td>
	        <td>{{ $d->Wilayah }}</td>
	        <td>{{ $d->Nama }}</td>
	        <td>{{ $d->Status }}</td>
	        <td>
	        	<a href="/printpdf/{{ $d->ID_Sistem }}">
	        		<button type="button" class="btn btn-success btn-outline btn-rounded btn-xs">
	        			<span class="btn-label-icon left fa fa-pencil"></span>Print
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
		});
	</script>
@endsection