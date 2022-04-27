@extends('Admin.layouts.app')
@section('content')
<section class="content-header">
  <h1>
    Data Kamar
    <small>Admin panel</small>
  </h1>
 
</section>
<section class="content">
 <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <button class="btn btn-info" data-toggle="modal" data-target="#tambah-data">Tambah Kamar</button>
           
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                 <thead>
                <tr>
                
                  <th class="text-center">Tipe Kamar</th>
                  <th class="text-center">Harga / Malam</th>
               
                  <th class="text-center">Harga / Orang</th>
                  <th class="text-center">Aksi</th>
                </tr>
 </thead>
  <tbody>
        @foreach($data as $dt)
                <tr>
                  <td class="text-center">{{$dt->nama}}</td>
                  <td class="text-center">{{$dt->harga_malam_format}}</td>
                  <td class="text-center">{{$dt->harga_orang_format}}</td>
                
                 
                  
          <td class="text-center">
  <a href="" type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#edit_modal{{$dt->id}}"> <i class="fa fa-edit"></i> Edit</a>
          
             <a href="" type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete_modal{{$dt->id}}"><i class="fa fa-trash"></i> Hapus</a>
                            <!-- Social Modal -->
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
                                   <form class="form-horizontal" method="POST" action="{{url('admin/type-kamar/'.$dt->id) }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input name="_method" type="hidden" value="DELETE">
                                     <button type="reset" class="btn btn-grey">Cancel</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </div>
                                </form>
                              </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                          </div><!-- /.modal -->
        </td>
                </tr>
                <div class="modal fade" id="edit_modal{{$dt->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
                 
      
                          <form method="POST" action="{{url('admin/type-kamar/update/'.$dt->id)}}" enctype="multipart/form-data">
                            {{ csrf_field() }} 
                                  <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-name" id="myModalLabel">Update Data</h4>
              </div>
                <div class="modal-body">
                             <div class="form-group">
                  <label for="name">Nama Type Kamar:</label>
                   <input type="hidden" name="id" value="{{$dt->id}}">
                  <input type="text" name="nama" class="form-control" value="{{$dt->nama}}"/>
                
                </div>

                 <div class="form-group">
                  <label for="name">Harga / Malam:</label>
                  <input type="number" name="harga_malam" class="form-control" value="{{$dt->harga_malam}}" />
                 
                </div>
                 <div class="form-group">
                  <label for="name">Harga / Orang:</label>
                  <input type="number" name="harga_orang" class="form-control" value="{{$dt->harga_orang}}" />
                 
                </div>
                 <div class="form-group">
                  <label for="name">Keterangan:</label>
                  <textarea class="form-control" name="keterangan" rows="10">{{$dt->keterangan}}</textarea>
                  
                </div>
                             
                                </div>
                           
                      <div class="modal-footer">
                        <button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                      </div>
                      </form>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                 @endforeach
                 </tbody>
              </table>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        
         <div class="modal fade" id="tambah-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
               <form method="POST" action="{{url('admin/type-kamar/store')}}" enctype="multipart/form-data">
        {{ csrf_field() }} 
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-name" id="myModalLabel">Tambah Data</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label for="name">Nama Type Kamar:</label>
                  <input type="text" name="nama" class="form-control"/>
                
                </div>
                 <div class="form-group">
                  <label for="name">Harga / Malam:</label>
                  <input type="number" name="harga_malam" class="form-control"/>
                 
                </div>
              <div class="form-group">
                  <label for="name">Harga / Orang:</label>
                  <input type="number" name="harga_orang" class="form-control"/>
                 
                </div>
                 <div class="form-group">
                  <label for="name">Keterangan:</label>
                  <textarea class="form-control" name="keterangan"></textarea>
                  
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


       
</section>


@endsection