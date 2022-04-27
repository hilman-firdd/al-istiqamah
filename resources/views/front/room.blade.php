@include('layouts_front.html_header')
<main>

    <!-- slider Area Start-->
    <div class="slider-area">
        <div class="single-slider hero-overly slider-height2 d-flex align-items-center"
            data-background="{{asset('img/vip/fasilitasvip.jpg') }}" style="background-size:cover;">
            <div class="container">
                <div class="row ">
                    <div class="col-md-11 offset-xl-1 offset-lg-1 offset-md-1">
                        <div class="hero-caption">
                            <span>Fasilitas</span>
                            <h2>Ruang dan Kelas Hotel</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->

    <!-- Room Start -->
    <section class="room-area r-padding1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <!--font-back-tittle  -->
                    <div class="font-back-tittle mb-45">
                        <div class="archivment-front">
                            <h3>Kamar</h3>
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
        </div>

    </section>
    <!-- Room End -->

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