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
      <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th class="text-center">#Kamar</th>
              <th class="text-center">Tipe Kamar</th>
              <th class="text-center">Lantai</th>
              <th class="text-center">Harga / Malam</th>
              <th class="text-center">Max Dewasa</th>
              <th class="text-center">Max Anak-Anak</th>
              <th class="text-center">Status</th>
              <th class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $dt)
            <tr>
              <td class="text-center">{{$dt->nomor_kamar}}</td>
              <td class="text-center">{{$dt->typekamar->nama}}</td>
              <td class="text-center">{{$dt->lantais->nama}}</td>
              <td class="text-center">{{$dt->typekamar->harga_malam_format}}</td>
              <td class="text-center">{{$dt->max_dewasa}}</td>
              <td class="text-center">{{$dt->max_anak}}</td>
              <td>
               @if ($dt->status === '0')
               <span class="label label-success"><b>KOSONG</b></span>
               @elseif ($dt->status === '2')
               <span class="label label-warning"><b>KOTOR</b></span>
               @else
               <span class="label label-danger">TERPAKAI</span>
               @endif

               
             </td>
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
             
              
              <form method="POST" action="{{url('admin/kamar/update/'.$dt->id)}}" enctype="multipart/form-data">
                {{ csrf_field() }} 
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-name" id="myModalLabel">Update Data</h4>
                </div>
                <div class="modal-body">
                 <div class="form-group">
                  <label for="name">Nomor Kamar:</label>
                  <input type="hidden" name="id" value="{{$dt->id}}">
                  <input type="text" name="nomor_kamar" class="form-control" value="{{$dt->nomor_kamar}}"/>
                  
                </div>

                <div class="form-group">
                  <label for="name">Type Kamar:</label>
                  <select class="form-control" name="type_id">
                    <option selected value="{{$dt->type_id}}">{{$dt->typekamar->nama}}</option>
                    @foreach($kamar_type as $key=>$type)
                    <option value="{{$key}}">{{$type}}</option>
                    @endforeach
                  </select>
                  
                </div>
                <div class="form-group">
                  <label for="name">Lantai:</label>
                  <select class="form-control" name="lantai_id">
                    <option selected value="{{$dt->lantai_id}}">{{$dt->lantais->nama}}</option>
                    @foreach($lantais as $key=>$type)
                    <option value="{{$key}}">{{$type}}</option>
                    @endforeach
                  </select>
                  
                </div>
                <div class="form-group">
                  <label for="name">Maximal Orang Dewasa:</label>
                  <select class="form-control" name="max_dewasa">
                   <option selected value="{{$dt->max_dewasa}}">{{$dt->max_dewasa}}</option>
                   <option value="1">1 Orang</option>
                   <option value="2">2 Orang</option>
                   <option value="3">3 Orang</option>
                   <option value="4">4 Orang</option>
                   <option value="5">5 Orang</option>
                 </select>
                 
               </div>
               <div class="form-group">
                <label for="name">Maximal Anak Anak:</label>
                <select class="form-control" name="max_anak">
                 <option selected value="{{$dt->max_anak}}">{{$dt->max_anak}}</option>
                 <option value="1">1 Orang</option>
                 <option value="2">2 Orang</option>
                 <option value="3">3 Orang</option>
                 <option value="4">4 Orang</option>
                 <option value="5">5 Orang</option>
               </select>
               
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
     <form method="POST" action="{{url('admin/kamar/store')}}" enctype="multipart/form-data">
      {{ csrf_field() }} 
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-name" id="myModalLabel">Tambah Data</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="name">Nomor Kamar:</label>
          <input type="text" name="nomor_kamar" class="form-control"/>
          
        </div>
        <div class="form-group">
          <label for="name">Type Kamar:</label>
          <select class="form-control" name="type_id">
            <option selected value="0">Pilih Type</option>
            @foreach($kamar_type as $key=>$type)
            <option value="{{$key}}">{{$type}}</option>
            @endforeach
          </select>
          
        </div>
        <div class="form-group">
          <label for="name">Lantai:</label>
          <select class="form-control" name="lantai_id">
            <option selected value="0">Pilih Lantai</option>
            @foreach($lantais as $key=>$type)
            <option value="{{$key}}">{{$type}}</option>
            @endforeach
          </select>
          
        </div>
        <div class="form-group">
          <label for="name">Maximal Orang Dewasa:</label>
          <select class="form-control" name="max_dewasa">
            <option selected value="0">Pilih</option>
            <option value="1">1 Orang</option>
            <option value="2">2 Orang</option>
            <option value="3">3 Orang</option>
            <option value="4">4 Orang</option>
            <option value="5">5 Orang</option>
          </select>
          
        </div>
        <div class="form-group">
          <label for="name">Maximal Anak Anak:</label>
          <select class="form-control" name="max_anak">
            <option selected value="0">Pilih</option>
            <option value="1">1 Orang</option>
            <option value="2">2 Orang</option>
            <option value="3">3 Orang</option>
            <option value="4">4 Orang</option>
            <option value="5">5 Orang</option>
          </select>
          
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