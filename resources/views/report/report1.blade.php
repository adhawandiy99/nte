@extends('layout')
@section('title')
	Report
@endsection
@section('header')
	Report Order
@endsection
@section('css')
@endsection
@section('content')
	<div class="form-inline m-b-1" id="filter">
	  <div class="form-group">
	    <label for="form-inline-input-1">Tahun</label>
	    <input type="text" class="form-control input-xs tahun" placeholder="YYYY">
	  </div>
	  <div class="form-group">
	    <label for="form-inline-input-1">Bulan</label>
	    <input type="text" class="form-control input-xs bulan" placeholder="MM">
	  </div>
	  <div class="form-group">
	    <label for="form-inline-input-2">Tanggal</label>
	    <input type="email" class="form-control input-xs tanggal" placeholder="DD">
	  </div>
	  <button type="submit" class="btn btn-primary btn-filter">Filter</button>
	</div>
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
	        <th>NTE</th>
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
	        <td>
	        	<span class="label label-success label-xs">ONT:{{ $d->ont }}</span><br/>
	        	<span class="label label-success label-xs">STB:{{ $d->stb }}</span>
	        </td>
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
	<script type="text/javascript">
		$(function(){
    	$('.btn-filter').click(function(){
    		var url = "/report1/"+$('.tahun').val()+"-"+$('.bulan').val()+"-"+$('.tanggal').val();
    		location.href=url;
    	});
		});
	</script>
@endsection