
@extends('main')
@section('content')
    <div class="container-fluid" style="background-image: url(/bgwelcome.jpg); width: 100%;">
        <div class="container-xl px-4 px-lg-5 d-flex  align-items-top justify-content-center ">
            <div class="col-12 d-flex justify-content-center">
                {{-- <div class="text-center"> --}}
                <div class="card w-100 border-0 rounded-3">
                    <form action="/submit/wo/baru" method="post">
                        @csrf
                        <div class="card-header " style="background-color: #241468;color: white;">
                            <div class="row">
                                <div class="col-8 d-flex justify-content-start">
                                    <h4>Input WO</h4>
                                </div>
                                <div class="col-4 align-bottom d-flex justify-content-end" onclick="edit()">
                                    <button type="submit" class="btn" style="color: aliceblue"><i
                                            class="bx bx-save bx-md " style="width: 10px; margin-right: 10%;"></i></button>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="col-12">

                                <div class="row w-100">
                                    <div class="col-6">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="no_wo" class="form-label">Nomor Wo</label>
                                                <input required type="text" class="form-control" id="no_wo"
                                                    name="no_wo">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="tgl_mulai" class="form-label">Tanggal Mulai</label>
                                                <input required type="date" class="form-control" id="tgl_mulai"
                                                    name="tgl_mulai">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="waktu_mulai" class="form-label">Waktu Mulai</label>
                                                <input required type="time" class="form-control" id="waktu_mulai"
                                                    name="waktu_mulai">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="pic_service" class="form-label">Penasehat Servis</label>
                                                        <input required type="text" class="form-control" id="pic_service"
                                                            name="pic_Service" value="{{ ucwords(Auth::user()->nama) }}">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="no_tlp_pic" class="form-label">No Telepon</label>
                                                        <input required type="number" class="form-control" id="no_tlp_pic"
                                                            name="no_tlp_pic" value="{{ ucwords(Auth::user()->no_telp) }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="no_wip" class="form-label">NO WIP</label>
                                                <input required type="number" class="form-control" id="no_wip"
                                                    name="no_wip">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="no_polisi" class="form-label">No Polisi</label>
                                                        <input required type="text" class="form-control" id="no_polisi"
                                                            name="no_polisi" onchange="pelanggan()">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="jenis_mobil" class="form-label">Jenis Mobil</label>
                                                        <input required type="text" class="form-control" id="jenis_mobil"
                                                            name="jenis_mobil">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="nama_customer" class="form-label">Nama Pelanggan</label>
                                                <input required type="text" class="form-control" id="nama_customer"
                                                    name="nama_pelanggan">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="alamat" class="form-label">Alamat</label>
                                                <input required type="text" class="form-control" id="alamat"
                                                    name="alamat">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="no_kerangka" class="form-label">No Kerangka</label>
                                                <input required type="text" class="form-control" id="no_kerangka"
                                                    name="no_kerangka">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="tanggal_registrasi" class="form-label">Tanggal
                                                            Registrasi</label>
                                                        <input required type="date" class="form-control"
                                                            name="tanggal_registrasi" id="tanggal_registrasi">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="kilometer" class="form-label">Kilometer</label>
                                                        <input required type="number" class="form-control"
                                                            id="kilometer" name="kilometer">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="col-12 d-flex justify-content-center mt-4">
                                            <div class="col-6"><button class="btn fs-4  " type="button"
                                                    style="background-color: #241468;color: white;"
                                                    onclick="modalDetail()">Detail
                                                    Service</button>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            {{-- </div> --}}
        </div>
    </div>
    @php
        $last_wo = $dataWo->last();
        $last_wip = $dataWip->last();
        // dd($last_pr);
    @endphp
    <script>
        //>>> Untuk format Nomor PO <<//
        @if ($last_wo == null)

            let urutan = 0;
            var angka = 0;
        @else

            let last_wo = '{{ $last_wo->no_wo }}';
            let lastValue = last_wo.substring(last_wo.lastIndexOf('-') + 1);
            let lastValueNumber = parseInt(lastValue);
            let urutan = lastValueNumber;
            var angka = 0;
        @endif
        @if ($last_wip == null)

            let sort = 0;
            var number = 0;
        @else

            let last_wip = '{{ $last_wo->no_wo }}';
            let lastValueWip = last_wip.substring(last_wip.lastIndexOf('-') + 1);
            let lastValueNumberWip = parseInt(lastValueWip);
            let sort = lastValueNumberWip;
            var number = 0;
        @endif

        if (urutan == 0) {
            angka = '00000' + (urutan + 1);
        } else if (urutan < 10) {
            angka = '00000' + (urutan + 1);
        } else if (urutan < 100) {
            angka = '0000' + (urutan + 1);
        } else if (urutan < 1000) {
            angka = '000' + (urutan + 1);
        } else if (urutan < 10000) {
            angka = '00' + (urutan + 1);
        }

        if (sort == 0) {
            number = '00000' + (sort + 1);
        } else if (sort < 10) {
            number = '00000' + (sort + 1);
        } else if (sort < 100) {
            number = '0000' + (sort + 1);
        } else if (sort < 1000) {
            number = '000' + (sort + 1);
        } else if (sort < 10000) {
            number = '00' + (sort + 1);
        }
        let nomor = angka;
        // document.getElementById("judulWO").innerHTML = wo;
        document.getElementById("no_wo").value = nomor;
        document.getElementById("no_wip").value = nomor;

        function pelanggan() {
            let id = document.getElementById("no_polisi").value;
            let url = '/api/pelanggan' + '/' + id;
            $.ajax({
                method: "GET",
                dataType: "json",

                url: url,

                success: function(data) {
                    console.log(data);
                    document.getElementById("jenis_mobil").value = data.jenis_mobil;
                    document.getElementById("nama_customer").value = data.nama;
                    document.getElementById("alamat").value = data.alamat;
                }
            });
        }
    </script>
@endsection
