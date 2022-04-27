@extends('Admin.layouts.app')
@section('content')
<section class="content">
	<div class="row" id="perusahaan">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">

				</div>
				<!-- /.box-header -->
				@foreach($perusahaan as $dt)
				<div class="box-body">
					<form method="POST" enctype="multipart/form-data" action="{{url('admin/perusahaan/update/'.$dt->id)}}">
						 {{ csrf_field() }} 
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<div class="row">
										<div class="col-sm-6">
											<label>Nama Hotel</label>
											<input type="hidden" name="id" value="{{$dt->id}}">
											<input class="form-control" name="nama_hotel" placeholder="Nama Pengguna"  value="{{$dt->nama_hotel}}">

										</div>
										<div class="col-sm-6">
											<label>Nama Perusahaan</label>
											<input class="form-control" name="nama_perusahaan" placeholder="perusahaanname"  value="{{$dt->nama_perusahaan}}">

										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<div class="row">
										<div class="col-sm-6">
											<label>Alamat</label>
											<textarea class="form-control" name="alamat_jalan" placeholder="Alamat" rows="10">{{$dt->alamat_jalan}}</textarea>

										</div>
										<div class="col-sm-3">
											<label>Alamat Kota</label>
											<input class="form-control" name="alamat_kabupaten" placeholder="Kabupaten"  value="{{$dt->alamat_kabupaten}}">

										</div>
										<div class="col-sm-3">
											<label>Alamat Provinsi</label>
											<input class="form-control" name="alamat_provinsi" placeholder="Provinsi"  value="{{$dt->alamat_provinsi}}">

										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<div class="row">
										<div class="col-sm-3">
											<label>Nomor Telp / Handphone</label>
											<input class="form-control" name="nomor_telp" value="{{$dt->nomor_telp}}">

										</div>
										<div class="col-sm-3">
											<label>Nomor Fax</label>
											<input class="form-control" name="nomor_fax"  value="{{$dt->nomor_fax}}">

										</div>
										<div class="col-sm-3">
											<label>Website</label>
											<input class="form-control" name="Website"  value="{{$dt->website}}">

										</div>
										<div class="col-sm-3">
											<label>Email</label>
											<input type="email" class="form-control" name="email" value="{{$dt->email}}">

										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-12">
								<button type="submit" class="btn btn-primary pull-right">Save changes</button>
							</div>
						</div>
					</div>
					@endforeach
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>

		</div>

	</section>
	@endsection
