@extends('Admin.layouts.app')
@section('content')
<section class="content-header">
  <h1>
    Daftar Kamar Kotor
    <small>List Kamar Kotor</small>
  </h1>
 
</section>
<section class="content">
<div class="box">
<div class="box-body">	
@forelse($kamar as $room)
<div class="col-sm-3">
<div class="small-box bg-yellow">
<div class="inner">
<h3>{{$room->nomor_kamar}}</h3>
<p>{{$room->typekamar->nama}}</p>
</div>
<div class="icon">
<i class="fa fa-bed"></i>
</div>
 <form method="POST" action="{{url('admin/transaksi-layanan/update/'.$room->id)}}" enctype="multipart/form-data">
 {{ csrf_field() }} 
<input type="hidden" name="id" value="{{$room->id}}">
<button type="submit" class="btn btn-primary">Simpan</button>
</form>
</div>
</div>
@empty

<h4 class="text-center"><b>Mohon Maaf!! <br>
Untuk Sementara, Tidak Ada Kamar Yang Sedang Kotor.</b></h4>


@endforelse
		</div>
	</div>
</section>
@endsection

