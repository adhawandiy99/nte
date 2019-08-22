<table class="table table-bordered" id="datatables">
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
    @foreach($data as $no => $d)
    <tr>
      <th scope="row">{{ ++$no }}</th>
      <td>{{ $d->sn }}</td>
      <td>{{ $d->jenis_nte }}</td>
      <td>{{ $d->merk }}</td>
      <td>{{ $d->model }}</td>
    </tr>
    @endforeach
  </tbody>
</table>