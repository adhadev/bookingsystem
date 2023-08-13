@extends('main')
@section('content')
<div class="container-fluid h-75" style="background-image: url(/bgwelcome.jpg); width: 100%; overflow-y: hidden;">
    <div class="container px-4 px-lg-5 d-flex h-75 align-items-top justify-content-center ">
        <div class="d-flex justify-content-center">
            <div class="text-center">
                @if ($booking != null)
                <div class="card border-0 rounded-3" style="border-radius: 10px; ">
                    <div class="card-header " style="background-color: #241468;color: white;">
                        <div class="row">
                            <div class="col-10 d-flex justify-content-start">
                                <h4>On Booking</h4>
                            </div>
                            <div class="col-2 align-bottom" onclick="edit()">
                                <i class="bx bx-edit  bx-md " style="width: 15px;"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4 border border-info">
                                <img src="/bmwlogo.gif" alt="" class="w-75">
                                <div style="font-size: 30px;">Jenis Kendaraan</div>
                                <div class="fw-bold" style="font-weight: 800; font-size: 30px;">
                                    {{ $pelanggan->jenis_mobil }}</div>
                            </div>
                            <div class="col-4 border border-info">
                                <img src="/notepad.gif" alt="" class="w-75">
                                <div style="font-size: 30px;">Nomor Polisi</div>
                                <div class="fw-bold" style="font-weight: 800; font-size: 30px;">
                                    {{ $pelanggan->no_polisi }}</div>
                            </div>
                            <div class="col-4 border border-info">
                                <img src="/date.gif" alt="" class="w-75">
                                <div style="font-size: 30px;">Tanggal Kedatangan</div>
                                <div class="fw-bold" style="font-weight: 800; font-size: 30px;">
                                    {{ $booking->tgl_booking }}</div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-4 border border-info">
                                <img src="/money.gif" alt="" class="w-75">
                                <div style="font-size: 30px;">Estimasi Biaya</div>
                                <div class="fw-bold" style="font-weight: 800; font-size: 30px;">{{ $estimasi_biaya }}
                                </div>
                            </div>
                            <div class="col-4 border border-info">
                                <img src="/time.gif" alt="" class="w-75">
                                <div style="font-size: 30px;">Estimasi Waktu</div>
                                <div class="fw-bold" style="font-weight: 800; font-size: 30px;">{{ $estimasi_waktu }}
                                </div>
                            </div>
                            <div class="col-4 border border-info">
                                <img src="/sparepart.gif" alt="" class="w-75">
                                <div style="font-size: 30px;">Sparepart</div>
                                <div class="fw-bold" style="font-weight: 800; font-size: 30px;">{{ $sparepart }}</div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-4 border border-info">
                                <img src="/status.gif" alt="" class="w-75">
                                <div style="font-size: 30px;">Status</div>
                                <div class="fw-bold" style="font-weight: 800; font-size: 30px;">{{ $status }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="card" style="opacity: 0.5">
                    <div class="card-body">
                        <div class="row text-center d-flex justify-content-center">
                            <img src="/empty.gif" alt="" srcset="" class="w-50">
                            <div class="text-center" style="font-size: 30px;">Tidak Ada Booking Dalam Waktu Dekat</div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-2 m-3"><a href="/"><button class="btn-secondary"
                                        style="opacity: 100%">Buat Booking</button></a></div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
