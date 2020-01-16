<head>
<style>
.tbl, .tbl th, .tbl td{
    border: 1px solid black;
    border-collapse: collapse;
}
</style>
</head>
<body style="padding:0px">
<table style="padding: 0px;border:0px;" width="100%">
	<tr align="left">
		<td width="25%">
			<h1>TVRI NTB</h1>
			<div>
				SEKSI BERITA
			</div>
			<div>
				Tanggal : {{$items['tanggal']}}
			</div>
		</td>
		<td valign="top" align="left" width="50%">
			@if($items['kategori']->id == 1)
			<h1>WARTA NTB</h1>
			@else
			<h1>{{$items['kategori']->nama}}</h1>
			@endif
		</td>
		<td valign="top" width="25%">
		</td>
	</tr>
	<tr align="center">
		<td width="100%" colspan="3">
			<table border="1" width="100%" class="tbl">
			@if($items['kategori']->siaran_lokal == 0)
				<tr>
					<th width="3%">
						No.
					</th>
					<th>
						Judul Berita
					</th>
					<th width="5%">
						Durasi
					</th>
					<th width="5%">
						Lokasi
					</th>
					<th width="5%">
						Liputan
					</th>
					<th width="8%">
						Petugas
					</th>
				</tr>
				@foreach ($items['item'] as $item)
               <tr>
			<td>{{ $item->urutan }}</td>
			<td>{{ $item->judul }}</td>
			@if(empty($item->lokasi))
				<td>-</td>
				<td>-</td>
				<td>-</td>
				<td>-</td>0
			@else
			<td>{{ gmdate("i:s", $item->durasi) }}</td>
			<td>{{ $item->lokasi }}</td>
			<td>{{ ucfirst($item->jenis_liputan) }}</td>
         <td>{{ strtoupper($item->kameramen) }}/{{ strtoupper($item->reporter) }}</td>
			@endif
		   </tr>
            @endforeach
			@else
				<tr>
					<th width="3%">
						No.
					</th>
					<th>
						Judul Berita
					</th>
					<th width="5%">
						Durasi
					</th>
					<th width="5%">
						Dubber
					</th>
					<th width="8%">
						Penterjemah
					</th>
				</tr>
				@foreach ($items['item'] as $item)
               <tr>
			<td>{{ $item->urutan }}</td>
			<td>{{ $item->judul }}</td>
			@if(empty($item->dubber))
				<td>-</td>
				<td>-</td>
				<td>-</td>
			@else
			<td>{{ gmdate("i:s", $item->durasi) }}</td>
			<td>{{ strtoupper($item->dubber) }}</td>
         <td>{{ strtoupper($item->penterjemah) }}</td>
			@endif
		   </tr>
            @endforeach
			@endif
			</table>
		</td>
	</tr>
	<tr align="justify">
		<td align="center">
			<p>
			EIC
			</p>
			<br>
			<br>
			<p>
			{{$items['pegawai']['eic']['nama']}}
			</p>
		</td>
		<td align="center">
			<p>
			CDE
			</p>
			<br>
			<br>
			<p>
			{{$items['pegawai']['cde']['nama']}}
			</p>
		</td>
	</tr>
	<tr align="justify">
		<td width="100%" valign="top">
         <table width="100%" cellpadding="0" cellspacing="0">
         @foreach ($items['petugas_siaran'] as $item)
               <tr>
			   <td width="30%">{{ ucwords(str_replace('_', ' ', $item->bagian)) }}</td>
			   <td>: {{ $item->pegawai->nama }}</td>
		   </tr>
            @endforeach
         </table>
		</td>
		<td></td>
		<td align="center" valign="bottom">
			<p>
			Kepala Seksi Berita
			</p>
			<br>
			<br>
			<p>
			{{$items['pegawai']['kepala']['nama']}}
			</p>
		</td>
	</tr>
</table>
</body>