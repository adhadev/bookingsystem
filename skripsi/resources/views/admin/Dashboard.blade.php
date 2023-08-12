<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foreman Control Panel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
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
    <div class="container"style="padding-right: 6px;">
        <div class="mechanic">
            <img src="https://static.vecteezy.com/system/resources/thumbnails/016/007/776/small_2x/mechanic-creative-icon-design-free-vector.jpg" alt="Mekanik 1">
            <div class="mechanic-info">
                <h2>Teknisi A</h2>
                <p>Status: <span class="status-icon on"></span> Tersedia</p>
                    
                <div class="vehicle">
                    <h3>Kendaraan yang di-service:</h3>
                    <ul>
                        <li>BMW X1</li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="mechanic">
            <img src="https://static.vecteezy.com/system/resources/thumbnails/016/007/776/small_2x/mechanic-creative-icon-design-free-vector.jpg" alt="Mekanik 2">
            <div class="mechanic-info">
                <h2>Teknisi B</h2>
                <p>Status: <span class="status-icon off"></span> Sedang menjalankan layanan</p>
                
                <div class="vehicle">
                    <h3>Kendaraan yang di-service:</h3>
                    <ul>
                        <li>N/A (Tidak Tersedia)</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="mechanic">
            <img src="https://static.vecteezy.com/system/resources/thumbnails/016/007/776/small_2x/mechanic-creative-icon-design-free-vector.jpg" alt="Mekanik 2">
            <div class="mechanic-info">
                <h2>Teknisi C</h2>
                <p>Status: <span class="status-icon off"></span> Sedang menjalankan layanan</p>
                
                <div class="vehicle">
                    <h3>Kendaraan yang di-service:</h3>
                    <ul>
                        <li>N/A (Tidak Tersedia)</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="mechanic">
            <img src="https://static.vecteezy.com/system/resources/thumbnails/016/007/776/small_2x/mechanic-creative-icon-design-free-vector.jpg" alt="Mekanik 2">
            <div class="mechanic-info">
                <h2>Teknisi D</h2>
                <p>Status: <span class="status-icon off"></span> Sedang menjalankan layanan</p>
                
                <div class="vehicle">
                    <h3>Waiting for services:</h3>
                    <ul>
                        <li>N/A (Tidak Tersedia)</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="mechanic">
            <img src="https://static.vecteezy.com/system/resources/thumbnails/016/007/776/small_2x/mechanic-creative-icon-design-free-vector.jpg" alt="Mekanik 2">
            <div class="mechanic-info">
                <h2>Teknisi E</h2>
                <p>Status: <span class="status-icon off"></span> Sedang menjalankan layanan</p>
                
                <div class="vehicle">
                    <h3>Kendaraan yang di-service:</h3>
                    <ul>
                        <li>N/A (Tidak Tersedia)</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="sidebar">
            <button class="openbtn" onclick="openMechanicSubMenu()">☰ WORKING ORDER</button>
            <div class="mechanic-submenu">
                <div class="working-order-item">
                    <div class="status status-green"></div>
                    <p class="working-order-info">BMW X1 - Waiting Mechanic</p>
                </div>
                <div class="working-order-item">
                    <div class="status status-gray"></div>
                    <p class="working-order-info">BMW X5 - On Service<br>Teknisi A</p>
                </div>
                
                <div class="working-order-item">
                    <div class="status status-gray"></div>
                    <p class="working-order-info">BMW X5 - On Service<br>Teknisi A</p>
                </div>
                <div class="working-order-item">
                    <div class="status status-gray"></div>
                    <p class="working-order-info">BMW X5 - On Service<br>Teknisi A</p>
                </div>
                <div class="working-order-item">
                    <div class="status status-gray"></div>
                    <p class="working-order-info">BMW X5 - On Service<br>Teknisi A</p>
                </div>
                <div class="working-order-item">
                    <div class="status status-gray"></div>
                    <p class="working-order-info">BMW X5 - On Service<br>Teknisi A</p>
                </div>
                <div class="working-order-item">
                    <div class="status status-gray"></div>
                    <p class="working-order-info">BMW X5 - On Service<br>Teknisi A</p>
                </div>
                 <div class="working-order-item">
                    <div class="status status-gray"></div>
                    <p class="working-order-info">BMW X5 - On Service<br>Teknisi A</p>
                </div>
            <div class="working-order">
                
            </div>
        </div>
        <!-- Tambahkan informasi mekanik dan kendaraan lain di sini -->
    </div>
</body>
</html>
