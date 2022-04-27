@extends('Admin.layouts.app')
@section('content')
<section class="content-header">
	<h1>Semua Data Laporan</h1>
</section>

<section class="content">
	<div class="box">
		<div class="box-body">
			<div class="row">

				<form method="POST" action="{{url('admin/laporan/kamar')}}" enctype="multipart/form-data">
					{{ csrf_field() }}

					<div class="col-sm-3">
						<div class="form-group">
							<input id="datepicker" data-date-format="yyyy-mm-dd" class="form-control" name="tgl_awal"
								placeholder="Dari Tanggal">

						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<input id="datepicker2" data-date-format="yyyy-mm-dd" class="form-control" name="tgl_akhir"
								placeholder="Sampai Tanggal">

						</div>
					</div>
					<div class="col-sm-3">
						<button class="btn btn-success" type="submit" name="action">Lihat Laporan Kamar</button>
					</div>

				</form>

			</div>
			<div class="row">

				<form method="POST" action="{{url('admin/laporan/layanan')}}" enctype="multipart/form-data">
					{{ csrf_field() }}

					<div class="col-sm-3">
						<div class="form-group">
							<input id="datepicker3" data-date-format="yyyy-mm-dd" class="form-control" name="tgl_awal"
								placeholder="Dari Tanggal">

						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<input id="datepicker4" data-date-format="yyyy-mm-dd" class="form-control" name="tgl_akhir"
								placeholder="Sampai Tanggal">

						</div>
					</div>
					<div class="col-sm-3">
						<button class="btn btn-success" type="submit" name="action">Lihat Laporan Layanan</button>
					</div>

				</form>

			</div>
		</div>
	</div>
</section>

@endsection