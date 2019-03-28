@extends('layout')
@section('title')
	Search
@endsection
@section('header')
	Search Pengeluaran
@endsection
@section('content')
	<form class="form-horizontal" method="get" id="search">
		<div class="input-daterange input-group form-message-dark" id="datepicker-range">
	    <input type="text" class="form-control" name="start" placeholder="Start Date" id="start" value="{{Request::input('start')}}" required>
	    <span class="input-group-addon">to</span>
	    <input type="text" class="form-control" name="end" placeholder="Start End" id="end" value="{{Request::input('end')}}" required>
	    <span class="input-group-btn">
		    <button type="submit" class="btn">Search!</button>
		  </span>
		</div>
	</form>
	<br/>
	@if(count($data))
		<div class="table-primary">
		  <table class="table table-bordered" id="datatables">
		    <thead>
		      <tr>
		        <th>#</th>
		        <th>tujuan</th>
		        <th>tgl_keluar</th>
		        <th>penerima_nama</th>
		      </tr>
		    </thead>
		    <tbody>
		    	@foreach($data as $no => $d)
		      <tr>
		        <th scope="row">{{ ++$no }}</th>
		        <td>{{ $d->tujuan }}</td>
		        <td>{{ $d->tgl_keluar }}</td>
		        <td>{{ $d->petugas_nama }}</td>
		      </tr>
		      @endforeach
		    </tbody>
		  </table>
		</div>
	@elseif(Request::input('start'))
		Not Found .....!
	@endif
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
		});
	</script>
@endsection