<style>
  .page-break {
    page-break-after: always;
  }
</style>
<style type="text/css">
  #print {
    margin: auto;
    /text-align: center;/ font-size: 15px;
    /*  size: all;
    height: 800px;
    width: 1024px;
    -webkit-transform: rotate(-90deg); 
     -moz-transform:rotate(-90deg);
     filter:progid:DXImageTransform.Microsoft.BasicImage(rotation=3)*/
    ;
  }

  table {
    width: 100%;
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

  .cen {
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
      <br><b>Telp :</b> {{$dt->nomor_telp}} - <b>Fax :</b> {{$dt->nomor_fax}} - <b>Email :</b> {{$dt->email}}
      <br><b>{{$dt->website}}</b>
    </h6>
  </h4>
  <h6>
  </h6>
  @endforeach
  <div style="overflow-x:auto;">
    <table width='70%' border="1">
      <tr>
        <th>Tanggal Transaksi</th>
        <th>Nomor Invoice</th>
        <th>Nomor Kamar</th>
        <th>Type Kamar</th>
        <th>Harga</th>
        <th>Deposit</th>
        <th>Total Biaya Kamar</th>
      </tr>
      @foreach ($data as $key => $v)
      <tr>
        <td>{{$v->created_at}}</td>
        <td>{{$v->invoice_id}}</td>
        <td>{{$v->kamar->nomor_kamar}}</td>
        <td>{{$v->kamar->typekamar->nama}}</td>
        <td>Rp. {{number_format($v->kamar->typekamar->harga_malam)}}</td>
        <td>{{$v->deposit}}</td>
        <td>{{$v->total_biaya_format}}</td>
      </tr>
      <tfoot>
        <tr>
          <td colspan="7"><span class="lead">Total Pendapatan : <b>{{$total}}</b></span></td>
        </tr>
      </tfoot>
      @endforeach
    </table>
  </div>
</div>