@extends('Admin.layouts.app')
@section('content')
<section class="content-header">
  <h1>
    Data Transaksi Layanan
    <small>Admin panel</small>
  </h1>
 
</section>
<section class="content">
<div class="box">
	<div class="box-body">
		<div class="row">
		@forelse($guest as $service)
			<div class="col-sm-3">
				<div class="small-box bg-blue">
					<div class="inner">
						<h3>{{$service->kamar->nomor_kamar}}</h3>
						<p>{{$service->tamu->nama}}</p>
					</div>
					<div class="icon">
						<i class="fa fa-bed"></i>
					</div>
					<a class="small-box-footer" href="{{url('admin/transaksi-layanan/show/'.$service->id)}}">Masukan Pesanan Layanan</a>
				</div>
			</div>
				@empty

									<h4 class="text-center"><b>Mohon Maaf!! <br>
									Untuk Sementara, Tidak Ada Pesanan.</b></h4>
		@endforelse
	</div>
</div>
</section>
@endsection