@extends('layout')
@section('title')
	Material
@endsection
@section('header')
	List Material <a href="/material/input"> <button type="button" class="btn btn-primary btn-outline"><span class="btn-label-icon left fa fa-file-o"></span>Register</button></a>
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
	        <th>Action</th>
	      </tr>
	    </thead>
	    <tbody>
	    	@foreach($data as $no => $d)
	      <tr>
	        <th scope="row">{{ ++$no }}</th>
	        <td>{{ $d->Nama_Material }}</td>
	        <td>{{ $d->Satuan }}</td>
	        <td>{{ $d->Deskripsi }}</td>
	        <td>
	        	<a href="/material/{{ $d->ID_Sistem }}">
	        		<button type="button" class="btn btn-success btn-outline btn-rounded btn-xs">
	        			<span class="btn-label-icon left fa fa-pencil"></span>Edit
	        		</button>
	        	</a>
	        	
	        	<form method="POST" action="/deleteMaterial/{{ $d->ID_Sistem }}" accept-charset="UTF-8" style="display:inline" id="FormDelete">
              <button class="btn btn-danger btn-outline btn-rounded btn-xs" type="submit">
              <i class="fa fa-trash"></i> 
                Delete
              </button>
            </form>
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
			    var r = confirm("Delete Material?");
			    if(r == false) {
			      e.preventDefault();
	    		}
			});
		});
	</script>
@endsection