<p style="font-family: serif;">Ini adalah Dially Report {{$date}}.</p>
<div id="container">

</div>
                    
                  
                    @foreach($data as $item)
                <div style="display: flex; flex-wrap: wrap; margin-top: 10px;">
                        <div style="flex: 1; margin-right: 20px;">
                            <p style="color: black; font-size: 16px;">No WO: <span id="woNumber">{{$item['no_wo']}}</span></p>
                            <p style="color: black; font-size: 16px;">Nama Customer: <span id="customerName">{{$item['customer_name']}}</span></p>
                        </div>
                        <div style="flex: 1; margin-right: 20px;">
                            <p style="color: black; font-size: 16px;">No Plat: <span id="noPlat">{{$item['no_polisi']}}</span></p>
                            <p style="color: black; font-size: 16px;">Alamat: <span id="alamat">{{$item['alamat']}}</span></p>
                        </div>
                        <div style="flex: 1;">
                            <p style="color: black; font-size: 16px;">Jenis Mobil: <span id="jenisMobil">{{$item['jenis_mobil']}}</span></p>
                            <p style="color: black; font-size: 16px;">No Rangka: <span id="noRangka">{{$item['no_rangka']}}</span></p>
                        </div>
                    </div>
                    <div style="color: black; display: flex; justify-content: space-between; font-size: 16px;">
                        <p style="color: black;">Jenis Layanan: 
                            @foreach($item['layanan'] as $layanan)
                                {{ $layanan }},
                            @endforeach
                        </p>
                        <p style="color: black;">Harga Layanan: 
                            @foreach($item['layananHarga'] as $harga)
                                {{ $harga }},
                            @endforeach
                        </p>
                    </div>
                    <div style="color: black; display: flex; justify-content: space-between; font-size: 16px;">
                        <p style="color: black;">Jenis Sparepart: 
                            @foreach($item['sparepart'] as $sparepart)
                                {{ $sparepart }},
                            @endforeach
                        </p>
                        <p style="color: black;">Harga Sparepart: 
                            @foreach($item['sparepartHarga'] as $sparepartHarga)
                                {{ $sparepartHarga }},
                            @endforeach
                        </p>
                    </div>



                    <hr style="border-top: 1px solid black; margin: 10px 0;">
                    
                    <hr style="border-top: 1px solid black; margin: 10px 0;">
                    @endforeach

                    <table border="1" cellpadding="5" cellspacing="0" style="border-collapse: collapse; width: 100%;">
                <thead>
                    <tr>
                        <th>No WO</th>
                        <th>Tanggal Pembayaran</th>
                        <th>No Plat</th>
                        <th>Nama Customer</th>
                        <th>Jenis Mobil</th>
                        <th>Alamat</th>
                        <th>No Rangka</th>
                        <th>Jenis Layanan</th>
                        <th>Harga Layanan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                    <tr>
                        <td>{{ $item['no_wo'] }}</td>
                        <td>{{ $item['payment_date'] }}</td>
                        <td>{{ $item['no_polisi'] }}</td>
                        <td>{{ $item['customer_name'] }}</td>
                        <td>{{ $item['jenis_mobil'] }}</td>
                        <td>{{ $item['alamat'] }}</td>
                        <td>{{ $item['no_rangka'] }}</td>
                        <td>
                            @foreach($item['layanan'] as $layanan)
                                {{ $layanan }}
                            @endforeach
                        </td>
                        <td>
                            @foreach($item['layananHarga'] as $harga)
                                {{ $harga }}
                            @endforeach
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>



