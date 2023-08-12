@extends('main')
@section('content')
    <div class="container-fluid" style="background-image: url(/bgwelcome.jpg); width: 100%;">
        <div class="container px-4 px-lg-5 d-flex h-100 align-items-top justify-content-center ">
            <div class="d-flex justify-content-center">
                <div class="text-center">
                    <div class="card w-100">
                        <div class="card-header">
                            <div class="row flex-justify-content-between text-center">
                                <div class="col-8 d-flex justify-content-start text-center fs-4"
                                    style="font-weight: 700; font-size: 20px">List Working
                                    Order</div>
                                <div class="col-4"><a href="/input/wo" class="btn btn-outline-secondary">Input
                                        Working Order </a></div>
                            </div>
                        </div>
                        <div class="table-responsive p-3">
                            <table class="table table-bordered m-3 data-table">
                                <thead>
                                    <th>NO WO</th>
                                    <th>Nama Customer</th>
                                    <th>NO Polisi</th>
                                    <th>Jenis Mobil</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Status</th>
                                    <th>Sparepart</th>
                                </thead>
                                <tbody>
                               
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {

            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('data.wo') }}",
                columns: [{
                        data: 'no_wo',
                        name: 'no_wo'
                    },
                    {
                        data: 'pelanggan',
                        name: 'pelanggan'
                    },
                    {
                        data: 'no_polisi',
                        name: 'no_polisi',
                        // orderable: false,
                        // searchable: false
                    },
                    {
                        data: 'jenis_mobil',
                        name: 'jenis_mobil'
                    },
                    {
                        data: 'tanggal_mulai',
                        name: 'tanggal_mulai'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'no_polisi',
                        name: 'no_polisi'
                    },
                ]
            });

        });
    </script>
@endsection
