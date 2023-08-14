@extends('main')
@section('content')

<head>
    <style>
        .container {
            display: flex;
            justify-content: flex-start;
            align-items: flex-start;
        }
    
        .col-auto {
            display: flex;
        justify-content: flex-start;
        align-items: flex-start;
        margin-bottom: 10px; 
            margin-right: 20px;
        }
    
        .fw-bold {
            font-weight:inherit;
        }
        .icon {
        margin-right: 10px;
    }
    
        .font-size-24 {
            font-size: 24px;
            text-align: left;
        }
        .detail-heading {
        font-weight: bold;
        font-size: 28px;
        text-align: center;
    }
    </style>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet">
</head>

<div class="container-fluid h-100" style="background-image: url(/bgwelcome.jpg); width: 100%; overflow-y: hidden;">
    <div class="container px-4 px-lg-5 d-flex h-75 align-items-top justify-content-center ">
        <div class="d-flex justify-content-center">
            <div class="text-center">
                @if ($booking != null)
                <div class="card border-0 rounded-5" style="border-radius: 10px; ">
                    <div class="card-header " style="background-color: #181818;color: rgb(211, 235, 245); border-radius:2rem;">
                        <div class="col-auto">
                            <div class="col-10 d-flex justify-content-start">
                                <h4 class="detail-heading">Detail Booking</h4>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="fw-bold font-size-24">
                                <i class="bx bx-car icon"></i> Vehicle Type: {{ $pelanggan->jenis_mobil }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="fw-bold font-size-24">
                                <i class="bx bxs-credit-card-front icon"></i> License Number:  {{ $pelanggan->no_polisi }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="fw-bold font-size-24">
                                <i class="bx bx-calendar icon"></i> Arrival Date: {{ $booking->tgl_booking }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="fw-bold font-size-24">
                                <i class="bx bx-money icon"></i> Estimated Cost: 
                                @if ($wo && $wo->biaya !== null)
                                Rp.{{ $wo->biaya }}
                                @else
                                0
                                @endif
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="fw-bold font-size-24">
                                <i class="bx bx-time-five icon"></i> Estimated Times: 
                                @if ($wo && $wo->waktu_estimasi_selesai !== null)
                                Rp.{{ $wo->waktu_estimasi_selesai }}
                                @else
                                0
                                @endif
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="fw-bold font-size-24">
                                <i class="bx bxl-dropbox icon"></i> Sparepart:
                                @if ($wo && $wo->sparepart !== null)
                                {{ $wo->sparepart }}
                                @else
                                tidak ada penambahan sparepart
                                @endif
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="fw-bold font-size-24">
                                <i class="bx bx-stats icon"></i> Status: 
                                @if ($wo && $wo->status !== null)
                                {{ $wo->status }}
                                @else
                                0
                                @endif
                            </div>
                        </div>
                        <div class="container mt-5">
                            <div class="row">
                                <div class="col">
                                    <h2>------------------------------------------</h2>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <button id="startButton" class="btn btn-primary mt-3">Start Progress</button>
                                </div>
                            </div>
                        </div>

  </div>
                <script src="https://cdn.jsdelivr.net/npm/boxicons@2.0.9/boxicons.min.js"></script>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                    $(document).ready(function() {
                        $("#startButton").click(function() {
                            // Simulate progress
                            var progress = 0;
                            var interval = setInterval(function() {
                                progress += 5; // Increase the progress by 5% per interval
                                $(".progress-bar").css("width", progress + "%").attr("aria-valuenow", progress);
                                if (progress >= 100) {
                                    clearInterval(interval);
                                    alert("Progress is complete!");
                                }
                            }, 1000); // Update every 500 milliseconds (0.5 seconds)
                        });
                    });
                </script>
                
                @else
                <div class="card" style="opacity: 0.5">
                    <div class="card-body">
                        
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
