@extends('Admin.layouts.app')
@section('content')
<section class="content-header">
	<h1>Data User</h1>
</section>

<section class="content">
<div class="row" id="user">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <button class="btn btn-info" data-toggle="modal" data-target="#tambah-data">Tambah  User</button>
             
            </div>
            <!-- /.box-header -->
           <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="text-center">Nama  User</th>
                  <th class="text-center">Batasan Akses</th>
                  <th class="text-center">Jabatan</th>
                  <th class="text-center">Email</th>
                  <th class="text-center">Active</th>
                  <th class="text-center">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $dt)
                <tr>
                  <td class="text-center">{{ $dt->name}}</td>
                  <td class="text-center">{{ $dt->levels->nama}}</td>
                  <td class="text-center">{{ $dt->jabatan}}</td>
                  <td class="text-center">{{ $dt->email}}</td>
                    <td align="center">
                {!!$dt->active?"<i  style='color:green' class='fa fa-check'></i>":"<i style='color: red'
                 class=' fa fa-close'></i>"!!}
            </td>
                  <td class="text-center" style="white-space: nowrap;">
                   <a href="" type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#edit_modal{{$dt->id}}"> <i class="fa fa-edit"></i> Edit</a>
					 <a href="" type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete_modal{{$dt->id}}"><i class="fa fa-trash"></i> Hapus</a>
                  </td>
                </tr>
                 <div class="modal fade" tabindex="-1" role="dialog" id="delete_modal{{$dt->id}}">
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
                                   <form class="form-horizontal" method="POST" action="{{url('admin/user/'.$dt->id) }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input name="_method" type="hidden" value="DELETE">
                                     <button type="reset" class="btn btn-grey">Cancel</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </div>
                                </form>
                              </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                          </div><!-- /.modal -->



           <div class="modal fade" id="edit_modal{{$dt->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form method="POST" action="{{url('admin/user/update/'.$dt->id)}}" enctype="multipart/form-data">
                            {{ csrf_field() }} 

              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-name" id="myModalLabel">Edit Data {{ $dt->name}}</h4>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Nama User</label>
                      <div class="row">
                        <div class="col-sm-6">
                        	 <input type="hidden" name="id" value="{{$dt->id}}">
                         <input class="form-control" name="name" placeholder="Nama Pengguna" value="{{ $dt->name}}">
                        
                        </div>
                        <div class="col-sm-6">
                          <input class="form-control" name="username" placeholder="Username"  value="{{ $dt->username}}" disabled>
                         
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Batasan Akses</label>
                      <div class="row">
                        <div class="col-sm-6">
                          <select class="form-control" name="level">
                            <option value="{{$dt->level}}" >{{$dt->levels->nama}}</option>
                                   @foreach($level as $key=>$role)
                            <option value="{{$key}}">{{$role}}</option>
                            @endforeach
                          </select>
                           
                        </div>
                        <div class="col-sm-6">
                          <input type="password" class="form-control" name="password" placeholder="Password">
                          
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Jabatan</label>
                      <div class="row">
                        <div class="col-sm-12">
                          <input class="form-control" name="jabatan" value="{{ $dt->jabatan}}">
                       
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <div class="row">
                       
                        <div class="col-sm-6">
                          <label>Email</label>
                          <input type="email" class="form-control" name="email" value="{{ $dt->email}}">
                           </div>
                         <div class="col-sm-6">
                          <label>Active</label>
                           <input type="hidden" name="active" value=0>
                           <input type="checkbox" name="active" @if($dt->active) checked @endif value="1" >
                          
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
             <form method="POST" action="{{url('admin/user/store')}}" enctype="multipart/form-data">
				{{ csrf_field() }} 

              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-name" id="myModalLabel">Tambah Data</h4>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Nama User</label>
                      <div class="row">
                        <div class="col-sm-6">
                         <input class="form-control" name="name" placeholder="Nama Pengguna"  v-model="dataBaru.name">
                         
                        </div>
                        <div class="col-sm-6">
                          <input class="form-control" name="username" placeholder="Username"  v-model="dataBaru.username">
                         
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Batasan Akses</label>
                      <div class="row">
                        <div class="col-sm-6">
                          <select class="form-control" name="level">
                            <option value="0" >Pilih Level</option>
                           
                            @foreach($level as $key=>$role)
                            <option value="{{$key}}">{{$role}}</option>
                            @endforeach
                          
                          </select>
                          
                        </div>
                        <div class="col-sm-6">
                          <input type="password" class="form-control" name="password" placeholder="Password">
                          
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Jabatan</label>
                      <div class="row">
                        <div class="col-sm-12">
                          <input class="form-control" name="jabatan">
                           
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <div class="row">
                       
                        <div class="col-sm-6">
                          <label>Email</label>
                          <input type="email" class="form-control" name="email">
                          
                        </div>
                        <div class="col-sm-6">
                          <label>Active</label>
                          <input type="hidden" name="active" value=0>
                        	<input type="checkbox" name="active" value=1>
                          
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
        


      </div>
</section>
@endsection
