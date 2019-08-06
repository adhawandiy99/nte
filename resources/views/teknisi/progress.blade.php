@extends('layout')
@section('title')
	Progress
@endsection
@section('header')
	<a href="/inbox_order"><button type="button" class="btn btn-primary btn-outline"><span class="btn-label-icon left fa fa-arrow-left"></span>Kembali</button></a> Progress {{ $data->No_Tiket }}
@endsection
@section('css')
	<style type="text/css">
		.no-search .select2-search {
		    display:none
		}
	</style>
@endsection
@section('content')
<form class="form-horizontal" method="post" enctype="multipart/form-data" id="form-laporan">
  <input type="hidden" name="item" value="[]" />
  <div class="form-group form-message-dark">
    <label for="Status" class="col-md-2 control-label">Status</label>
    <div class="col-md-9">
      <input type="text" class="form-control Status" name="Status" id="Status" value="{{ isset($data->Status) ? $data->Status : '' }}" required>
    </div>
  </div>
  <div class="form-group form-message-dark">
    <label for="ont" class="col-md-2 control-label">ONT</label>
    <div class="col-md-9">
      <input type="text" class="form-control ont" name="ont" id="ont" value="{{ isset($data->ont) ? $data->ont : '' }}" required>
    </div>
  </div>
  <div class="form-group form-message-dark">
    <label for="stb" class="col-md-2 control-label">STB</label>
    <div class="col-md-9">
      <input type="text" class="form-control stb" name="stb" id="stb" value="{{ isset($data->stb) ? $data->stb : '' }}" required>
    </div>
  </div>
  <div class="form-group form-message-dark">
    <label for="Foto_Pekerjaan" class="col-md-2 control-label">File Upload</label>
    <div class="col-md-9">
      <input type="file" class="form-control " name="Foto_Pekerjaan" id="Foto_Pekerjaan" value="{{ isset($data->Foto_Pekerjaan) ? $data->Foto_Pekerjaan : '' }}" required>
    </div>
  </div>
  <div class="row">
    <div class="col-md-offset-2 col-md-9">
      <ul id="Itemlist" class="list-group">
        <li class="list-group-item" v-for="item in items" v-if="item.Quantity">
          <span class="badge" v-text="item.Quantity+' '+item.Satuan"></span>
          <strong v-text="item.Nama_Material"></strong>
          <p v-text="item.Deskripsi"></p>
        </li>
      </ul>
    </div>
  </div>
  <div class="form-group">
    <div class="col-md-offset-2 col-md-9">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-confirm">
        Pilih Material
      </button>
      <button type="submit" class="btn">Simpan Laporan</button>
    </div>
  </div>
</form>

<div class="modal fade" id="modal-confirm" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title" id="myModalLabel">Laporan Material</h4>
      </div>
      <div class="modal-body">
        <ul id="searchlist" class="list-group">
          <li class="list-group-item" v-for="item in items">
            <strong v-text="item.Nama_Material"></strong>
            <div class="widget-products-footer input-group has-success" style="width:200px;float:right;">
              <span class="input-group-btn">
                <button type="button" class="btn btn-success btn-outline" v-on:click="onMinus(item)">-</button>
              </span>
              <input v-model="item.Quantity" class="form-control" readonly>
              <span class="input-group-btn">
                <button type="button" class="btn btn-success btn-outline" v-on:click="onPlus(item)">+</button>
              </span>
            </div>
            <p v-text="item.Deskripsi"></p>
          </li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection
@section('js')
	<script src="/bower_components/vue-2.5.17/dist/vue.min.js"></script>
  <script type="text/javascript">
    $(function() {
      $('#form-laporan').pxValidate();
      $('#Status').select2({
        placeholder: 'Select Status',
        dropdownCssClass : 'no-search',
        data: [{"id":"OGP", "text" : "OGP"},{"id":"Selesai", "text" : "Selesai"},{"id":"Pending", "text" : "Pending"}]
      }).change(function() {
        $(this).valid();
      });
      var ont = <?= json_encode($ont); ?>;
      var stb = <?= json_encode($stb); ?>;
      $('#stb').select2({
        placeholder: 'Select SN STB',
        dropdownCssClass : 'no-search',
        data: stb
      }).change(function() {
        $(this).valid();
      });
      $('#ont').select2({
        placeholder: 'Select SN ONT',
        dropdownCssClass : 'no-search',
        data: ont
      }).change(function() {
        $(this).valid();
      });
      var materials = <?= json_encode($mtr); ?>;
      var vueData = {
          items: materials
      };
	    var listVm = new Vue({
        el: '#Itemlist',
        data: vueData
      });
	    new Vue({
	      el: '#modal-confirm',
	      data: vueData,
	      methods: {
	         	onPlus: function(item) {
	            if (!item.Quantity) item.Quantity = 0;
	            item.Quantity++;
	          },
	          onMinus: function(item) {
	            if (!item.Quantity) item.Quantity = 0;
	            else item.Quantity--;
	          }
	      }
	    });

      $('#form-laporan').submit(function() {
        var result = [];
        vueData.items.forEach(function(item) {
          if (item.Quantity > 0) result.push(item);
        });
        $('input[name=item]').val(JSON.stringify(result));
      });
    });
  </script>
@endsection