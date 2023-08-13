@extends('main')
@section('content')
<head>
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet">
</head>

<div class="container-fluid h-100" style="background-image: url(/bgwelcome.jpg); width: 100%; overflow-y: hidden;">
    <div class="container px-4 px-lg-5 d-flex h-75 align-items-top justify-content-center ">
        <div class="d-flex justify-content-center">
            <div class="text-center">
                @if ($booking != null)
                <div class="card border-0 rounded-5" style="border-radius: 10px; ">
                    <div class="card-header " style="background-color: #241468;color: white;">
                        <div class="row">
                            <div class="col-10 d-flex justify-content-start">
                                <h4>Detail Booking</h4>
                            </div>
                        </div>
                    </div>
                   <div class="col-auto">
    <div class="fw-bold" style="font-size: 24px;text-align: left;"><i class="bx bx-car"></i> Vehicle Type: {{ $pelanggan->jenis_mobil }}</div>
</div>
<div class="col-auto">
    <div class="fw-bold" style="font-size: 24px;text-align: left;"><i class="bx bxs-credit-card-front"></i> License Number:  {{ $pelanggan->no_polisi }}</div>
</div>
<div class="col-auto">
    <div class="fw-bold" style="font-size: 24px;text-align: left;"><i class="bx bx-calendar"></i> Arrival Date: {{ $booking->tgl_booking }}</div>
</div>
<div class="col-auto">
    <div class="fw-bold" style="font-size: 24px;text-align: left;"><i class="bx bx-money"></i> Estimated Cost: 
        @if ($wo && $wo->biaya !== null)
        Rp.{{ $wo->biaya }}
    @else
        0
    @endif
        {{-- Rp.{{ $wo->biaya }}</div> --}}
</div>
<div class="col-auto">
    <div class="fw-bold" style="font-size: 24px;text-align: left;">
        <i class="bx bx-time-five"></i> Estimated Times: 
        <span id="countdown"></span>
    </div>
</div>

<div class="col-auto">
    <div class="fw-bold" style="font-size: 24px;text-align: left;"><i class="bx bxl-dropbox"></i> Sparepart:
        @if ($wo && $wo->sparepart !== null)
         {{ $wo->sparepart }}</div>
        @else
        test
    @endif
</div>
<div class="col-auto">
    <div class="fw-bold" style="font-size: 24px;text-align: left;"><i class="bx bx-stats"></i> Status: 
        @if ($wo && $wo->status !== null)
        {{ $wo->status }}</div>
       @else
       0
   @endif
</div>

  </div>
                <script src="https://cdn.jsdelivr.net/npm/boxicons@2.0.9/boxicons.min.js"></script>
                <script>
                function startCountdown(targetTimeInMinutes) {
                    var countdown = setInterval(function() {
                        // Mengurangi waktu estimasi selesai dengan 1 menit
                        targetTimeInMinutes--;
                
                        // Hitung jam, menit, dan detik dari waktu yang tersisa
                        var hours = Math.floor(targetTimeInMinutes / 60);
                        var minutes = targetTimeInMinutes % 60;
                        var seconds = 0; // Hitungan mundur dalam format menit tidak memperhitungkan detik
                
                        // Tampilkan hitungan mundur dalam elemen dengan id "countdown"
                        document.getElementById("countdown").innerHTML = hours + "h " + minutes + "m " + seconds + "s ";
                
                        // Jika hitungan mundur berakhir, tampilkan pesan
                        if (targetTimeInMinutes <= 0) {
                            clearInterval(countdown);
                            document.getElementById("countdown").innerHTML = "Expired";
                        }
                    }, 60000); // Perbarui setiap 1 menit (60.000 milidetik)
                }
                // Waktu estimasi selesai dari database (dalam format menit)
                var estimatedTimeInMinutes = {{ $wo ? $wo->waktu_estimasi_selesai : 0 }};
                // Mulai hitungan mundur
                startCountdown(estimatedTimeInMinutes);
            </script>
                
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
