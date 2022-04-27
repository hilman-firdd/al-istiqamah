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
                            <span>Booking</span>
                            <h2>Reservasi Kamar</h2>
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
                    <form action="{{ route('front.book') }}">
                        <div class="booking-wrap d-flex justify-content-between align-items-center">

                            <!-- select in date -->
                            <div class="single-select-box mb-30">
                                <!-- select out date -->
                                <div class="boking-tittle">
                                    <span> Check In Date:</span>
                                </div>
                                <div class="boking-datepicker">
                                    <input id="datepicker1" autocomplete="off" required name="checkInDate" value="{{ request('checkInDate') }}" placeholder="01/01/2022" />
                                </div>
                            </div>
                            <!-- Single Select Box -->
                            <div class="single-select-box mb-30">
                                <!-- select out date -->
                                <div class="boking-tittle">
                                    <span>Check Out Date:</span>
                                </div>
                                <div class="boking-datepicker">
                                    <input id="datepicker2" autocomplete="off" required name="checkOutDate" value="{{ request('checkOutDate') }}" placeholder="02/01/2022" />
                                </div>
                            </div>
                            <!-- Single Select Box -->
                            <div class="single-select-box mb-30">
                                <div class="boking-tittle">
                                    <span>Dewasa:</span>
                                </div>
                                <div class="select-this">
                                  <div class="select-itms">
                                      <select name="dewasa" id="select1">
                                          <option {{ request('dewasa') == '1' ? 'selected':'' }} value="1">1</option>
                                          <option {{ request('dewasa') == '2' ? 'selected':'' }} value="2">2</option>
                                          <option {{ request('dewasa') == '3' ? 'selected':'' }} value="3">3</option>
                                          <option {{ request('dewasa') == '4' ? 'selected':'' }} value="4">4</option>
                                      </select>
                                  </div>
                                </div>
                            </div>
                            <!-- Single Select Box -->
                            <div class="single-select-box mb-30">
                                <div class="boking-tittle">
                                    <span>Anak-anak:</span>
                                </div>
                                <div class="select-this">
                                    <div class="select-itms">
                                        <select name="anak" id="select2">
                                            <option {{ request('anak') == '1' ? 'selected':'' }} value="1">1</option>
                                            <option {{ request('anak') == '2' ? 'selected':'' }} value="2">2</option>
                                            <option {{ request('anak') == '3' ? 'selected':'' }} value="3">3</option>
                                            <option {{ request('anak') == '4' ? 'selected':'' }} value="4">4</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Select Box -->
                            <div class="single-select-box mb-30">
                                <div class="boking-tittle">
                                    <span>Kelas Kamar:</span>
                                </div>
                                <div class="select-this">
                                  <div class="select-itms">
                                      <select name="kamar" required id="select3">
                                        @foreach($kamarType as $data)
                                          <option {{ request('kamar') == $data->id ? 'selected':'' }} value="{{ $data->id }}">{{ $data->nama }}</option>
                                        @endforeach
                                      </select>
                                  </div>
                                </div>
                            </div>
                            <!-- Single Select Box -->
                            <div class="single-select-box mb-30">
                                <div class="boking-tittle">
                                    <span>Lantai:</span>
                                </div>
                                <div class="select-this">
                                    <div class="select-itms">
                                        <select name="lantai" id="select3">
                                          @foreach($lantai as $data)
                                            <option {{ request('lantai') == $data->id ? 'selected':'' }} value="{{ $data->id }}">{{ $data->nama }}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Select Box -->
                            <div class="single-select-box pt-45 mb-30">
                              <button type="submit" class="btn select-btn">Cari Kamar</button>
                            </div>


                        </div>
                    </form>

                    <br>

                    @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Gagal!</strong> {{ session('error')}}.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Booking Room End-->

    @if($kamar != null)
    <section class="container my-5">
      <div class="card">
        <div class="card-body">
          <div class="row">
            @foreach($kamar as $data)
              <div class="col-md-3 col-6">
                <div class="card mb-3">
                  <div class="card-body">
                    <h5 class="card-title">{{ $data->nomor_kamar }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{$data->typekamar->nama}}</h6>
                    <p class="card-text">{{$data->lantais->nama}}</p>
                    <p class="card-text">{{$data->typekamar->harga_malam_format}} / Malam</p>
                    <a href="{{ route('front.book.id', $data->id) }}?checkInDate={{ request('checkInDate') }}&checkOutDate={{ request('checkOutDate') }}&dewasa={{ request('dewasa') }}&anak={{ request('anak') }}&kamar={{ request('kamar') }}&lantai={{ request('lantai') }}" class="btn btn-sm btn-info">Pilih Kamar</a>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </section>
    @endif

</main>
@include('layouts_front.footer_script')