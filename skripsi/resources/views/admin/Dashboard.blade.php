<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Foreman Control Panel</title>
    <style>

    .sidebar {
        text-align: center;
        width: 250px;
        padding: 1rem;
        background-color: #0046A8;
        color: white;
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .sidebar h2 {
        margin-bottom: 1rem;
    }

    /* Tambahkan CSS tambahan untuk opsi dropdown di sidebar jika diperlukan */
    .sidebar select {
        width: 100%;
        padding: 0.5rem;
        margin-bottom: 0.5rem;
    }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .order-list {
            border: 2px black;
            border-radius: 20px;
            padding: 20px;
            background-color: #f4f4f4;
        }
        header {
            background-color: black;
            color: white;
            text-align: center;
            padding: 3rem;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem;
            background-color: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #35424a;
        }
        .working-order-item {
    display: flex;
    align-items: center;
    margin-bottom: 0.5rem;
}

.working-order-info {
    margin-left: 10px;
    display: flex;
    flex-direction: column;
}
        .mechanic {
            display: flex;
            align-items: center;
            border-bottom: 1px solid #e0e0e0;
            padding: 1rem 0;
        }
        .mechanic img {
            max-width: 80px;
            margin-right: 1rem;
        }
        .mechanic-info {
            flex: 1;
        }
        .vehicle {
            margin-top: 0.5rem;
        }
        .sidebar {
            text-align: center;
            width: 250px;
            padding: 1rem;
            background-color: #ffffff;
            color: rgb(0, 0, 0);
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .sidebar h2 {
            margin-bottom: 1rem;
        }
        .working-order {
            margin-top: 1rem;
        }
        .working-order-item {
            display: flex;
            align-items: center;
            margin-bottom: 0.5rem;
        }
        .drop-area {
            border: 2px dashed black;
            width: 150px;
            height: 80px;
            margin: 10px 0;
            text-align: center;
            background-color: #f4f4f4;
            cursor: pointer;
}
        .working-order-item .status {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            margin-right: 0.5rem;
        }
        .status-green {
            background-color: green;
        }
        .status-gray {
            background-color: gray;
        }
        .logout-button {
            position: absolute;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            background-color: #fffff;
            color: black;
            border: none;
            cursor: pointer;
            font-size: 14px;
            border-radius: 5px;
            z-index: 3;
        }
        h1 {
            font-family: 'Montserrat', sans-serif;
            font-size: 24px;
            text-align: center;
            margin-top: 20px;
            font-weight: bold;
            color: #000000;
        }
        h2 {
            font-family: 'Montserrat', sans-serif;
            font-size: 20px;
            margin-top: 20px;
            color: #000000;
        }
        .teknisi {
            font-family: 'Montserrat', sans-serif;
            font-size: 15px;
            margin-top: 20px;
            color: #000000;
            font-weight: bold;
        }
        h3 {
            font-family: 'Montserrat', sans-serif;
            font-size: 16px;
            color: #000000;
        }
        .status-icon {
    display: inline-block;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    margin-right: 5px;
}

.off {
    background-color: red; /* Merah untuk status off */
}

.on {
    background-color: green; /* Hijau untuk status on */
}

    </style>
</head>
<body>
    <header>
        <button class="logout-button">Logout</button>
    </header>
    <div class="sidebar">
        <div class="mb-1">
            <select class="form-select" id="listWo3" name="listWo3">
                <option value="" disabled selected>Pilih Nomor WO</option>
                @foreach ($dataWO as $wo)
                    <option value="{{ $wo->no_wo }}">{{ $wo->no_wo }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="container">
        <h1>Foreman Control Panel</h1>
        <h2>List Working Order</h2>
    
        <div class="row">
            <div class="col">
                <div id="ordersToProcess" class="order-list">
                    <h3>Orders to be Processed :</h3>
                    <ul id="orderList"></ul>
                </div>
            </div>
            <div class="col">
                <div id="onProgressList" class="order-list">
                    <h3>On Progress:</h3>
                    <ul></ul>
                </div>
            </div>
        </div>
    </div>

        <!-- Informasi dari database dapat diambil dan dimasukkan ke dalam ul li seperti contoh di bawah -->
        <script>
            // Contoh data dari database
            const ordersToProcessData = [
                @foreach ($dataWO as $wo)
                    "{{ $wo->no_wo }}",
                @endforeach
            ];

            // Memasukkan data dari database ke dalam Orders to be Processed
            const ordersToProcessContainer = document.getElementById("orderList");
            ordersToProcessData.forEach(order => {
                const li = document.createElement("li");
                li.innerText = order;
                ordersToProcessContainer.appendChild(li);
            });

            // Contoh data on progress dari database
            const onProgressData = [
                @foreach ($dataWOOnProgress as $wo)
                    "{{ $wo->no_wo }}",
                @endforeach
            ];

            // Memasukkan data dari database ke dalam On Progress
            const onProgressContainer = document.getElementById("onProgressList");
            onProgressData.forEach(order => {
                const li = document.createElement("li");
                li.innerText = order;
                onProgressContainer.appendChild(li);
            });
        </script>
</body>
</html>
    <div class="container"style="padding-right: 6px;">
        <div col-auto class="mechanic">
            <div class="mechanic-info">
                <img src="https://static.vecteezy.com/system/resources/thumbnails/016/007/776/small_2x/mechanic-creative-icon-design-free-vector.jpg" alt="Mekanik 2" width="100" height="100">
                <h2 class="teknisi">{{ $teknisi->isEmpty() ? 'Tidak ada teknisi' : $teknisi->get(0)->nama_teknisi }}</h2>
                <p>Status: <span class="status-icon {{ $teknisi->get(0)->status == 'On Working' ? 'off' : 'on' }}"></span> <br>{{$teknisi->get(0)->status}}</p>
                
                <!-- Pindahkan area drop ke sini -->
            </div>
            <div class="mechanic-info">
                <img src="https://static.vecteezy.com/system/resources/thumbnails/016/007/776/small_2x/mechanic-creative-icon-design-free-vector.jpg" alt="Mekanik 2" width="100" height="100">
                <h2 class="teknisi">{{ $teknisi->isEmpty() ? 'Tidak ada teknisi' : $teknisi->get(1)->nama_teknisi }}</h2>
                <p>Status: <span class="status-icon {{ $teknisi->get(1)->status == 'On Working' ? 'off' : 'on' }}"></span> <br>{{$teknisi->get(1)->status}}</p>
                
                <!-- Pindahkan area drop ke sini -->
                <!-- Modal -->
<div class="modal fade" id="taskModal" tabindex="-1" aria-labelledby="taskModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="taskModalLabel">Detail Task</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="modal-body">
                    <p id="modalNoWo">No Wo : </p>
                    <p id="modalNoRangka">No Rangka :</p>
                    <p id="modalJenisKendaraan">Jenis Kendaraan:</p>
                    <p id="modalJL">Jenis Layanan :</p>
                    <p id="modalNoPS">Pergantian Sparepart :</p>
                    <p id="modalEsW">Estimasi Waktu :</p>
                    <div class="mb-1">
                        <div class="mb-1">
                            <label for="listTechnicians" class="form-label">Pilih Teknisi:</label>
                            <input type="text" id="technicianInput" name="technician">
                        </div>
                        
                        
                    </div>
                </div>  
                <div class="mb-1">
                </div>
                
                <!-- Isi konten modal di sini -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-primary">Kerjakan</button>
            </div>
        </div>
    </div>
</div>

                
            </div>
            <div class="mechanic-info">
                <img src="https://static.vecteezy.com/system/resources/thumbnails/016/007/776/small_2x/mechanic-creative-icon-design-free-vector.jpg" alt="Mekanik 2" width="100" height="100">
                <h2 class="teknisi">{{ $teknisi->isEmpty() ? 'Tidak ada teknisi' : $teknisi->get(2)->nama_teknisi }}</h2>
                <p>Status: <span class="status-icon {{ $teknisi->get(2)->status == 'On Working' ? 'off' : 'on' }}"></span> <br>{{$teknisi->get(2)->status}}</p>
                
                <!-- Pindahkan area drop ke sini -->
            </div>
            <div class="mechanic-info">
                <img src="https://static.vecteezy.com/system/resources/thumbnails/016/007/776/small_2x/mechanic-creative-icon-design-free-vector.jpg" alt="Mekanik 2" width="100" height="100">
                <h2 class="teknisi">{{ $teknisi->isEmpty() ? 'Tidak ada teknisi' : $teknisi->get(3)->nama_teknisi }}</h2>
                <p>Status: <span class="status-icon {{ $teknisi->get(3)->status == 'On Working' ? 'off' : 'on' }}"></span> <br>{{$teknisi->get(3)->status}}</p>
                
            </div>
            <div class="mechanic-info">
                <img src="https://static.vecteezy.com/system/resources/thumbnails/016/007/776/small_2x/mechanic-creative-icon-design-free-vector.jpg" alt="Mekanik 2" width="100" height="100">
                <h2 class="teknisi">{{ $teknisi->isEmpty() ? 'Tidak ada teknisi' : $teknisi->get(4)->nama_teknisi }}</h2>
                <p>Status: <span class="status-icon {{ $teknisi->get(4)->status == 'On Working' ? 'off' : 'on' }}"></span> <br>{{$teknisi->get(4)->status}}</p>
                
                <!-- Pindahkan area drop ke sini -->
            </div>
        </div>
          <!-- Modal Popup -->
          <div class="modal fade" id="taskModal" tabindex="-1" role="dialog" aria-labelledby="taskModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="taskModalLabel">Detail Task</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-primary">Kerjakan</button>
                    </div>
                </div>
            </div>
        </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const dropdowns = document.querySelectorAll(".form-select"); // Mengambil semua dropdown
            const modalNoWoElement = document.getElementById("modalNoWo");
            const modalNoRangkaElement = document.getElementById("modalNoRangka");
            const modalJenisKendaraanElement = document.getElementById("modalJenisKendaraan");
            const modalJLElement = document.getElementById("modalJL");
            const modalNoPSElement = document.getElementById("modalNoPS");
            const modalEsWElement = document.getElementById("modalEsW");
    
            dropdowns.forEach(dropdown => {
                dropdown.addEventListener("change", function() {
                    const selectedValue = dropdown.value;
                    // Simpan data ini pada elemen modal
                    modalNoWoElement.textContent = "No Wo : " + selectedValue;
                    fetch(`/detail/task/${selectedValue}`)
                        .then(response => response.json())
                        .then(data => {
                            modalNoWoElement.textContent = `No Wo : ${data.NoWO}`;
                            modalNoRangkaElement.textContent = `No Rangka : ${data.NoRangka}`;
                            modalJenisKendaraanElement.textContent = `Jenis Kendaraan : ${data.JenisKendaraan}`;
                            modalJLElement.textContent = `Jenis Layanan : ${data.JenisLayanan}`;
                            const spareparts = data.SparePart.join(', ');
                            modalNoPSElement.textContent = `Pergantian Sparepart : ${spareparts}`;
                            modalEsWElement.textContent = `Estimasi Waktu : ${data.EstimasiWaktu} menit`;
    
                            // Show the modal
                            $('#taskModal').modal('show');
                        })
                        .catch(error => console.error('Terjadi kesalahan:', error));
    
                    // Lakukan pemanggilan API JSON atau data lainnya untuk mendapatkan detail task
                    // Kemudian isi elemen modal sesuai dengan data yang didapatkan
                    
                    // Tampilkan modal
                    $('#taskModal').modal('show');
                });
            });
        });
    </script>
    <script>

document.addEventListener("DOMContentLoaded", function() {
    // ... (Kode lainnya seperti sebelumnya)

    const kerjakanButton = document.getElementById("kerjakanButton");
    kerjakanButton.addEventListener("click", function() {
        const selectedTechnicians = document.querySelectorAll("input[name='technician']:checked");
        const selectedTechnicianIds = Array.from(selectedTechnicians).map(checkbox => checkbox.value);

        // ... (Kode sebelumnya)

        // Tutup modal
        $('#taskModal').modal('hide');
    });
});
</script>
<script>
    $(function() {
        console.log("Autocomplete script executed");
        $("#technicianInput").autocomplete({
            source: function(request, response) {
                console.log("Autocomplete script executed");

                $.ajax({
                    url: "/teknisi/available", // Ganti dengan URL API endpoint Anda
                    dataType: "json",
                    data: {
                        term: request.term
                    },
                    success: function(data) {
                        var namaTeknisi = data.map(function(teknisi) {
                            return teknisi.Nama;
                        });
                        response(namaTeknisi);
                    }
                });
            },
            minLength: 2 // Jumlah karakter minimal sebelum mulai pencarian
        });
    });
</script>


<script>
document.addEventListener("DOMContentLoaded", function() {
    $("#technicianInput").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "/teknisi/available", // Ganti dengan URL API endpoint Anda
                dataType: "json",
                success: function(data) {
                    response(data);
                }
            });
        },
        minLength: 0 // Mengubah minLength menjadi 0 agar tampilan semua hasil saat mengetik
    });
});
</script>

</body>
</html>