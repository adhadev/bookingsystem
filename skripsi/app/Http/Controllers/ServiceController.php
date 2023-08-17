<?php

namespace App\Http\Controllers;

use App\Models\BookingModel;
use App\Models\PelangganModel;
use App\Models\WorkingOrderModel;
use App\Models\User;
use DbPelanggan;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\ForemanModel;
use App\Models\TeknisiModel;
use App\Models\LayananModel;
use Carbon\Carbon; 
use Illuminate\Support\Facades\Validator;



class ServiceController extends Controller
{
    public function indexBiodata()
    {
        $title = 'Service';
        return view('customer.biodata', compact('title'));
    }

    public function onBooking($no_pol)
    {
        $title = 'Service';
        $pelanggan = PelangganModel::where('no_polisi', $no_pol)->first();
        $booking = BookingModel::where('no_polisi', $no_pol)->first();
        $wo =  $user = WorkingOrderModel::where('no_polisi', $no_pol)->first();
        if ($wo !== null) {
            $sparepartsArray = json_decode($wo->sparepart);
            if (!empty($sparepartsArray)) {
                $sparepart = implode(', ', $sparepartsArray);
            } else {
                $sparepart = "";
            }
        } else {
            $sparepart = "";
        }

        if ($booking !== null) {
            $createdDate = $booking->created_at->format('Y-m-d'); // Dapatkan tanggal pembuatan dalam format Y-m-d
            $sameDayBookings = BookingModel::whereDate('tgl_booking', $booking->tgl_booking)
            ->where('status', '!=', 'Done') // Filter status yang tidak 'Done'
            ->orderBy('created_at')
            ->get();  

            $totalBooking = $sameDayBookings->count(); // Hitung total jumlah booking pada tanggal booking yang sama

        
            $antrian = $sameDayBookings->search(function ($item) use ($booking) {
                return $item->id == $booking->id; 
            }) + 1;        
        } else {
            $antrian = null;
        }
      
        return view('customer.onBooking', compact('title', 'pelanggan', 'booking', 'wo', 'sparepart' , 'totalBooking' ,'antrian' ));
    }

    public function detailTASK($no_wo)
    {
        $dataWO = WorkingOrderModel::where('no_wo', $no_wo)->first();
    
            $dataPelanggan = PelangganModel::where('no_polisi', $dataWO->no_polisi)->first();
    
            $booking = BookingModel::where('no_polisi', $dataWO->no_polisi)->where('status', 'pending')->first();

    
            $waktuArray = explode(':', $dataWO->waktu_estimasi_selesai);
            $jam = (int)$waktuArray[0];
            $menit = (int)$waktuArray[1];
            $totalMenitEstimasi = ($jam * 60) + $menit;

    
            $detail = [
                'NoWO' => $dataWO->no_wo,
                'NoRangka' => $dataPelanggan->no_rangka, 
                'JenisKendaraan' => $dataPelanggan->jenis_mobil, 
                'JenisLayanan' => 'service rutin',  
                'SparePart' => json_decode($dataWO->sparepart), 
                'EstimasiWaktu' => $totalMenitEstimasi 
            ];
    
         return response()->json($detail);
    }

    public function teknisiWO($id_teknisi)
    {
        $dataWO = WorkingOrderModel::where('id_teknisi', $id_teknisi)
        ->where('status', '<>', 'Done')
        ->first();
        
            $dataPelanggan = PelangganModel::where('no_polisi', $dataWO->no_polisi)->first();
            $waktuArray = explode(':', $dataWO->waktu_estimasi_selesai);
            $jam = (int)$waktuArray[0];
            $menit = (int)$waktuArray[1];
            $totalMenitEstimasi = ($jam * 60) + $menit;

        $dataTeknisi = TeknisiModel::where('id_teknisi', $id_teknisi)
        ->where('status', '<>', 'available')
        ->first();
        if ($dataTeknisi !== null) {
            // Lakukan operasi pada objek yang ditemukan
        } else {
            // Tangani kasus jika objek null
        }
      
        if ($dataTeknisi !== null) {
        } else {
            return response()->json(['error' => 'Data teknisi tidak ditemukan', $id_teknisi], 404);
        }
        
        
        
        
        
        
        // dd(dataTeknisi);


    
            $detail = [
                'NoWO' => $dataWO->no_wo,
                'NamaTeknisi' => $dataTeknisi->nama_teknisi,
                'NoRangka' => $dataPelanggan->no_rangka, 
                'JenisKendaraan' => $dataPelanggan->jenis_mobil, 
                'JenisLayanan' => 'service rutin',  
                'SparePart' => json_decode($dataWO->sparepart), 
                'EstimasiWaktu' => $totalMenitEstimasi 
            ];
    
         return response()->json($detail);
    }
    
