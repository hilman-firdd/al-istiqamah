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

    <section class="container my-5">
      <div class="card">
        <div class="card-header">
          Booking Details {{ $no_invoice }}
          <input type="hidden" value="{{ $no_invoice }}" name="no_invoice">
          <input type="hidden" value="{{ $malam }}" name="malam">
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Kamar Nomor</label>
                <input type="text" readonly value="{{ $kamar->nomor_kamar }}" class="form-control" name="kamarNomor">
              </div>
              <div class="mb-3">
                <label class="form-label">Check In Date</label>
                <input type="text" readonly value="{{ \Carbon\Carbon::createFromFormat('m/d/Y', request('checkInDate'))->format('d M Y') }}" class="form-control" name="checkInDate">
              </div>
              <div class="mb-3">
                <label class="form-label">Check Out Date</label>
                <input type="text" readonly value="{{ \Carbon\Carbon::createFromFormat('m/d/Y', request('checkOutDate'))->format('d M Y') }}" class="form-control" name="checkOutDate">
              </div>
              <div class="mb-3">
                <label class="form-label">Dewasa</label>
                <input type="text" readonly value="{{ request('dewasa') }}" class="form-control" name="dewasa">
              </div>
              <div class="mb-3">
                <label class="form-label">Anak</label>
                <input type="text" readonly value="{{ request('anak') }}" class="form-control" name="anak">
              </div>
              <div class="mb-3">
                <label class="form-label">Kelas Kamar</label>
                <input type="text" readonly value="{{ $kamar->typekamar->nama }}" class="form-control">
                <input type="hidden" value="{{ request('kamar') }}" name="kamar">
              </div>
              <div class="mb-3">
                <label class="form-label">Lantai</label>
                <input type="text" readonly value="{{$kamar->lantais->nama}}" class="form-control">
                <input type="hidden" value="{{ request('lantai') }}" name="lantai">
              </div>
            </div>
            <div class="col-md-6">
              <table>
                <tr>
                  <td>Harga</td>
                  <td>:</td>
                  <td>Rp. {{number_format($kamar->type->harga_malam, 0)}} / Malam</td>
                </tr>
                <tr>
                  <td>Meninap</td>
                  <td>:</td>
                  <td>{{ $malam }} Malam</td>
                </tr>
                <tr>
                  <td colspan="3">
                    <hr>
                  </td>
                </tr>
                <tr>
                  <td>Total</td>
                  <td>:</td>
                  <td>Rp. {{ number_format($malam * $kamar->type->harga_malam, 0) }}</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="container my-5">
      <div class="card">
        <div class="card-header">Guest Detail</div>
        <form action="#" method="post">
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input required type="text" class="form-control" id="name" name="name">
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input required type="email" class="form-control" id="email" name="email">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="identity" class="form-label">Identity</label>
                  <select id="identity" name="identity" class="form-select">
                    <option value="KTP">KTP</option>
                    <option value="SIM">SIM</option>
                    <option value="PASSPORT">PASSPORT</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="noIdentity" class="form-label">No Identity</label>
                  <input required type="text" class="form-control" id="noIdentity" name="noIdentity">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="phone" class="form-label">Phone Number</label>
                  <input required type="text" class="form-control" id="phone" name="phone">
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="country" class="form-label">Country</label>
                  <input required type="text" class="form-control" id="country" name="country">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="province" class="form-label">Province</label>
                  <input required type="text" class="form-control" id="province" name="province">
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="city" class="form-label">City</label>
                  <input required type="text" class="form-control" id="city" name="city">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="mb-3">
                  <label class="form-label">Address</label>
                  <textarea required name="address" class="form-control"></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Booking</button>
          </div>
        </form>
      </div>
    </section>

</main>
@include('layouts_front.footer_script')