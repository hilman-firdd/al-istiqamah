@extends('Admin.layouts.app')
@section('content')
<section class="content-header">
	<h1>Daftar Tamu</h1>
</section>

<section class="content">
<div class="row" id="tamu">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <button class="btn btn-info" data-toggle="modal" data-target="#tambah-data">Tambah  Tamu</button>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped ">
                 <thead>
                <tr>
                  <th class="text-center">Nama  Tamu</th>
                  <th class="text-center">Warga Negara</th>
                  <th class="text-center">Telepon</th>
                  <th class="text-center">Email</th>
                  <th class="text-center">Aksi</th>
                </tr>
                 </thead>
            <tbody>
                 	@foreach($tamu as $guest)
                <tr>
                  <td class="text-center">{{$guest->nama}}</td>
                  <td class="text-center">{{$guest->warga_negara}}</td>
                  <td class="text-center">{{$guest->nomor_telp}}</td>
                  <td class="text-center">{{$guest->email}}</td>
                  <td style="white-space: nowrap;">
                  <a href="" type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#edit-data{{$guest->id}}"> <i class="fa fa-edit"></i> Edit</a>
				  <a href="" type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete_modal{{$guest->id}}"><i class="fa fa-trash"></i> Hapus</a>
                  </td>
                   <div class="modal fade" id="edit-data{{$guest->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="{{url('admin/tamu/update/'.$guest->id)}}" enctype="multipart/form-data">
                            {{ csrf_field() }} 

              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-name" id="myModalLabel">Edit Data {{$guest->title}} . {{$guest->nama}}</h4>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Nama Tamu</label>
                      <div class="row">
                        <div class="col-sm-3">
                            <input type="hidden" name="id" value="{{$guest->id}}">
                         <input class="form-control" name="title" placeholder="prefix"  value="{{$guest->title}}">
                       
                        </div>
                        <div class="col-sm-4">
                          <input class="form-control" name="nama" placeholder="Nama"  value="{{$guest->nama}}">
                          
                        </div>
                       
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Identitas</label>
                      <div class="row">
                        <div class="col-sm-3">
                          <select class="form-control" name="tipe_identitas">
                          	<option value="{{$guest->tipe_identitas}}">{{$guest->tipe_identitas}}</option>
                            <option value="KTP">KTP</option>
                            <option value="SIM">SIM</option>
                            <option value="PASSPORT">PASSPORT</option>
                          </select>
                         
                        </div>
                        <div class="col-sm-6">
                          <input class="form-control" name="nomor_identitas" placeholder="Nomor Identitas" value="{{$guest->nomor_identitas}}">
                          
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Warga Negara</label>
                      <div class="row">
                        <div class="col-sm-12">
                          <input class="form-control" name="warga_negara" value="{{$guest->warga_negara}}">
                         
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Alamat</label>
                      <textarea class="form-control" name="alamat_jalan" rows="10">{{$guest->alamat_jalan}}</textarea>
                      
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-sm-6">
                          <input class="form-control" name="alamat_kabupaten" placeholder="Kabupaten / Kota" value="{{$guest->alamat_kabupaten}}">
                         
                        </div>
                        <div class="col-sm-6">
                          <input class="form-control" name="alamat_provinsi" placeholder="Provinsi" value="{{$guest->alamat_provinsi}}">
                         
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-sm-6">
                          <label>Nomor Telp / Handphone</label>
                          <input class="form-control" name="nomor_telp" value="{{$guest->nomor_telp}}">
                         
                        </div>
                        <div class="col-sm-6">
                          <label>Email</label>
                          <input class="form-control" name="email" value="{{$guest->email}}">
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
              </form>
            </div>
          </div>
        </div>

                            <!-- Social Modal -->
                            <div class="modal fade" tabindex="-1" role="dialog" id="delete_modal{{$guest->id}}">
                            <div class="modal-dialog modal-sm" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  
                                </div>
                                <div class="modal-body text-center">
                                  <div class="row">
                                  
                                 <h4 class="modal-heading">Are You Sure?</h4>
                                    <p>Do you really want to delete these records? This process cannot be undone.</p>
                                          </div>
                                        </div>
                                <div class="modal-footer">
                                   <form class="form-horizontal" method="POST" action="{{url('admin/tamu/'.$guest->id) }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input name="_method" type="hidden" value="DELETE">
                                     <button type="reset" class="btn btn-grey">Cancel</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </div>
                                </form>
                              </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                          </div><!-- /.modal -->
                </tr>
                
                @endforeach
                  </tbody>
              </table>

        
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

        <!-- Modal Tambah Data -->
        <div class="modal fade" id="tambah-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
             <form method="POST" action="{{url('admin/tamu/store')}}" enctype="multipart/form-data">
				{{ csrf_field() }} 

              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-name" id="myModalLabel">Tambah Data</h4>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Nama Tamu</label>
                      <div class="row">
                        <div class="col-sm-3">
                         <input class="form-control" name="title" placeholder="Title">
                       
                        </div>
                        <div class="col-sm-4">
                          <input class="form-control" name="nama" placeholder="Nama">
                        
                        </div>
                      
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Identitas</label>
                      <div class="row">
                        <div class="col-sm-3">
                          <select class="form-control" name="tipe_identitas" v-model="dataBaru.tipe_identitas">
                            <option value="KTP">KTP</option>
                            <option value="KTP">SIM</option>
                            <option value="KTP">PASSPORT</option>
                          </select>
                        
                        </div>
                        <div class="col-sm-6">
                          <input class="form-control" name="nomor_identitas" placeholder="Nomor Identitas"  v-model="dataBaru.nomor_identitas">
                        
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Warga Negara</label>
                      <div class="row">
                        <div class="col-sm-12">
                          <input class="form-control" name="warga_negara" v-model="dataBaru.warga_negara">
                        
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Alamat</label>
                      <textarea class="form-control" name="alamat_jalan" v-model="dataBaru.alamat_jalan"></textarea>
                    
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-sm-6">
                          <input class="form-control" name="alamat_kabupaten" placeholder="Kabupaten / Kota" v-model="dataBaru.alamat_kabupaten">
                        
                        </div>
                        <div class="col-sm-6">
                          <input class="form-control" name="alamat_provinsi" placeholder="Provinsi" v-model="dataBaru.alamat_provinsi">
                         
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-sm-6">
                          <label>Nomor Telp / Handphone</label>
                          <input class="form-control" name="nomor_telp"  v-model="dataBaru.nomor_telp">
                         
                        </div>
                        <div class="col-sm-6">
                          <label>Email</label>
                          <input class="form-control" name="email" v-model="dataBaru.email">
                           
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
              </form>
            </div>
          </div>
        </div>

        <!-- Model Edit -->
       

        <div class="modal fade" id="hapus-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-name" id="myModalLabel">Hapus Data</h4>
              </div>
              <div class="modal-body">
                Yakin ingin menghapus data ?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">N O</button>
                <button type="submit" class="btn btn-primary" @click.prevent="hapuskonfirmtamu(hapus_id)">O K</button>
              </div>
            </div>
          </div>
        </div>

      </div>

</section>
@endsection
