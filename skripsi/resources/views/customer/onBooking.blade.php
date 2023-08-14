@extends('main')
@section('content')

<head>
    <style>
          #progress-container {
            width: 100%;
            background-color: lightgray;
            height: 30px;
        }
        #progress {
            width: <?= $_SESSION['progress'] ?? 0 ?>%;
            height: 100%;
            background-color: green;
        }

        body {
            background-color: #222; /* Warna latar belakang yang cocok dengan teks putih */
            color: white; /* Warna teks putih */
        }
        #stopwatch {
            color: white; /* Warna teks putih khusus untuk elemen dengan ID "stopwatch" */
        }

.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.4);
    z-index: 9999; /* Menempatkan modal di atas konten lain */
}

.modal-content {
    background-color: rgb(0, 0, 0);
    border-radius: 5px;
    max-width: 400px;
    margin: 0 auto; /* Mengatur margin horizontal untuk mengubah posisi modal menjadi tengah */
    margin-top: 10%; /* Mengatur jarak vertikal dari atas */
    padding: 20px;
    position: relative;
}

.btn-modal {
            border-radius: 5px; /* Menentukan radius border */
            background-color: #3498db; /* Warna biru laut */
            color: rgb(226, 226, 226);
            border: none;
            cursor: pointer;
            font-size: 15px;
            font-style: bold;
            padding: 6px 12px; /* Mengurangi padding untuk membuat tombol lebih kecil */
            font-weight:  bold; /* Mengurangi ukuran font */
            transition: background-color 0.3s; /* Efek transisi saat hover */
        }

        .btn-modal:hover {
            background-color: #2980b9; /* Warna latar belakang saat hover */
        }


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
    
    .progress-container {
  width: 100%;
  background-color: #000000;
  height: 20px;
  border-radius: 10px;
  overflow: hidden;
}

.progress-bar {
  width: 0;
  height: 100%;
  background-color: #3498db;
  transition: width 0.3s;
}
.status-text {
            color: rgb(252, 252, 255); /* Ubah warna font sesuai keinginan, misalnya biru */
        }

/* Sisanya sama seperti sebelumnya */

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
                                Tidak ada penambahan sparepart
                                @endif
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="fw-bold font-size-24">
                                <i class="bx bx-stats icon"></i> Status: 
                                @if ($wo && $wo->status !== null)
                                {{ $wo->status }}
                                @else
                                
                                @endif
                        
                                <button id="openModalBtn" class="btn-modal">View Progress</button>
                                
                            </div>
                        </div>
                        
                        <div id="modal" class="modal">
                            <div class="modal-content">
                                <body>
                                    <h1>Status Progress</h1>
                                    <p class="status-text">Status: on working - oli</p>
                                    <p id="stopwatch">Waktu Pengerjaan: 00:00</p>
                                </body>
                                <div id="progress-container">
                                    <div id="progress"></div>
                                </div>
                                
                                <?php
                                $status = $_SESSION['status'] ?? 'Ready';
                                echo "<p>Status: $status</p>";
                                ?>
                                
                                <form action="" method="post">
                                    <button type="submit" name="reset">Reset</button>
                                </form>
                            </div>
                        </div>
                        
                        
                          

  </div>
  <script>
    function updateProgress(progress) {
        const progressBar = document.getElementById('progress');
        progressBar.style.width = progress + '%';
    }
</script>
  <script>
    let startTime = 0;
    let elapsedTime = 0;
    let interval;

    // Fungsi untuk memulai stopwatch
    function startStopwatch() {
        startTime = Date.now() - elapsedTime;
        interval = setInterval(updateStopwatch, 1000);
    }

    // Fungsi untuk menghentikan stopwatch
    function stopStopwatch() {
        clearInterval(interval);
    }

    // Fungsi untuk mengupdate tampilan stopwatch
    function updateStopwatch() {
        elapsedTime = Date.now() - startTime;
        const minutes = Math.floor(elapsedTime / 60000);
        const seconds = Math.floor((elapsedTime % 60000) / 1000);

        const minutesFormatted = minutes.toString().padStart(2, '0');
        const secondsFormatted = seconds.toString().padStart(2, '0');

        const stopwatchElement = document.getElementById("stopwatch");
        stopwatchElement.textContent = `Waktu Pengerjaan: ${minutesFormatted}:${secondsFormatted}`;
    }

    // Memulai stopwatch saat halaman dimuat
    startStopwatch();

    // Event listener untuk mereset stopwatch
    window.addEventListener("beforeunload", function() {
        localStorage.setItem("elapsedTime", elapsedTime);
    });

    // Mengambil data dari localStorage saat halaman dimuat kembali
    window.addEventListener("load", function() {
        const savedElapsedTime = localStorage.getItem("elapsedTime");
        if (savedElapsedTime) {
            elapsedTime = parseInt(savedElapsedTime);
            updateStopwatch();
            startStopwatch();
        }
    });
  <script src="https://cdn.jsdelivr.net/npm/boxicons@2.0.9/boxicons.min.js"></script>
<script src="script.js"></script>
<script>
    const openModalBtn = document.getElementById("openModalBtn");
const modal = document.getElementById("modal");


openModalBtn.addEventListener("click", () => {
    modal.style.display = "block";
});

modal.addEventListener("click", (event) => {
    if (event.target === modal) {
        modal.style.display = "none";
    }
});


    </script>
                <script src="https://cdn.jsdelivr.net/npm/boxicons@2.0.9/boxicons.min.js"></script>
                
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