    public function teknisiAvailable()
    {
        $teknisiList = TeknisiModel::where('foreman_id', 2)
        ->where('status','Available')
        ->get();
       
        $teknisiChain = $teknisiList->map(function ($teknisi) {
            return [
                'Nama' => $teknisi->nama_teknisi
            ];
        });
    
         return response()->json($teknisiChain);
    }
    
    public function invoiceAPI($id)
    {
        $workingOrder = WorkingOrderModel::find($id);
        $pelanggan = PelangganModel::find($workingOrder->no_polisi);
        $formattedPrice = 'Rp ' . number_format($workingOrder->biaya, 2, ',', '.');
             

        $sparepartsArray = json_decode($workingOrder->sparepart); // Ubah JSON string menjadi array

        $sparepartsFormatted = implode(', ', $sparepartsArray);

        return response()->json([
            'kebutuhan' => $workingOrder->no_wo, 
            'invoice_police' => $workingOrder->no_polisi,
            'phone_number' => $pelanggan->no_telp,
            'address' => $pelanggan->alamat,
            'price' => $formattedPrice,
            'sparepart' => $sparepartsFormatted,
            'layanan' => 'Service Rutin',
        ]);
}

public function kerjakanAPI(Request $request, $id )
{
    $teknisiId = $request->input('technician_id'); // Mengambil nilai teknisi_id dari input tersembunyi
    $selectedSparepart = $request->input('maintenance');

    $workingOrder = WorkingOrderModel::find($id);
    $workingOrder->status = 'On Progress';
    $workingOrder->id_teknisi = $teknisiId;
    $workingOrder->save();

    $booking = BookingModel::where('no_wo', $id)->first();
    $booking->status = 'On Progress';
    $booking->pengerjaan = $selectedSparepart;
    $booking->save();

    $teknisi = TeknisiModel::where('id_teknisi', $teknisiId)->first();
    $teknisi->status = 'On Working';
    $teknisi->save();


     response()->json([
        'status' => 'success',
        'message' => 'Data berhasil diproses',
    ]);
    
    return redirect()->back();

}

public function pengerjaanAPI(Request $request, $id )
{

    $noWo = $request->input('noWO'); 
    $noWO = preg_replace('/\D/', '', $noWo); // Ini akan menghapus semua karakter non-digit

    $selectedSparepart = $request->input('maintenance');



    // $workingOrder = WorkingOrderModel::find($noWo);
    // $workingOrder->status = 'On Progress';
    // $workingOrder->id_teknisi = $teknisiId;
    // $workingOrder->save();

    $booking = BookingModel::where('no_wo', $noWO)->first();
    $booking->status = 'On Progress';
    $booking->pengerjaan = $selectedSparepart;
    $booking->save();





    // $teknisi = TeknisiModel::where('id_teknisi', $teknisiId)->first();
    // $teknisi->status = 'On Working';
    // $teknisi->save();


     response()->json([
        'status' => 'success',
        'message' => 'Data berhasil diproses',
    ]);
   
    
    return redirect()->back();

}

public function updateDone(Request $request, $id )
{
    // $selectedMaintenance = $request->query('selected'); // Mengambil nilai dari parameter 'selected'


    // dd($layanan);

    // $workingOrders = WorkingOrderModel::find($id);
    // $teknisi = TeknisiModel::where('id_teknisi', $workingOrders->id_teknisi)->get();
    // $teknisiId = $workingOrders->id_teknisi;
    // $teknisi = TeknisiModel::where('id_teknisi', $workingOrders->id_teknisi)->first(); 
    // $teknisi->status = 'available';
    // $teknisi->save();
    $workingOrders = WorkingOrderModel::find($id);
    $teknisi = TeknisiModel::find($workingOrders->id_teknisi);
    if ($teknisi) {
        $teknisi->status = 'available';
        $teknisi->save();
    }

    
    // response()->json([
    //     'status' => 'success',
    //     'message' => 'Data berhasil diproses',
    // ]);

    // return response;
    $workingOrder = WorkingOrderModel::find($id);
    $workingOrder->status = 'Done';
    $workingOrder->id_teknisi = null;
    $workingOrder->save();
    //edited
    $workingOrder = WorkingOrderModel::find($id);
    $booking = BookingModel::where('no_wo', $workingOrder->no_wo)->first(); 
    if ($booking !== null) {
        $booking->status =  'Done';
        $booking->pengerjaan = null;
        $booking->save();
    } else {
    }


  





     response()->json([
        'status' => 'success',
        'message' => 'Data berhasil diproses',
    ]);
    
    return redirect()->back();

}
    
