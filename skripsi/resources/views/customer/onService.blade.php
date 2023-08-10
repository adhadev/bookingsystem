@extends('main')
@section('content')
    <div class="container-fluid h-100" style="background-image: url(/bgwelcome.jpg); width: 100%;p">
        <div class="container px-4 px-lg-5 d-flex h-100 align-items-top justify-content-center ">
            <div class="d-flex justify-content-center">
                <div class="text-center">
                    <div class="card border-0 rounded-3" style="border-radius: 10px; ">
                        <div class="card-header " style="background-color: #241468;color: white;">
                            <div class="row">
                                <div class="col-10 d-flex justify-content-start">
                                    <h4>On Service</h4>
                                </div>
                                <div class="col-2 align-bottom" onclick="edit()"><i class="bx bx-edit  bx-md "
                                        style="width: 15px;"></i>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4 border border-info"><img src="/bmwlogo.gif" alt="" class="w-75">
                                    <div style="font-size: 30px;">Jenis Kendaraan</div>
                                    {{-- <br> --}}
                                    <div class="fw-bold" style="font-weight: 800;font-size: 30px;">BMW Xclass</div>
                                </div>
                                <div class="col-4 border border-info"><img src="/notepad.gif" alt="" class="w-75">
                                    <div style="font-size: 30px;">Nomor Polisi</div>
                                    {{-- <br> --}}
                                    <div class="fw-bold" style="font-weight: 800;font-size: 30px;">B 1 SAF</div>
                                </div>
                                <div class="col-4 border border-info"><img src="/date.gif" alt="" class="w-75">
                                    <div style="font-size: 30px;">Tanggal Kedatangan</div>
                                    {{-- <br> --}}
                                    <div class="fw-bold" style="font-weight: 800;font-size: 30px;">22/07/2023</div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card" hidden>
                        <div class="card-body">
                            <div class="row text-center d-flex justify-content-center">
                                <img src="/empty.gif" alt="" srcset="" class="w-50">
                                <div class="text-center" style="font-size: 30px;">Tidak Ada Booking Dalam Waktu Dekat</div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
