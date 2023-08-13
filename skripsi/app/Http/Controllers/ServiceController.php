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
        $booking = BookingModel::where('no_polisi', $no_pol)->where('status', 'pending')->first();
        $wo =  $user = WorkingOrderModel::where('no_polisi', $no_pol)->first();


        return view('customer.onBooking', compact('title', 'pelanggan', 'booking', 'wo'));
    }

    public function detailTASK($no_wo)
    {
        $dataWO = WorkingOrderModel::where('no_wo', $no_wo)->first();
        $dataPelanggan = PelangganModel::where('no_polisi', $dataWO->no_polisi)->first();


        $booking = BookingModel::where('no_polisi', $no_wo)->where('status', 'pending')->first();

        return json_decode($pelanggan);
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
    
        $batasBookingPerHari = 20;
    
        if ($jumlahBookingHariIni >= $batasBookingPerHari) {
            $antrianPenuh = BookingModel::whereDate('tgl_booking', Carbon::today())
                ->orderBy('created_at', 'asc')
                ->first();
                $tanggalPenuh = Carbon::parse($antrianPenuh->tgl_booking)->format('d F Y');
            return redirect()->back()->with('error', "Maaf, antrian tanggal $tanggalPenuh sudah penuh.");
        }

        $checkNo = PelangganModel::where('no_polisi',  $noPolisi)->first();
        // dd($checkNo);
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
        $dataWOOnProgress = WorkingOrderModel::where('status', 'On Progress')->get();


        // dd($user->username);

        $teknisi = TeknisiModel::where('foreman_id', $userId)->get();
                // dd($teknisi);

        return view('admin.Dashboard', ['title' => $title, 'user' => $user, 'teknisi' => $teknisi, 'dataWO' => $dataWo, 'dataWOOnProgress' => $dataWOOnProgress]);
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

        WorkingOrderModel::create([
            'no_wo' => $request->no_wo,
            'tanggal_mulai' => $request->tgl_mulai,
            'waktu_mulai' => $request->waktu_mulai,
            'no_polisi' => $request->no_polisi,
            'service_advisor' =>  $user->id,
            'status' => 'prepare',
            'waktu_estimasi_selesai' => $waktu_estimasi_selesai,
            'biaya' => $request->estimatedCost,
            'sparepart' => $sparepartJSON,
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
         ]);

        $wo = WorkingOrderModel::all();
        $last = $wo->last();
        $id = $last->no_wo;
        $dataWo = WorkingOrderModel::where('no_wo', $id)->first();
        $title = 'BMW OFFICE';

        return redirect()->route('detailWO', ['id' => $id])->with(compact('dataWo', 'title'));
    }

    public function detailWO($id)
    {
        $dataWo = WorkingOrderModel::where('no_wo', $id)->first();
        $dataPelanggan = PelangganModel::where('no_polisi', $dataWo->no_polisi)->first();
        $title = 'BMW OFFICE';
        return view('admin.detailWO', compact('title', 'dataWo', 'dataPelanggan'));
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
