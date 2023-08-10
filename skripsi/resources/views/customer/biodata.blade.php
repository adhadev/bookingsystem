@extends('main')
@section('content')
    <div class="container-fluid h-100" style="background-image: url(/bgwelcome.jpg); width: 100%;p">
        <div class="container px-4 px-lg-5 d-flex h-100 align-items-top justify-content-center ">
            <div class="d-flex justify-content-center">
                <div class="text-center">
                    <div class="card border-0 rounded-3">
                        <div class="card-header " style="background-color: #241468;color: white;">
                            <div class="row">
                                <div class="col-10 d-flex justify-content-start">
                                    <h4>Biodata User</h4>
                                </div>
                                <div class="col-2 align-bottom" onclick="edit()"><i class="bx bx-edit  bx-md "
                                        style="width: 15px;"></i>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3"><img src="/usericon.png" alt="" class="w-100"></div>
                                <div class="col-9">
                                    <table class="table">
                                        <tr>
                                            <td>Nama</td>
                                            <td>: User</td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>: Jl. Lempuyangan 1 No.11</td>
                                        </tr>
                                        <tr>
                                            <td>No. Telp</td>
                                            <td>: 08323342133r</td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kendaraan</td>
                                            <td>: BMW Xclass</td>
                                        </tr>
                                        <tr>
                                            <td>No Polisi</td>
                                            <td>: B 1 SAF</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
