@extends('main')
@section('content')
    <div class="container-fluid" style="background-image: url(/bgwelcome.jpg); width: 100%;">
        <div class="container-xl px-4 px-lg-5 d-flex  align-items-top justify-content-center ">
            <div class="col-12 d-flex justify-content-center">
                {{-- <div class="text-center"> --}}
                <div class="card w-100 border-0 rounded-3">
                    {{-- <form action="/submit/wo/baru" method="post">
                        @csrf --}}
                    <div class="card-header " style="background-color: #241468;color: white;">
                        <div class="row">
                            <div class="col-8 d-flex justify-content-start">
                                <h4>Detail WO</h4>
                            </div>
                            <div class="col-4 align-bottom d-flex justify-content-end" onclick="edit()">
                                <button type="submit" class="btn" style="color: aliceblue"><i class="bx bx-save bx-md "
                                        style="width: 10px; margin-right: 10%;"></i></button>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="col-12">

                            <div class="row w-100">
                                <div class="col-6">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="no_wo" class="form-label">WO Number</label>
                                            <input required type="text" class="form-control" id="no_wo" name="no_wo" readonly>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="tgl_mulai" class="form-label">Start Date</label>
                                            <input required type="date" class="form-control" id="tgl_mulai"
                                                name="tgl_mulai">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="waktu_mulai" class="form-label">Start Time</label>
                                            <input required type="time" class="form-control" id="waktu_mulai"
                                                name="waktu_mulai">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="pic_service" class="form-label">Service Advisor</label>
                                                    <input required type="text" class="form-control" id="pic_service"
                                                        name="pic_Service" value="{{ ucwords(Auth::user()->nama) }}">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="no_tlp_pic" class="form-label">Phone Number</label>
                                                    <input required type="tel" class="form-control" id="no_tlp_pic" placeholder="+62" name="no_tlp_pic"
                                                        value="{{ Auth::user()->no_telp }}">
                                                </div>
                                            </div>
                                        </div>
                                    
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="kilometer" class="form-label">Mileage</label>
                                            <input type="number" class="form-control" id="kilometer"
                                                value="{{ $dataWo->pelanggan->kilometer }}" name="kilometer">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="no_polisi" class="form-label">Police Number</label>
                                                    <input required type="text" class="form-control" id="no_polisi"
                                                        name="no_polisi" onchange="pelanggan()">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="jenis_mobil" class="form-label">Car Model</label>
                                                    <input required type="text" class="form-control" id="jenis_mobil"
                                                        name="jenis_mobil">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="nama_customer" class="form-label">Customer Name</label>
                                            <input required type="text" class="form-control" id="nama_customer"
                                                name="nama_pelanggan">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="alamat" class="form-label">Address</label>
                                            <input required type="text" class="form-control" id="alamat"
                                                name="alamat">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="no_kerangka" class="form-label">Chassis Number</label>
                                            <input required type="text" class="form-control" id="no_kerangka"
                                                name="no_kerangka">
                                        </div>
                                    </div>
                                    
                                    <div class="col-12 d-flex justify-content-center mt-4">
                                        <div class="col-6"><button class="btn fs-4  " type="button"
                                                style="background-color: #241468;color: white;"
                                                onclick="modalDetail()">Detail
                                                Service</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- </form> --}}
                </div>
            </div>
            {{-- </div> --}}
        </div>
    </div>

    <script></script>
@endsection
