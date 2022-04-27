@extends('Admin.layouts.app')
@section('content')

  <section class="content">
<div class="row">
<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$kt}}</h3>

              <p>Kamar Tersedia</p>
            </div>
            <div class="icon">
              <i class="fa fa-bed"></i>
            </div>
            <a href="{{url('admin/kamar/tersedia')}}" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

         <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
            
              <h3>{{$kp}}</h3>

              <p>Kamar Terpakai</p>
            </div>
            <div class="icon">
              <i class="fa fa-bed"></i>
            </div>
            <a href="{{url('admin/kamar/terpakai')}}" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>



 <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-olive">
            <div class="inner">
             

              <h3>{{$kotor}}</h3>
              
             
              <p>Kamar Kotor</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="{{url('admin/kamar/kotor')}}" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
      </div>
<!-- end row -->
<div class="row">
    <div class="col-md-6">
        <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Tamu yang sedang menginap</h3>
        </div>
        <div class="box-body">
          <table class="table table-sriped">
            <thead>
              <tr>
                <th>Nama Tamu</th>
                <th># Kamar</th>
                <th>Tanggal / Waktu Check-In</th>
              </tr>
            </thead>
            <tbody>
              @foreach($tamu as $guest)
              <tr>
                <td>{{$guest->tamu->nama}}</td>
                <td>{{$guest->kamar->nomor_kamar}}</td>
                <td>{{$guest->tgl_checkin}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
 
    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Tamu yang akan check-out hari ini</h3>
        </div>
        <div class="box-body">
          <table class="table table-sriped">
            <thead>
              <tr>
                <th>Nama Tamu</th>
                <th>#Kamar</th>
                <th>Tanggal / Waktu Check-Out</th>
              </tr>
            </thead>
            <tbody>

              @foreach($tamu_checkout as $guest)
              <tr>
                <td>{{$guest->tamu->nama}}</td>
                <td>{{$guest->kamar->nomor_kamar}}</td>
                <td>{{$guest->tgl_checkout}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
 
  </div>
<div class="row">
  <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Berita / Pengumuman Internal</h3>
        </div>
        <div class="box-body">
          <ul class="list-unstyled">
            @foreach($berita as $new)
            <li>
              <h4>
                <a href="#" data-toggle="modal" data-target="#edit_modal{{$new->id}}" ><b>{{$new->title}}</b></a> <span class="badge {{$new->status == 0 ? 'bg-green' : 'bg-red' }}">{{$new->status_text}}</span><br>
                <span class="small">Oleh : <b>{{$new->user->name}}</b> - {{date('Y-m-d H:i',strtotime($new->created_at))}}</span>
              </h4>
              <hr>
            </li>
            <div class="modal fade" id="edit_modal{{$new->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-name" id="myModalLabel">{{$new->title}}</h4><br>
                <small>Oleh: <b>{{$new->user->name}}</b> | Dibuat: {{date('Y-m-d H:i',strtotime($new->created_at))}}</small> |
                       @if ($new->status == '0')
                 <span class="label label-success"><b>BIASA</b></span>
                 @elseif ($new->status == '1')
                 <span class="label label-danger"><b>PENTING</b></span>
                 @else
                 <span class="label label-danger">test</span>
                 @endif
              </div>
               <div class="modal-body">
                <p>{{$new->isi_berita}}</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
            @endforeach
          </ul>
          <a href="" class="btn btn-primary btn-sm pull-right">Lihat Semua </a>
        </div>
      </div>
    </div>
    
</div>
        </section>

@endsection