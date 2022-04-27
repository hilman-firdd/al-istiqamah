@include('layouts_front.html_header')
<main>

    <!-- slider Area Start-->
    <div class="slider-area">
        <div class="single-slider hero-overly slider-height2 d-flex align-items-center"
            data-background="{{asset('img/rm/rm2.jpg') }}" style="background-size:cover;">
            <div class=" container">
                <div class="row ">
                    <div class="col-md-11 offset-xl-1 offset-lg-1 offset-md-1">
                        <div class="hero-caption">
                            <span>Fasilitas</span>
                            <h2>Ruang Makan</h2>
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
                            <h3>Ruang Makan</h3>
                        </div>
                        <h3 class="archivment-back">Sajian Hotel</h3>
                    </div>
                </div>
            </div>

            <!-- Gallery img Start-->
            <div class="gallery-area fix">
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="gallery-active owl-carousel">
                                <div class="gallery-img">
                                    <a href="#"><img src="{{ asset('img/rm/rm1.jpg') }}" alt=""></a>
                                </div>
                                <div class="gallery-img">
                                    <a href="#"><img src="{{ asset('img/rm/rm2.jpg') }}" alt=""></a>
                                </div>
                                <div class="gallery-img">
                                    <a href="#"><img src="{{ asset('img/rm/rm3.jpg') }}" alt=""></a>
                                </div>
                                <div class="gallery-img">
                                    <a href="#"><img src="{{ asset('img/rm/rm4.jpg') }}" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Gallery img End-->
        </div>

    </section>
    <!-- Room End -->


</main>

@include('layouts_front.footer_script')