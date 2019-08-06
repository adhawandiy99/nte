@extends('layout')
@section('title')
  Inbox
@endsection
@section('header')
  Inbox Order Teknisi
@endsection
@section('css')
  <link href="/manual/datatable/buttons.dataTables.min.css" rel="stylesheet" type="text/css">
@endsection
@section('content')
  <div class="widget-pricing widget-pricing-expanded">
    <div class="widget-pricing-inner row">
     @foreach($data as $no => $d)
        <div class="col-xs-6 col-md-6 col-lg-3 col-xl-3">
          <div class="panel text-xs-center p-y-1">
            <b class="label label-primary label-pill label-outline m-b-2">
              {{ (strlen($d->No_Tiket)>19)?substr($d->No_Tiket,0,19).'...':$d->No_Tiket }}
            </b><br/>
            <span class="label label-info label-outline">{{ (strlen($d->Headline)>19)?substr($d->Headline,0,19).'..':$d->Headline }}</span><br>
            <span class="label label-info label-outline" style="margin:2px 0 2px 0;">{{ (strlen($d->PIC)>19)?substr($d->PIC,0,19).'..':$d->PIC }}</span><br>
            <span class="label label-info label-outline">{{ (strlen($d->Alamat)>19)?substr($d->Alamat,0,19).'..':$d->Alamat }}</span><br/>

            <a href="#" class="btn btn-xs btn-info detail" data-sn="{{ $d->ID_Sistem }}"><i class="ion-information"></i>&nbsp;&nbsp;Detail</a>
            <a href="/progress/{{ $d->ID_Sistem }}" class="btn btn-xs btn-primary"><i class="ion-compose"></i>&nbsp;&nbsp;Update</a>
          </div>
        </div>
      @endforeach
    </div>
  </div>

  <div id="modal-info" class="modal fade modal-alert modal-info">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header"><i class="ion-information-circled"></i></div>
        <div id="detilContent"></div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-info" data-dismiss="modal">OK</button>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('js')
  <script type="text/javascript">
    $(function() {
      $(".detail").click(function(e){
        var sn = e.target.dataset.sn;
        var url = "/getDetail/"+sn;
        $.getJSON(url, function(r){
          $("#detilContent").html('<div class="modal-title">'+r.No_Tiket+'</div><div class="modal-body"><p>Headline : '+r.Headline+'</p><p>PIC : '+r.PIC+'</p><p>Alamat : '+r.Alamat+'</p><p>Wilayah : '+r.Wilayah+'</p></div>');
          $("#modal-info").modal('show');
        });
      });
    });
  </script>
@endsection