<ul class="sidebar-menu" data-widget="tree" id="nav">

  <li class="header">MAIN NAVIGATION</li>

<li>
    <a href="{{url('admin/dashboard')}}">
      <i class="fa fa-dashboard"></i> <span>Dashboard</span>
    </a>
  </li>
  <li class="treeview">
    <a href="">
      <i class="fa fa-th"></i> <span>Reservasi / Booking</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">

      <li><a href="{{url('admin/checkin')}}"><i class="fa fa-circle-o"></i> Check In</a></li>

      <li><a href="{{url('admin/checkout')}}"><i class="fa fa-circle-o"></i> Check Out</a></li>

      <li><a href="{{url('admin/checkin/listcheckin')}}"><i class="fa fa-circle-o"></i> List Checkin</a></li>

    </ul>
  </li>

  <li class="treeview">
    <a href="">
      <i class="fa fa-book"></i> <span>Room Service</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">

      <li><a href="{{url('admin/transaksi-layanan')}}"><i class="fa fa-circle-o"></i> Pesan Layanan</a></li>

      <li><a href="{{url('admin/transaksi-layanan/create')}}"><i class="fa fa-circle-o"></i> Pembersihan Kamar</a></li>


    </ul>
  </li>



  <li class="treeview">
    <a href="#">
      <i class="fa fa-bed"></i> <span>Kamar</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="{{url('admin/kamar')}}"><i class="fa fa-circle-o"></i> Lihat Kamar</a></li>
      <li><a href="{{url('admin/type-kamar')}}"><i class="fa fa-circle-o"></i> Tipe Kamar</a></li>
      <li><a href="{{url('admin/lantai')}}"><i class="fa fa-circle-o"></i> Lantai</a></li>
    </ul>
  </li>
  <li class="treeview">
    <a href="#">
      <i class="fa fa-cutlery"></i> <span>Layanan</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="{{url('admin/layanan')}}"><i class="fa fa-circle-o"></i> Lihat Layanan</a></li>
      <li><a href="{{url('admin/kategori-layanan')}}"><i class="fa fa-circle-o"></i> Kategori Layanan</a></li>
    </ul>
  </li>

  <li class="treeview">
    <a href="#">
      <i class="fa fa-exchange"></i> <span>Laporan</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="{{url('admin/laporan/')}}"><i class="fa fa-circle-o"></i> Laporan Kamar</a></li>
    </ul>
  </li>

  <li><a href="{{url('admin/perusahaan')}}"><i class="fa fa-user"></i> <span>Perusahaan</span></a></li>
  <li><a href="{{url('admin/berita')}}"><i class="fa fa-newspaper-o"></i> <span>Berita</span></a></li>
    <li><a href="{{url('admin/tamu')}}"><i class="fa fa-suitcase"></i> <span>Buku Tamu</span></a></li>
  <li><a href="{{url('admin/user')}}"><i class="fa fa-user"></i> <span>User Manager</span></a></li>
</ul>