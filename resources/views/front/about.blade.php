@include('layouts_front.html_header')
<main>

    <!-- slider Area Start-->
    <div class="slider-area">
        <div class="single-slider hero-overly slider-height2 d-flex align-items-center"
            data-background="{{ asset('img/wajah/bangunan1.jpg')}}"
            style="background-size:cover;">
            <div class="container">
                <div class="row ">
                    <div class="col-md-11 offset-xl-1 offset-lg-1 offset-md-1">
                        <div class="hero-caption">
                            <span>About</span>
                            <h2>Tentang Kami</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->

    <!-- Make customer Start-->
    <section class="make-customer-area customar-padding fix">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-xl-5 col-lg-6">
                    <div class="customer-img mb-120">
                        <img src="{{ asset('img/wajah/depan.jpg') }}" class="customar-img1" alt="">
                        <img src="{{ asset('img/wajah/bangunan.jpg') }}" class="customar-img2" alt="">
                        <div class="service-experience heartbeat">
                            <h3>25 Years of Service<br>Experience</h3>
                        </div>
                    </div>
                </div>
                <div class=" col-xl-4 col-lg-4">
                    <div class="customer-caption">
                        <span>About our company</span>
                        <h2>Make the customer the hero of your story</h2>
                        <div class="caption-details">
                            <p class="pera-dtails">Lorem ipsum dolor sit amet, consectetur adipisic- ing elit, sed
                                do eiusmod tempor inc. </p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Make customer End-->


    <!-- Gallery img Start-->
    <div class="gallery-area g-padding fix">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-md-12">
                    <div class="gallery-active owl-carousel">
                        <div class="gallery-img">
                            <a href="#"><img src="{{ asset('img/delux/deluxedoubel.jpg') }}" alt=""></a>
                        </div>
                        <div class="gallery-img">
                            <a href="#"><img src="{{ asset('img/vip/vipsingel.jpg') }}" alt=""></a>
                        </div>
                        <div class="gallery-img">
                            <a href="#"><img src="{{ asset('img/superior/kamarsuperior.jpg') }}" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Gallery img End-->

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

</main>
@include('layouts_front.footer_script')