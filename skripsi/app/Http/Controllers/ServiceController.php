<?php

namespace App\Http\Controllers;

use App\Models\BookingModel;
use App\Models\PelangganModel;
use App\Models\WorkingOrderModel;
use App\Models\User;
use App\Models\WIPModel;
use DbPelanggan;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\ForemanModel;
use App\Models\TeknisiModel;
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

        return view('customer.onBooking', compact('title', 'pelanggan', 'booking'));
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
    public function dashboardTable()
    {
        $title = 'BMW OFFICE';
        return view('admin.Dashboard', ['title' => $title]);
    }
    public function inputWO()
    {
        $dataWo = WorkingOrderModel::all();
        $dataWip = WIPModel::all();
        $title = 'BMW OFFICE';
        return view('admin.inputWO', compact('title', 'dataWo', 'dataWip'));
    }

    public function submitWO(Request $request)
    {
        $user = User::where('nama', $request->pic_Service)->first();
        $sparepart = $request->input('sparepart', []);
        $sparepartJSON = json_encode($sparepart);
        $sparepartCount = count($sparepart);

        $biaya = $sparepartCount * 5000; 
        $estimasi_waktu = $sparepartCount * 5; 

        WorkingOrderModel::create([
            'no_wo' => $request->no_wo,
            'tanggal_mulai' => $request->tgl_mulai,
            'waktu_mulai' => $request->waktu_mulai,
            'no_polisi' => $request->no_polisi,
            'service_advisor' =>  $user->id,
            'status' => 'prepare',
            'waktu_estimasi_selesai' => $estimasi_waktu,
            'biaya' => $biaya,
            'sparepart' => $sparepartJSON,
        ]);

        WIPModel::create([
            'no_wip' => $request->no_wip,
            'no_wo' => $request->no_wo
        ]);

        //Update Pelanggan
        $pelanggan = PelangganModel::where('no_polisi', $request->no_polisi)->first();

        $pelanggan->update([
            'no_rangka' => $request->no_kerangka,
            'kilometer' => $request->kilometer,
            'tanggal_registrasi' => $request->tanggal_registrasi
        ]);

        $wo = WorkingOrderModel::all();
        $last = $wo->last();
        $id = $last->no_wo;
        $dataWo = WorkingOrderModel::where('no_wo', $id)->first();
        $dataWip = WIPModel::where('no_wo', $id)->first();
        $title = 'BMW OFFICE';

        // Debug output
        // dd($id, $dataWo, $dataWip); // Add this line to see the values

        return redirect()->route('detailWO', ['id' => $id])->with(compact('dataWo', 'title', 'dataWip'));
    }

    public function detailWO($id)
    {
        $dataWo = WorkingOrderModel::where('no_wo', $id)->first();
        $dataWip = WIPModel::where('no_wip', $id)->first();
        $title = 'BMW OFFICE';
        return view('admin.detailWO', compact('title', 'dataWo', 'dataWip'));
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
        // return view('admin.inputWO', compact('title', 'dataWo', 'dataWip'));
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