    public function onService()
    {
        $title = 'Service';
        return view('customer.onService', compact('title'));
    }

    public function inputCustomer(Request $request)
    {
        $title = 'Service';
        $noPolisi = $request->no_polisi;
        $tglBooking = $request->tgl_booking;
    
        $jumlahBookingHariIni = BookingModel::whereDate('tgl_booking', $tglBooking)->count();
    
        $batasBookingPerHari = 2;
    
        if ($jumlahBookingHariIni >= $batasBookingPerHari) {
            $errorMessage = "Daily Service Limit Reached<br>Please Try a Different Date !!";
            return redirect()->back()->with('error', $errorMessage);
        }
        
    
        $checkNo = PelangganModel::where('no_polisi',  $noPolisi)->first();
    
        if ($checkNo != null) {
            BookingModel::create([
                'no_polisi' =>   $noPolisi,
                'tgl_booking' => $request->tgl_booking,
            ]);
        } else {
            PelangganModel::create([
                'no_polisi' =>  $noPolisi,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'email' => $request->email,
                'no_telp' => $request->no_telp,
                'jenis_mobil' => $request->jenis_mobil,
            ]);
    
            User::create([
                'no_polisi' =>  $noPolisi,
                'nama' => $request->nama,
                'username' => $request->nama
            ]);
    
            BookingModel::create([
                'no_polisi' =>   $noPolisi,
                'tgl_booking' => $request->tgl_booking,
            ]);
        }
        
        $nopol = $noPolisi;

        // $bookingCount = BookingModel::where('status', 'prepare')
        // ->whereDate('tgl_booking', $request->tgl_booking)
        // ->count(); 
        
        

        // $tglBooking = Carbon::parse($request->tgl_booking); // Mengubah tanggal booking menjadi objek Carbon
        // $hariIni = Carbon::now(); // Tanggal dan waktu hari ini
    
        // $selisihHari = $hariIni->diffInDays($tglBooking); // Menghitung selisih dalam hari
        // $selisihJam = $hariIni->diffInHours($tglBooking); 

        // $jumlahPesanan = $bookingCount; // Ganti dengan jumlah pesanan yang sesuai
        // $waktuDikerjakan = 0;

        // if ($jumlahPesanan >= 5 && $jumlahPesanan <= 10) {
        //     $waktuDikerjakan = 2; // 2 jam
        // } elseif ($jumlahPesanan > 10 && $jumlahPesanan <= 15) {
        //     $waktuDikerjakan = 3; // 3 jam
        // } elseif ($jumlahPesanan > 15 && $jumlahPesanan <= 20) {
        //     $waktuDikerjakan = 4; // 4 jam
        // }
    
        // if ($selisihHari > 0) {
        //     // Jika masih ada beberapa hari menuju tanggal booking
        //     $pesan = "Tersisa " . $selisihHari . " hari (" . $selisihJam . " jam) menuju tanggal booking. Waktu dikerjakan: " . $waktuDikerjakan . " jam";
        // } else {
        //     // Jika tanggal booking adalah hari ini
        //     $pesan = "Tanggal booking hari ini. Waktu dikerjakan: ";
        // }
    //     $pesanan = BookingModel::where('status', 'prepare')
    //     ->whereDate('tgl_booking', $request->tgl_booking)
    //     ->orderBy('created_at') // Urutkan berdasarkan waktu pemesanan
    //     ->get();
    
    // foreach ($pesanan as $index => $pes) {
    //     $nomorAntrian = $index + 1; // Nomor antrian dimulai dari 1
    //     $jamPemesanan = $pes->created_at->format('H:i'); // Format waktu pemesanan menjadi jam:menit
    // }
    //     dd($nomorAntrian,$jamPemesanan); 

    
        return redirect()->route('indexOnBooking', compact('nopol'));
    }
    

