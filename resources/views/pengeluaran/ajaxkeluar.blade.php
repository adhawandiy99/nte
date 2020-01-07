<div class="table-primary">
  <div class="table-header">
    <div class="table-caption">
      Primary Table
    </div>
  </div>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>#</th>
        <th>SN</th>
        <th>Jenis NTE</th>
        <th>Merk</th>
        <th>Model</th>
      </tr>
    </thead>
    <tbody>
    	@foreach($sn as $no => $nte)
      <tr>
        <td>{{ ++$no }}</td>
        <td>{{ $nte->sn }}</td>
        <td>{{ $nte->jenis_nte }}</td>
        <td>{{ $nte->merk }}</td>
        <td>{{ $nte->model }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="table-footer">
    Footer
  </div>
</div>