@extends('Admin.layouts.app')
@section('content')
<section class="content-header">
	<h1>
		Data Kamar Yang Terpakai
		<small>List Kamar Yang Terpakai </small>
	</h1> 
</section>
<section class="content">
	<div class="box">
		<div class="box-body">
			<div class="row">
				@forelse($kamar as $room)
				<div class="col-sm-3">
					@if ($room->typekamar->nama === 'Standart')
					<div class="small-box bg-green">
						@elseif ($room->typekamar->nama === 'Deluxe')
						<div class="small-box bg-aqua">
							@elseif ($room->typekamar->nama === 'Superior')
							<div class="small-box bg-blue">
								@elseif ($room->typekamar->nama === 'Junior Suite')
								<div class="small-box bg-orange">
									@elseif ($room->typekamar->nama === 'Suite Room')
									<div class="small-box bg-maroon">
										@elseif ($room->typekamar->nama === 'Presidential')
										<div class="small-box bg-red">
											@endif
											<div class="inner">
												<h3>{{$room->nomor_kamar}}</h3>
												<p>{{$room->transaksi->tamu->nama}}</p>
												<p>{{$room->lantais->nama}}</p>
											</div>
											<div class="icon">
												<i class="fa fa-bed"></i>
											</div>
										
										</div>
									</div>
									@empty

									<h4 class="text-center"><b>Mohon Maaf!! <br>
									Untuk Sementara, Tidak Ada Kamar Kotor.</b></h4>
									@endforelse
								</div>
							</div>
						</div>
					</section>
					@endsection