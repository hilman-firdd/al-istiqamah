@extends('Admin.layouts.app')
@section('content')
<section class="content">
<div class="box" id="layanan">
<div class="box-header">
<h3 class="box-title">PESANAN KAMAR : 
<b>{{$guest->kamar->nomor_kamar}}</b> - 
<b>{{$guest->tamu->nama}}</b>
</h3>
<a class="btn btn-warning pull-right" href="">Batal</a>
</div>
<div class="box-body">
<!-- Pilih Produk Layanan -->
<!-- Pilih Kategori Layanan -->
<div class="row">
@foreach($layanan as $service)
<div class="col-sm-3">
<a href="" class="btn btn-lg btn-block btn-primary" data-toggle="modal" data-target="#tambah-data{{$service->id}}">{{$service->nama_layanan_kategori}}</a>
</div>

<div class="modal fade" id="tambah-data{{$service->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<form method="POST" enctype="multipart/form-data" action="{{url('admin/transaksi-layanan/store')}}">
{{ csrf_field() }}

<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-name" id="myModalLabel">Pesan Layanan</h4>
</div>
<div class="modal-body">
<table class="table table-striped table-hover" id="purchaseInvoice">
	<thead>
		<tr>
			<th>Nama Produk / Layanan</th>
			<th>Harga</th>
			<th>Jumlah Pesanan</th>
		</tr>
	</thead>
	<tbody>

		@foreach($layanans as $services)
		@if ($services->layanan_kategori_id == $service->id)
		<tr>
			<td><input type="hidden" name="layanan_id" value="{{$services->id}}">{{$services->nama_layanan}}</td>
			<td><input class="form-control" type="hidden" name="harga" id="hb" value="{{number_format($services->harga)}}">Rp.{{number_format($services->harga)}}</td>
			<td>
				<div class="row">
					<div class="col-sm-4">
						<input type="text" class="form-control" name="jumlah">
						<input class="form-control"  type="hidden" name="total">
					</div>
					<div class="col-sm-8">

					</div>
				</div>
			</td>
		</tr>
		@endif
		@endforeach		
	</tbody>
</table>
</div>
<div class="modal-footer">
<input type="hidden" name="transaksi_kamar_id" value="{{$guest->id}}">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary">Simpan</button>
</div>
</form>
</div>
</div>
</div>
@endforeach
</div>
</div>


</div>
</section>


@endsection


