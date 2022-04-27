<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>AdminLTE 2 | Log in</title>
	<meta id="token" name="token" content="{{ csrf_token() }}">
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="/css/app.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="/css/AdminLTE.min.css">

	<link rel="stylesheet" href="/dist/css/skins/_all-skins.min.css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body onload="window.print();">
	<!-- Site wrapper -->
	<div class="wrapper">
		<section class="invoice">
			@foreach($perusahaan as $dt)
			<h2 class="page-header">
				{{$dt->nama_hotel}}
				<span class="small"></span>
				<span class="lead text-red pull-right"><b>INVOICE</b></span>
			</h2>
			<h6>
				{{$dt->alamat_jalan}}, {{$dt->alamat_kabupaten}}, {{$dt->alamat_provinsi}}
				<br><br><b>Telp :</b> {{$dt->nomor_telp}} -  <b>Fax :</b> {{$dt->nomor_fax}} -  <b>Email :</b> {{$dt->email}}          <br><br><b>{{$dt->website}}</b>
			</h6>
			<br>
			<br>
			@endforeach
			<!-- Report Content -->
			
			<div class="row">
				<div class="col-sm-6">
					Ditujukan Kepada :
					<address>
						<strong>{{$transaksi->tamu->nama}}</strong><br>
						{{$transaksi->tamu->alamat_jalan}}<br>
						{{$transaksi->tamu->alamat_kabupaten.' - '.$transaksi->tamu->alamat_provinsi}}<br>
						<br>
						Nomor Telp : {{$transaksi->tamu->nomor_telp}}<br>
					</address>
				</div>
				<div class="col-sm-6">
					<b>NOMOR INVOICE : </b><br>
					<span class="lead">{{$transaksi->invoice_id}}</span><br><br>
					<b>Tanggal Terbit :</b><br>
					<span class="lead">{{date('d F Y')}}</span>
				</div>
			</div>

			<h3>RINCIAN TAGIHAN</h3>
			<table class="table table-bordered table-striped table-responsive">
				<thead>
					<tr>
						<th>Keterangan Layanan / Produk</th>
						<th class="text-center">Harga</th>
						<th class="text-center">Qty</th>
						<th class="text-center">Total</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Room Type : {{$transaksi->kamar->typekamar->nama}}</td>
						<td class="pull-right">{{$transaksi->kamar->typekamar->harga_malam_format}}</td>
						<td class="text-center">{{$jumlah_hari}} Malam</td>
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
				</tbody>
			</table>

			<div class="row">
				<div class="col-sm-6">
					<p class="text-muted well well-sm no-shadow">
						<b>Catatan :</b> Mohon simpan bukti pembayaran ini sebaik mungkin. Pihak hotel tidak akan melayani keluhan-keluhan tamu yang tidak memiliki bukti pembayaran resmi oleh Pihak Hotel
					</p>
				</div>
				<div class="col-sm-6">
					<table class="table table-bordered table-responsive">
						<tbody>
							<tr>
								<td><b>Sub-Total</b></td>
								<td class="pull-right">Rp. {{number_format($sub_total,2)}}</td>
							</tr>
							
							<tr>
								<td><b>Grand Total</b></td>
								<?php $total = $sub_total  - $transaksi->deposit ; ?>
								<td class="pull-right"><b>Rp {{number_format($total,2)}}</b></td>
							</tr>
						</tbody></table>
					</div>
				</div>
				<!-- end:Report -->
			</section>
		</div>

		


	</body>
	</html> 

</body>