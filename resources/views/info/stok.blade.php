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
      </tr>
    </thead>
    <tbody>
    	@foreach($data as $no => $d)
      <tr>
        <th scope="row">{{ ++$no }}</th>
        <td>{{ $d->model }}</td>
        <td>{{ $d->stok }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
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
		});
	</script>
@endsection