    ////
    public function woTable()
    {
        $title = 'BMW OFFICE';
        return view('admin.WO', ['title' => $title]);
    }
    public function dashboardTable(Request $request)
    {
        $title = 'BMW OFFICE';
        $userId = intval($request->input('id'));

        $user = User::where('id', $userId)->first();
        $dataWo = WorkingOrderModel::where('status', 'prepare')->get();
        $dataWoAll = WorkingOrderModel::where('status', '!=', 'Done')->get();

        $dataWOOnProgress = WorkingOrderModel::where('status', 'On Progress')->get();


        // dd($user->username);

        $teknisi = TeknisiModel::where('foreman_id', $userId)->get();
        $teknisiAvailable = TeknisiModel::where('foreman_id', $userId)
        ->where('status', 'Available')
        ->get();
                // dd($teknisi);

        return view('admin.Dashboard', ['title' => $title, 'user' => $user, 'teknisi' => $teknisi, 'dataWOAll' => $dataWoAll, 'dataWO' => $dataWo, 'dataWOOnProgress' => $dataWOOnProgress , 'teknisiAvailable' => $teknisiAvailable]);
    }
    public function inputWO()
    {
        $dataWo = WorkingOrderModel::all();
        $title = 'BMW OFFICE';
        $layananOptions = LayananModel::where('kode', 2)->get();
        $spareparts = LayananModel::where('kode', 1)->get();

        return view('admin.inputWO', compact('title', 'dataWo', 'layananOptions','spareparts'));
    }

    public function submitWO(Request $request)
    {
        $user = User::where('nama', $request->pic_Service)->first();
        $sparepart = $request->input('sparepart', []);
        $sparepartJSON = json_encode($sparepart);
       
        $sparepartCount = count($sparepart);

        $biaya = $sparepartCount * 5000; 
        $estimasi_waktu = $sparepartCount * 5; 

        $booking = BookingModel::where('no_polisi', $request->no_polisi)->where('status', 'pending')->first();
        $estimasi_waktu = $request->estimatedTime;
        $jam_estimasi_selesai = floor($estimasi_waktu / 60); 
        $menit_estimasi_selesai = $estimasi_waktu % 60;
        $waktu_estimasi_selesai = sprintf('%02d:%02d:00', $jam_estimasi_selesai, $menit_estimasi_selesai);
        $namaSpareparts = $request->input('parts'); // Array berisi nama-nama sparepart
        $namaLayanans = $request->input('service'); // Array berisi nama-nama sparepart

    // Ambil hanya field 'nama' dari setiap elemen array
    $namaSparepartsNames = [];
    foreach ($namaSpareparts as $sparepart) {
        $sparepartData = json_decode($sparepart);
        $namaSparepartsNames[] = $sparepartData->nama;
    }
    $namaSparepartsJson = json_encode($namaSparepartsNames); // Mengonversi array menjadi string JSON


    $namaLayanansJson = json_encode($namaLayanans); // Mengonversi array menjadi string JSON


        WorkingOrderModel::create([
            'no_wo' => $request->no_wo,
            'tanggal_mulai' => $request->tgl_mulai,
            'waktu_mulai' => $request->waktu_mulai,
            'no_polisi' => $request->no_polisi,
            'service_advisor' =>  $user->id,
            'status' => 'prepare',
            'waktu_estimasi_selesai' => $waktu_estimasi_selesai,
            'biaya' => $request->estimatedCost,
            'sparepart' => $namaSparepartsJson,
            'layanan' => $namaLayanansJson,
            'tgl_booking' => $booking->tgl_booking,
            'tanggal_estimasi_selesai' => today(),

        ]);

        //Update Pelanggan
        $pelanggan = PelangganModel::where('no_polisi', $request->no_polisi)->first();

        $pelanggan->update([
            'no_rangka' => $request->no_kerangka,
            'kilometer' => $request->kilometer1,
            'tanggal_registrasi' => now(),
        ]);

         //Update Status Booking
         $booking = BookingModel::where('no_polisi', $request->no_polisi)->first();

         $booking->update([
             'status' => 'prepare',
             'no_wo' => $request->no_wo,
         ]);

        $wo = WorkingOrderModel::all();
        $last = $wo->last();
        $id = $last->no_wo;
        $dataWo = WorkingOrderModel::where('no_wo', $id)->first();
        $title = 'BMW OFFICE';

       

        return redirect()->route('detailWO', ['id' => $id])->with(compact('dataWo', 'title'));
    }

