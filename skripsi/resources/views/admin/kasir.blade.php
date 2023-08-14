<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Kasir Control Panel</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/dist/boxicons.min.css">
<style>
    body {
        background-color: #f8f9fa;
        margin: 0;
    }

    .sidebar {
        width: 250px;
        background-color: #f8f9fa;
        padding: 20px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .sidebar h4 {
        margin-bottom: 10px;
    }

    .sidebar ul {
        list-style: none;
        padding: 0;
    }

    .sidebar li {
        cursor: pointer;
        margin-bottom: 5px;
        padding: 5px 10px;
        background-color: #fff;
        border-radius: 5px;
        transition: background-color 0.2s;
    }

    .sidebar li:hover {
        background-color: #f1f1f1;
    }

    .fixed-top {
        position: fixed;
        top: 0;
        right: 0;
        left: 0;
        z-index: 1030;
        background-color: #fff;
        padding: 10px 20px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        display: flex;
        justify-content: flex-end;
    }

    .btn-logout {
        margin: 0;
        z-index: -3;
    }

    .container {
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        margin-top: 50px;
    }

    .btn-print {
        margin-top: 10px;
    }
</style>
</head>
<body>
<header>
    <!-- Tombol Logout -->
    <a href="logout.php" class="btn btn-danger btn-logout">Logout</a>
</header>
<div class="container">
    <h2><i class="bx bx-user-circle"></i> Kasir Service Center</h2>

    <!-- Konten Kasir -->
    <div class="kasir-info">
        <div class="sidebar">
            <h4>Daftar Nomor WO</h4>
            <ul id="wo-list">
                <li onclick="loadWoDetail('WO123')">WO123</li>
                <li onclick="loadWoDetail('WO456')">WO456</li>
                <li onclick="loadWoDetail('WO789')">WO789</li>
                <!-- Tambahkan daftar nomor WO lain di sini -->
            </ul>
        </div>
        <p>WO Number: <span id="wo-number">12345</span></p>
        <p>Vehicle Type: <span id="vehicle-type">Sedan</span></p>
        <p>License Number: <span id="license-number">AB 1234 CD</span></p>
        <p>Arrival Date: <span id="arrival-date">2023-08-14</span></p>
    </div>
    <hr class="divider">
    <h4>Detail Harga</h4>
    <div col-auto>
        <p>Jenis Jasa: <span id="jenis jasa">dr database beserta harganya</span></p>
        <p>Sparepart : <span id="spare part">dr database beserta harganya</span></p>
        <p>Total Biaya : <span id="total biaya">total harga</span></p>
    </div>
    <button class="btn btn-primary btn-print" onclick="printInvoice()">Print Invoice</button>
    <button class="btn btn-primary btn-open-modal">Selesai</button>
</div>
<!-- Modal -->
<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmationModalLabel">Konfirmasi Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda ingin menyelesaikan transaksi?</p>
                <p>Jenis WO: <span id="modal-wo-type">Sedan</span></p>
                <p>Total Biaya: <span id="modal-total-cost">$100</span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <button type="button" class="btn btn-primary">Selesai</button>
            </div>
        </div>
    </div>
</div>
<script>
    function loadWoDetail(woNumber) {
        // Ganti detail sesuai dengan nomor WO yang dipilih
        document.getElementById('wo-number').textContent = woNumber;
        // Tambahkan logika lain untuk mengganti detail yang lain
    }
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        fetch('get_wo_list.php')
        .then(response => response.json())
        .then(data => {
            const woList = document.getElementById('wo-list');
            data.forEach(woNumber => {
                const listItem = document.createElement('li');
                listItem.textContent = woNumber;
                listItem.addEventListener('click', () => loadWoDetail(woNumber));
                woList.appendChild(listItem);
            });
        });
    });
</script>
<script>
    function loadWoDetail(woNumber) {
        fetch(`get_wo_detail.php?wo=${woNumber}`)
        .then(response => response.json())
        .then(data => {
            // Mengganti nilai detail sesuai dengan data dari database
            document.getElementById('vehicle-type').textContent = data.vehicleType;
            document.getElementById('license-number').textContent = data.licenseNumber;
            document.getElementById('arrival-date').textContent = data.arrivalDate;
            // Tambahkan logika untuk mengganti detail harga
        });
    }
</script>
<script>
    document.querySelector('.btn-open-modal').addEventListener('click', function() {
        // Set nilai di dalam modal
        document.getElementById('modal-wo-type').textContent = document.getElementById('vehicle-type').textContent;
        document.getElementById('modal-total-cost').textContent = "$100"; // Ubah dengan total biaya yang sesuai
        // Tampilkan modal
        $('#confirmationModal').modal('show');
    });
</script>
<script>
    function printInvoice() {
        // Logika untuk mencetak invoice
        window.print();
    }
</script>
<script>
    document.getElementById("wo-number").textContent = "12345";
    document.getElementById("vehicle-type").textContent = "Sedan";
    document.getElementById("license-number").textContent = "AB 1234 CD";
    document.getElementById("arrival-date").textContent = "2023-08-14";
</script>
</body>
</html>
