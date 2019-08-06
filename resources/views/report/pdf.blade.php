<style type="text/css">
	.tbl {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
</style>
<h1 style="text-align: center;">Laporan Pekerjaan</h1>
Pada Hari ini tanggal {{ date('d') }} Bulan {{ date('m') }} tahun {{ date('Y') }} telah dilakukan perbaikan layanan sesuai data dibawah ini :<br>
<table border="0">
	<tr><td width="150">Nomor Tiket</td><td> : {{ $data->No_Tiket }}</td></tr>
	<tr><td width="150">Headline</td><td> : {{ $data->Headline }}</td></tr>
	<tr><td width="150">Wilayah</td><td> : {{ $data->Wilayah }}</td></tr>
	<tr><td width="150">Alamat</td><td> : {{ $data->Alamat }}</td></tr>
	<tr><td width="150">Teknisi</td><td> : {{ $data->Nama }}</td></tr>
	<tr><td width="150">Status</td><td> : {{ $data->Status }}</td></tr>
</table>
<br>
Penggunaan Material :
<table class="tbl" border="1">
	<tr>
		<th>#</th>
		<th>MATERIAL</th>
		<th>SATUAN</th>
		<th>JUMLAH</th>
		<th>KETERANGAN</th>
	</tr>
	@foreach($mtr as $no => $m)
		<tr>
			<td>{{ ++$no }}</td>
			<td>{{ $m->Nama_Material }}</td>
			<td>{{ $m->Satuan }}</td>
			<td>{{ $m->Quantity }}</td>
			<td>{{ $m->Deskripsi }}</td>
		</tr>
	@endforeach

	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
</table>

<p style="text-align: center;">Pimpinan</p>
<br><br>
<p style="text-align: center;">...................</p>
<p style="text-align: center;">NIK</p>