    public function updateWO(Request $request)
    {
        $workingOrder = WorkingOrderModel::find($request->no_wo);

        if ($workingOrder) {
            $workingOrder->id_teknisi = $request->teknisiId;
            $workingOrder->status = 'On Progress';
            $workingOrder->save();
        }

        $teknisi = TeknisiModel::find($request->teknisiId);

        if ($teknisi) {
            $teknisi->status = 'On Progress';
            $teknisi->save();
        }
        return redirect()->route('detailWO', ['id' => $id])->with(compact('dataWo', 'title'));
    }

    public function detailWO($id)
    {
        $dataWo = WorkingOrderModel::where('no_wo', $id)->first();


        $dataArray = json_decode($dataWo->layanan, true);
        $names = [];
        foreach ($dataArray as $item) {
            $itemArray = json_decode($item, true); // Melakukan decode JSON pada setiap string JSON
            $names[] = $itemArray['nama'];


        }

        $layananString = implode(', ', $names);
        $sparepartArray = json_decode($dataWo->sparepart); 
        $sparepartString = implode(', ', $sparepartArray);
        // dd($$dataWo->layanan);
        $cleanedJsonString = trim($dataWo->layanan, '"');

        // $jsonString = stripslashes($dataWo->layanan);
        // $layananData = json_decode($jsonString);
        // dd($jsonString);

        $waktuArray = explode(':', $dataWo->waktu_estimasi_selesai	); // Memisahkan jam, menit, dan detik menjadi array
        $jam = (int)$waktuArray[0];
        $menit = (int)$waktuArray[1];
        $detik = (int)$waktuArray[2];

        $totalMenit = ($jam * 60) + $menit + ($detik / 60);


        $dataPelanggan = PelangganModel::where('no_polisi', $dataWo->no_polisi)->first();
        $title = 'BMW OFFICE';
        return view('admin.detailWO', compact('title', 'dataWo', 'dataPelanggan' , 'sparepartString','totalMenit','layananString'));
    }

    public function dataWO(Request $request)
    {
        if ($request->ajax()) {
            $data = WorkingOrderModel::with('pelanggan')->select('*');
            return Datatables::of($data)
                ->addColumn('no_wo', function ($data) {
                    $wo = '<a href="/detail/wo/' . $data->no_wo . '" style="text-decoration: none;">' . $data->no_wo . '</a>';
                    return $wo;
                })
                ->addColumn('pelanggan', function ($data) {
                    return optional($data->pelanggan)->nama;
                })
                ->addColumn('jenis_mobil', function ($data) {
                    return optional($data->pelanggan)->jenis_mobil;
                })
                ->rawColumns(['no_wo', 'pelanggan', 'jenis_mobil'])
                ->make(true);
        }
        // return  view('createWO', [
        //     "title" => 'Create WO'
        // ], compact('data'));
    }

    public function getPelanggan($id)
    {
        // $pelanggan = WorkingOrderModel::where('no_polisi', $id)->first();
        // return json_decode($pelanggan);
        $pelanggan = WorkingOrderModel::where('no_polisi', $id)->first();
    
        if ($pelanggan) {
            return json_decode($pelanggan);
        } else {
            return response()->json([], 200); // Mengembalikan JSON kosong dengan status 200
        }
    }

    public function teknisiForeman($foremanId)
    {
        $foreman = ForemanModel::find($foremanId);
        
        if (!$foreman) {
            return response()->json(['message' => 'Foreman not found'], 404);
        }
        
        $teknisi = $foreman->teknisi;
        
        return response()->json(['foreman' => $foreman, 'teknisi' => $teknisi]);
    }

    public function updateTeknisiInWo($id, Request $request)
    {
        $workOrder = WorkingOrderModel::find($id);

        if (!$workOrder) {
            // Handle jika working order tidak ditemukan
            return response()->json(['message' => 'Working order not found'], 404);
        }

        $teknisiId = $request->input('teknisi_id');

        if (!$teknisiId) {
            // Handle jika teknisi_id tidak ada dalam request
            return response()->json(['message' => 'Teknisi ID is required'], 400);
        }

        // Lakukan pengecekan apakah teknisi_id valid dan ada dalam tabel teknisi
        $teknisi = TeknisiModel::find($teknisiId);

        if (!$teknisi) {
            // Handle jika teknisi tidak ditemukan
            return response()->json(['message' => 'Teknisi not found'], 404);
        }

        // Update id_teknisi dalam working order
        $workOrder->id_teknisi = $teknisiId;
        $workOrder->save();

        return response()->json(['message' => 'Teknisi updated successfully', 'teknisi_id' => $teknisiId], 200);
    }


}
