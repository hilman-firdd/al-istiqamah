@include('layouts_front.html_header')
<main>

    <!-- slider Area Start-->
    <div class="slider-area ">
        <!-- Mobile Menu -->
        <div class="slider-active dot-style">
            <div class="single-slider hero-overly slider-height d-flex align-items-center"
                data-background="{{ asset('img/slider/bangunan1.jpg')}}" style="background-size:cover;">
                <div class="container">
                    <div class="row justify-content-center text-center">
                        <div class="col-xl-9">
                            <div class="h1-slider-caption">
                                <h1 data-animation="fadeInUp" data-delay=".4s">Selamat datang di
                                </h1>
                                <h3 data-animation="fadeInDown" data-delay=".4s">Hotel Al-Istiqamah</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-slider  hero-overly slider-height d-flex align-items-center"
                data-background="{{ asset('img/slider/ruangmakan.jpg')}}" style="background-size:cover;">
                <div class="container">
                    <div class="row justify-content-center text-center">
                        <div class="col-xl-9">
                            <div class="h1-slider-caption">
                                <h1 data-animation="fadeInUp" data-delay=".4s">Kenyamanan Pengunjung adalah
                                    Prioritas Kami</h1>
                                <h3 data-animation="fadeInDown" data-delay=".4s">Hotel Al-Istiqamah</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->

    <!-- Booking Room Start-->
    <div class="booking-area">
        <div class="container">
            <div class="row ">
                <div class="col-12">
                    <form action="">
                        <div class="booking-wrap d-flex justify-content-between align-items-center">

                            <!-- select in date -->
                            <div class="single-select-box mb-30">
                                <!-- select out date -->
                                <div class="boking-tittle">
                                    <span> Check In Date:</span>
                                </div>
                                <div class="boking-datepicker">
                                    <input id="datepicker1" placeholder="10/12/2020" />
                                </div>
                            </div>
                            <!-- Single Select Box -->
                            <div class="single-select-box mb-30">
                                <!-- select out date -->
                                <div class="boking-tittle">
                                    <span>Check Out Date:</span>
                                </div>
                                <div class="boking-datepicker">
                                    <input id="datepicker2" placeholder="12/12/2020" />
                                </div>
                            </div>
                            <!-- Single Select Box -->
                            <div class="single-select-box mb-30">
                                <div class="boking-tittle">
                                    <span>Dewasa:</span>
                                </div>
                                <div class="select-this">
                                    <form action="#">
                                        <div class="select-itms">
                                            <select name="select" id="select1">
                                                <option value="">1</option>
                                                <option value="">2</option>
                                                <option value="">3</option>
                                                <option value="">4</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- Single Select Box -->
                            <div class="single-select-box mb-30">
                                <div class="boking-tittle">
                                    <span>Anak-anak:</span>
                                </div>
                                <div class="select-this">
                                    <form action="#">
                                        <div class="select-itms">
                                            <select name="select" id="select2">
                                                <option value="">1</option>
                                                <option value="">2</option>
                                                <option value="">3</option>
                                                <option value="">4</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- Single Select Box -->
                            <div class="single-select-box mb-30">
                                <div class="boking-tittle">
                                    <span>Kelas Kamar:</span>
                                </div>
                                <div class="select-this">
                                    <form action="#">
                                        <div class="select-itms">
                                            <select name="select" id="select3">
                                                <option value="">VIP</option>
                                                <option value="">Deluxe</option>
                                                <option value="">Superior</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- Single Select Box -->
                            <div class="single-select-box mb-30">
                                <div class="boking-tittle">
                                    <span>Lantai:</span>
                                </div>
                                <div class="select-this">
                                    <form action="#">
                                        <div class="select-itms">
                                            <select name="select" id="select3">
                                                <option value="">1</option>
                                                <option value="">2</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- Single Select Box -->
                            <div class="single-select-box pt-45 mb-30">
                                <a href="#" class="btn select-btn">Book Now</a>
                            </div>


                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Booking Room End-->

    <!-- Make customer Start-->
    <section class="make-customer-area customar-padding fix">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-xl-5 col-lg-6">
                    <div class="customer-img mb-120">
                        <img src="{{ asset('img/wajah/depan.jpg') }}" class="customar-img1" alt="">
                        <img src="{{ asset('img/wajah/bangunan.jpg') }}" class="customar-img2" alt="">
                        <div class="service-experience heartbeat">
                            <h3>Tempat yang tenang dan nyaman<br>Bagi Keluarga.</h3>
                        </div>
                    </div>
                </div>
                <div class=" col-xl-4 col-lg-4">
                    <div class="customer-caption">
                        <span>Profil Singkat Al-Istiqamah Hotel</span>
                        <div class="caption-details">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.
                            </p>
                            <a href="#" class="btn more-btn1">Lebih Lanjut <i class="ti-angle-right"></i> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Make customer End-->

    <!-- Room Start -->
    <section class="room-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <!--font-back-tittle  -->
                    <div class="font-back-tittle mb-45">
                        <div class="archivment-front">
                            <h3>Kamar Tersedia</h3>
                        </div>
                        <h3 class="archivment-back">Our Rooms</h3>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <!-- Single Room -->
                    <div class="single-room mb-50">
                        <div class="room-img">
                            <a href="rooms.html"><img src="{{ asset('img/superior/kamarsuperior.jpg') }}" alt=""></a>
                        </div>
                        <div class="room-caption">
                            <h3><a href="rooms.html">Kelas Superior</a></h3>
                            <div class="per-night">
                                <span>Harga mulai dari <span><br>350.000.-/ Malam</span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <!-- Single Room -->
                    <div class="single-room mb-50">
                        <div class="room-img">
                            <a href="rooms.html"><img src="{{ asset('img/delux/deluxedoubel.jpg')}}" alt=""></a>
                        </div>
                        <div class="room-caption">
                            <h3><a href="rooms.html">Kelas Deluxe</a></h3>
                            <div class="per-night">
                                <span>Harga mulai dari <span><br>435.000.-/ Malam</span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <!-- Single Room -->
                    <div class="single-room mb-50">
                        <div class="room-img">
                            <a href="rooms.html"> <img src="{{ asset('img/vip/vip3.jpg') }}" alt=""></a>
                        </div>
                        <div class="room-caption">
                            <h3><a href="rooms.html">Kamar VIP</a></h3>
                            <div class="per-night">
                                <span>Harga mulai dari <span><br>495.000.-/ Malam</span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="room-btn pt-70">
                    <a href="{{ url('/room') }}" class="btn view-btn1">Lebih Lanjut <i class="ti-angle-right"></i> </a>
                </div>
            </div>
        </div>

    </section>
    <!-- Room End -->

    <!-- Dining Start -->
    <div class="dining-area dining-padding-top">
        <!-- Single Left img -->
        <div class="single-dining-area left-img">
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-lg-8 col-md-8">
                        <div class="dining-caption">
                            <span>Tempat yang begitu nyaman</span>
                            <h3>Strategis dan Menyenangkan bagi Keluarga</h3>
                            <p>Cukup dengan merogoh kocek mulai dari Rp350.000, Anda sudah bisa mendapat penginapan
                                dengan kualitas mantap tapi harga bersahabat.
                                Hotel ini cocok bagi wisatawan yang ingin jalan-jalan. </p>
                            <a href="{{ url('/kamar')}}" class="btn border-btn">Temukan Kamar Disini<i
                                    class="ti-angle-right"></i> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- single Right img -->
        <div class="single-dining-area right-img">
            <div class="container">
                <div class="row justify-content-start">
                    <div class="col-lg-8 col-md-8">
                        <div class="dining-caption text-right">
                            <span>Ruang Makan</span>
                            <h3>Al-Istiqamah Hotel Menyediakan Makanan yang Enak dan Higenis</h3>
                            <p>Tidak hanya hidangan yang disajikan, tetap juga layanan pribadi, serta kualitas hidangan
                                dan penyajiannya.</p>
                            <a href="{{ url('/ruangMakan')}}" class="btn border-btn">Lebih Lanjut <i
                                    class="ti-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Dining End -->

    <!-- Testimonial Start -->
    <div class="testimonial-area testimonial-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-9 col-lg-9 col-md-9">
                    <div class="h1-testimonial-active">
                        <!-- Single Testimonial -->
                        <div class="single-testimonial pt-65">
                            <!-- Testimonial tittle -->
                            <div class="font-back-tittle mb-105">
                                <div class="archivment-front">
                                    <img src="{{asset('front/img/logo/testimonial.png') }}" alt="">
                                </div>
                                <h3 class="archivment-back">Testimonial</h3>
                            </div>
                            <!-- Testimonial Content -->
                            <div class="testimonial-caption text-center">
                                <p>Yorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                    nostrud exercitation ullamco laboris nisi.
                                </p>
                                <!-- Rattion -->
                                <div class="testimonial-ratting">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="rattiong-caption">
                                    <span>Clifford Frazier, <span>Regular Client</span> </span>
                                </div>
                            </div>
                        </div>
                        <!-- Single Testimonial -->
                        <div class="single-testimonial  pt-65">
                            <!-- Testimonial tittle -->
                            <div class="font-back-tittle mb-105">
                                <div class="archivment-front">
                                    <img src="{{asset('front/img/logo/testimonial.png')}}" alt="">
                                </div>
                                <h3 class="archivment-back">Testimonial</h3>
                            </div>
                            <!-- Testimonial Content -->
                            <div class="testimonial-caption text-center">
                                <p>Yorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                    nostrud exercitation ullamco laboris nisi.
                                </p>
                                <div class="testimonial-ratting">
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                </div>
                                <div class="rattiong-caption">
                                    <span>Clifford Frazier, <span>Regular Client</span> </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

    <!-- Gallery img Start-->
    <div class="gallery-area fix">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-md-12">
                    <div class="gallery-active owl-carousel">
                        <div class="gallery-img">
                            <a href="#"><img src="{{ asset('img/wajah/depan.jpg') }}" alt=""></a>
                        </div>
                        <div class="gallery-img">
                            <a href="#"><img src="{{ asset('img/wajah/blk.jpg') }}" alt=""></a>
                        </div>
                        <div class="gallery-img">
                            <a href="#"><img src="{{ asset('img/wajah/blk2.jpg') }}" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Gallery img End-->
</main>
@include('layouts_front.footer_script')