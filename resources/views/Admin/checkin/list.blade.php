@extends('Admin.layouts.app')
@section('content')
<section class="content-header">
	<h1>
		List Tamu
		<small>List Semua Tamu</small>
	</h1>
	
</section>
<section class="content">
	<div class="box">
		<div class="box-body">
			<table class="table table-striped">
				<thead>
					<tr>
						<th># Kamar</th>
						<th>Nama Tamu</th>
						<th>Tanggal Check-In</th>
						<th>Tanggal Check-Out</th>
						<th>Jumlah Deposit</th>
					</tr>
				</thead>
				<tbody>
					@forelse($data as $tamu)
					<tr>
						<td>{{$tamu->kamar->nomor_kamar}}</td>
						<td>{{$tamu->tamu->nama}}</td>
						<td>{{date('Y-m-d',strtotime($tamu->tgl_checkin))}}</td>
						<td>{{date('Y-m-d',strtotime($tamu->tgl_checkout))}}</td>
						<td>{{$tamu->deposit_format}}</td>
						<td><a class="btn btn-xs btn-primary" href="{{ url('admin/'.$title.'/edit/'.$tamu->id) }}">Ubah</a></td>

					</tr>
					@empty

					<h4 class="text-center"><b>Untuk Sementara, Tidak Ada Tamu Yang Checkout.</b></h4>
					@endforelse
				</tbody>
			</table>
		</div>
	</div>
</section>
@endsection