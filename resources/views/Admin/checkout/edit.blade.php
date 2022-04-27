@extends('Admin.layouts.app')
@section('content')
<section class="content">
	<div class="box" id="check-out">
		<div class="box-header">
			<h3 class="box-title">KAMAR NOMOR : <b>{{$transaksi->kamar->nomor_kamar}}</b></h3>
		</div>
		<form action="{{url('admin/checkout/edit')}}" method="POST">
			{{ csrf_field() }} 
			<div class="box-body">
				<div class="row">
					<div class="col-sm-3">						
						<div class="alert alert-info">
							<h4>{{$transaksi->kamar->typekamar->nama}}</h4>
							<ul class="list-unstyled">
								<li>Harga / Malam : <b>{{$transaksi->kamar->typekamar->harga_malam_format}}</b></li>
								<li>Maximal Orang Dewasa : <b>{{$transaksi->kamar->max_dewasa}} Orang</b></li>
								<li>Maximal Anak-anak : <b>{{$transaksi->kamar->max_anak}} Orang</b></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label># INVOICE</label>
							<input class="form-control" name="nomor_invoice" value="{{$transaksi->invoice_id}}" readonly="">
						</div>
						<div class="form-group">
							<label>Nama Tamu</label>
							<input class="form-control" value="{{$transaksi->tamu->nama}}" readonly="">
						</div>
					</div>
					<div class="col-sm-5">
						<div class="form-group">
							<label>Jumlah Tamu</label>
							<div class="row">
								<div class="col-sm-6">
									<input class="form-control" value="{{$transaksi->jumlah_dewasa}} Dewasa" readonly="">
								</div>
								<div class="col-sm-6">
									<input class="form-control" value="{{$transaksi->jumlah_anak}} Anak-anak" readonly="">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Tanggal / Waktu Check-In</label>
							<div class="row">
								<div class="col-sm-6">
									<input class="form-control" value="{{date('Y-m-d',strtotime($transaksi->tgl_checkin))}}" readonly="">
								</div>
								<div class="col-sm-6">
									<input class="form-control" value="{{date('H:i:s',strtotime($transaksi->tgl_checkin))}}" readonly="">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Tanggal / Waktu Check-Out</label>
							<div class="row">
								<div class="col-sm-6">
									<input id="checkout" class="form-control" name="tanggal_checkout" data-date-format="dd-mm-yyyy" value="{{date('Y-m-d',strtotime($transaksi->tgl_checkout))}}" readonly="">
								</div>
								<div class="col-sm-6">
									<input class="form-control" name="waktu_checkout" value="{{date('H:i:s',strtotime($transaksi->tgl_checkout))}}" readonly>
								</div>
							</div>
						</div>
					</div>
				</div>
				<h3>Rincian Tagihan</h3>
				<hr>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Keterangan Layanan / Produk</th>
							<th class="pull-right">Harga</th>
							<th class="text-center">Qty</th>
							<th class="pull-right">Total</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Room reserved type : {{$transaksi->kamar->typekamar->nama}} ROOM</td>
							<td class="pull-right">{{$transaksi->kamar->typekamar->harga_malam_format}}</td>
							<td class="text-center">{{$jumlah_hari}} Hari</td>
							<td class="pull-right">Rp. {{number_format($transaksi->kamar->typekamar->harga_malam * $jumlah_hari),2}}</td>
							<?php $sub_total = $transaksi->kamar->typekamar->harga_malam * $jumlah_hari ; ?>
						</tr>
						@foreach($layanan as $service)
						<tr>
							<td>{{$service->layanan->nama_layanan}}</td>
							<td class="pull-right">{{$service->layanan->harga_format}}</td>
							<td class="text-center">{{$service->jumlah.' '.$service->layanan->satuan}}</td>
							<td class="pull-right">{{$service->total_format}}</td>
							<?php $sub_total = $sub_total + $service->total; ?>
						</tr>
						@endforeach
						<tr>
							<td rowspan="4"></td>
							<td colspan="2"><b>Sub-Total</b></td>
							<td class="pull-right"><b>Rp. {{number_format($sub_total,2)}}</b></td>
						</tr>
						
						<tr>							
							<td colspan="2">Jumlah Deposit</td>
							<td class="text-red pull-right" >{{$transaksi->deposit_format}}</td>
						</tr>
						<tr>							
							<?php $total_akhir = $sub_total - $transaksi->deposit ; ?>
							<td colspan="2"><b>Grand Total</b></td>
							<td class="pull-right"><b>Rp {{number_format($total_akhir,2)}}</b></td>
							
						</tr>
					</tbody>
				</table>
			</div>
			<div class="box-footer">
				<input type="hidden" name="id" value="{{$transaksi->id}}">

				<button class="btn btn-success" type="submit" >Check Out</button>

				<a class="btn btn-primary" href="{{ url('admin/'.$title.'/cetak_invoice/'.$transaksi->id) }}" target="_blank">Cetak Invoice</a>
				<a class="btn btn-warning" href="">Batal</a>
			</div>
		</form>
	</div>
</section>
@endsection
