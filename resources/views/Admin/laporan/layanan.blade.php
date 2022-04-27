<style>
  .page-break {
    page-break-after: always;
  }
</style>

<style type="text/css">

  #print {
    margin:auto;
    /text-align:center;/
    font-size:15px;
  /*  size: all;
    height: 800px;
    width: 1024px;
    -webkit-transform: rotate(-90deg); 
     -moz-transform:rotate(-90deg);
     filter:progid:DXImageTransform.Microsoft.BasicImage(rotation=3)*/;
   }

   table {
    width:  100%; 
    border-collapse: collapse;
  }

  thead {
    display: table-header-group;
    border-collapse: unset;
  }

  th {
    text-align: center;
    font-size: 12px;
  }

  td {
    text-align: left;
    padding: 2px 5px 2px 5px;
    font-size: 12px;
  }

  .cen{
    text-align: center;
  }

</style>
<div id="print">
  <h4 align="center" style="font-size: 12px;"> <br>
  </h4>
  @foreach($perusahaan as $dt)
  <h4 align="center" class="page-header">
   Laporan Penggunaan Kamar {{$dt->nama_hotel}}
   <h6>{{$dt->alamat_jalan}}, {{$dt->alamat_kabupaten}}, {{$dt->alamat_provinsi}}
     <br><b>Telp :</b> {{$dt->nomor_telp}} -  <b>Fax :</b> {{$dt->nomor_fax}} -  <b>Email :</b> {{$dt->email}}        <br><b>{{$dt->website}}</b></h6>
   </h4>
   @endforeach
   <div style="overflow-x:auto;">
     <table width='70%' border="1">
      <tr>
       <th>Tanggal / Waktu</th>
       <th>Operator</th>
       <th>Nomor Kamar</th>
       <th>Produk / Layanan</th>
       <th>Harga Satuan</th>
       <th>Jumlah</th>
       <th>Total</th>
     </tr>
     @foreach ($data as $key => $v)
     <tr> 
       <td>{{$v->created_at}}</td>
       <td>{{$v->user->name}}</td>
       <td>{{$v->transaksikamar->kamar->nomor_kamar}}</td>
       <td>{{$v->layanan->nama_layanan}}</td>
       <td>{{$v->layanan->harga_format}}</td>
       <td>{{$v->jumlah}}</td>
       <td>{{$v->total}}</td>

     </tr>
     @endforeach
     <tfoot>
      <tr>
        <td colspan="7"><span class="lead">Total Pendapatan : <b>{{$total}}</b></span></td>
      </tr>
    </tfoot>

  </table>

</div>
</div>