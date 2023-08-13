<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Foreman Control Panel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .order-list {
            border: 2px dashed black;
            padding: 20px;
            background-color: #f4f4f4;
            cursor: pointer;
            margin-top: 20px;
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
            text-decoration: underline;
            margin-top: 20px;
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
    <div class="container">
        <h1>Foreman Control Panel</h1>
        <h2>List Working Order</h2>
    
        <div class="row">
          <div class="col">
            <h3>Orders to be Processed :</h3>
            <!-- Order #1 akan muncul di sini -->
            <div id="ordersToProcess" class="order-list">
                <div id="order1" class="order" draggable="true" ondragstart="drag(event)"><ul>Order #1</ul></div>
                <div id="order2" class="order" draggable="true" ondragstart="drag(event)"><ul>Order #2</ul></div>
            </div>
          </div>
        </div>
    </div>

    <script>
        function allowDrop(event) {
            event.preventDefault();
        }

        function drag(event) {
            event.dataTransfer.setData("text", event.target.id);
        }

        function drop(event) {
            event.preventDefault();
            const orderId = event.dataTransfer.getData("text");
            const orderElement = document.getElementById(orderId);

            if (event.target.classList.contains("order-list")) {
                event.target.appendChild(orderElement);
                updateOrderStatus(orderId, "In Progress");
            }
        }

        function updateOrderStatus(orderId, status) {
            const orderElement = document.getElementById(orderId);
            orderElement.innerText = `${orderId} - ${status}`;
        }
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
                <div id="ordersInProgressB" class="order-list drop-area" ondrop="drop(event, 'Teknisi B')" ondragover="allowDrop(event)">
                </div>
                
                <div class="vehicle">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#taskModal">Lihat Detail</button>

                </div>
            </div>
            <div class="mechanic-info">
                <img src="https://static.vecteezy.com/system/resources/thumbnails/016/007/776/small_2x/mechanic-creative-icon-design-free-vector.jpg" alt="Mekanik 2" width="100" height="100">
                <h2 class="teknisi">{{ $teknisi->isEmpty() ? 'Tidak ada teknisi' : $teknisi->get(1)->nama_teknisi }}</h2>
                <p>Status: <span class="status-icon {{ $teknisi->get(1)->status == 'On Working' ? 'off' : 'on' }}"></span> <br>{{$teknisi->get(1)->status}}</p>
                
                <!-- Pindahkan area drop ke sini -->
                <div id="ordersInProgressB" class="order-list drop-area" ondrop="drop(event, 'Teknisi B')" ondragover="allowDrop(event)">
                </div>
                
                <div class="vehicle">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#taskModal">Lihat Detail</button>
                </div>
            </div>
            <div class="mechanic-info">
                <img src="https://static.vecteezy.com/system/resources/thumbnails/016/007/776/small_2x/mechanic-creative-icon-design-free-vector.jpg" alt="Mekanik 2" width="100" height="100">
                <h2 class="teknisi">{{ $teknisi->isEmpty() ? 'Tidak ada teknisi' : $teknisi->get(2)->nama_teknisi }}</h2>
                <p>Status: <span class="status-icon {{ $teknisi->get(2)->status == 'On Working' ? 'off' : 'on' }}"></span> <br>{{$teknisi->get(2)->status}}</p>
                
                <!-- Pindahkan area drop ke sini -->
                <div id="ordersInProgressB" class="order-list drop-area" ondrop="drop(event, 'Teknisi B')" ondragover="allowDrop(event)">
                </div>
                
                <div class="vehicle">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#taskModal">Lihat Detail</button>
                </div>
            </div>
            <div class="mechanic-info">
                <img src="https://static.vecteezy.com/system/resources/thumbnails/016/007/776/small_2x/mechanic-creative-icon-design-free-vector.jpg" alt="Mekanik 2" width="100" height="100">
                <h2 class="teknisi">{{ $teknisi->isEmpty() ? 'Tidak ada teknisi' : $teknisi->get(3)->nama_teknisi }}</h2>
                <p>Status: <span class="status-icon {{ $teknisi->get(3)->status == 'On Working' ? 'off' : 'on' }}"></span> <br>{{$teknisi->get(3)->status}}</p>
                
                <!-- Pindahkan area drop ke sini -->
                <div id="ordersInProgressB" class="order-list drop-area" ondrop="drop(event, 'Teknisi B')" ondragover="allowDrop(event)">
                </div>
                
                <div class="vehicle">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#taskModal">Lihat Detail</button>
                </div>
            </div>
            <div class="mechanic-info">
                <img src="https://static.vecteezy.com/system/resources/thumbnails/016/007/776/small_2x/mechanic-creative-icon-design-free-vector.jpg" alt="Mekanik 2" width="100" height="100">
                <h2 class="teknisi">{{ $teknisi->isEmpty() ? 'Tidak ada teknisi' : $teknisi->get(4)->nama_teknisi }}</h2>
                <p>Status: <span class="status-icon {{ $teknisi->get(4)->status == 'On Working' ? 'off' : 'on' }}"></span> <br>{{$teknisi->get(4)->status}}</p>
                
                <!-- Pindahkan area drop ke sini -->
                <div id="ordersInProgressB" class="order-list drop-area" ondrop="drop(event, 'Teknisi B')" ondragover="allowDrop(event)">
                </div>
                
                <div class="vehicle">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#taskModal">Lihat Detail</button>
                </div>
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
                <div class="modal-body">
                    <p>No Wo :</p>
                    <p>No Rangka :</p>
                    <p>Jenis Kendaraan:</p>
                    <p>Jenis Layanan :</p>
                    <p>Pergantian Sparepart :</p>
                    <p>Estimasi Waktu :</p>
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
        // Fungsi-fungsi JavaScript Anda di sini
    </script>
</body>
</html>