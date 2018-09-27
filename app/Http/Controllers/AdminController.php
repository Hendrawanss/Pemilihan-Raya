<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{
    public function getDataPresma()
    {
        $presma = DB::table('tbl_pilihan')
                    ->join('tbl_presma','tbl_pilihan.presma','=','tbl_presma.no')
                    ->select('tbl_presma.presma')
                    ->groupBy('presma')
                    ->orderBy('urutan')
                    ->get();
        $jp = DB::table('tbl_pilihan')
                    ->select(DB::raw('count(*) as jumlah'))
                    ->groupBy('presma')
                    ->get();
        
        $bpm = DB::table('tbl_bpm')
                    ->join('tbl_pilihan','tbl_bpm.no','=','tbl_pilihan.bpm')
                    ->join('tbl_pemilih','tbl_bpm.nim','=','tbl_pemilih.nim')
                    ->join('tbl_jurusan','tbl_pilihan.jurusan','=','tbl_jurusan.id_jurusan')
                    ->select('tbl_bpm.*','tbl_pilihan.bpm','tbl_pilihan.jurusan','tbl_jurusan.id_jurusan',
                             'tbl_jurusan.nama_jurusan','tbl_pemilih.nama_mhs')
                    ->groupBy('tbl_pilihan.jurusan')
                    ->orderBy('urutan','asc')
                    ->get();
        
        $Spilih = DB::table('tbl_pilihan')
                    ->select('*')
                    ->count();

        $tot_pemilih = DB::table('tbl_pemilih')
                    ->select('*')
                    ->count();
        
        $Selisih = $tot_pemilih - $Spilih;

        $nilai = [$Spilih,$Selisih,$tot_pemilih];

        return view('admin.dashboard',['presma'=>$presma,'jp'=>$jp,'nilai'=>$nilai]);
    }
    public function getDataElektro(){
        $je = DB::table('tbl_pilihan')
                        ->join('tbl_bpm','tbl_pilihan.bpm','=','tbl_bpm.no')
                        ->join('tbl_pemilih','tbl_pemilih.nim','=','tbl_bpm.nim')
                        ->select(DB::raw('tbl_pemilih.nama_mhs,count(tbl_pilihan.bpm) as jumlah'))
                        ->where('tbl_pilihan.jurusan','=',1)
                        ->groupBy('bpm')
                        ->orderBy('tbl_bpm.urutan','asc')
                        ->get();

        $Spilih = DB::table('tbl_pilihan')
                        ->select('*')
                        ->where('jurusan','=',1)
                        ->count();

        $tot_pemilih = DB::table('tbl_pemilih')
                        ->select('*')
                        ->where('jurusan','=',1)
                        ->count();
            
        $Selisih = $tot_pemilih - $Spilih;

        $nilai = [$Spilih,$Selisih,$tot_pemilih];

        return view('admin.bpm_elektro',['je'=>$je,'nilai'=>$nilai]);
    }
    public function getDataSipil(){
        $js = DB::table('tbl_pilihan')
                        ->join('tbl_bpm','tbl_pilihan.bpm','=','tbl_bpm.no')
                        ->join('tbl_pemilih','tbl_pemilih.nim','=','tbl_bpm.nim')
                        ->select(DB::raw('tbl_pemilih.nama_mhs,count(tbl_pilihan.bpm) as jumlah'))
                        ->where('tbl_pilihan.jurusan','=',3)
                        ->groupBy('bpm')
                        ->orderBy('tbl_bpm.urutan','asc')
                        ->get();

        $Spilih = DB::table('tbl_pilihan')
                        ->select('*')
                        ->where('jurusan','=',3)
                        ->count();

        $tot_pemilih = DB::table('tbl_pemilih')
                        ->select('*')
                        ->where('jurusan','=',3)
                        ->count();
            
        $Selisih = $tot_pemilih - $Spilih;

        $nilai = [$Spilih,$Selisih,$tot_pemilih];

        return view('admin.bpm_sipil',['js'=>$js,'nilai'=>$nilai]);
    }

    public function getDataMesin(){
        $jm = DB::table('tbl_pilihan')
                        ->join('tbl_bpm','tbl_pilihan.bpm','=','tbl_bpm.no')
                        ->join('tbl_pemilih','tbl_pemilih.nim','=','tbl_bpm.nim')
                        ->select(DB::raw('tbl_pemilih.nama_mhs,count(tbl_pilihan.bpm) as jumlah'))
                        ->where('tbl_pilihan.jurusan','=',2)
                        ->groupBy('bpm')
                        ->orderBy('tbl_bpm.urutan','asc')
                        ->get();

        $Spilih = DB::table('tbl_pilihan')
                        ->select('*')
                        ->where('jurusan','=',2)
                        ->count();

        $tot_pemilih = DB::table('tbl_pemilih')
                        ->select('*')
                        ->where('jurusan','=',2)
                        ->count();
            
        $Selisih = $tot_pemilih - $Spilih;

        $nilai = [$Spilih,$Selisih,$tot_pemilih];

        return view('admin.bpm_mesin',['jm'=>$jm,'nilai'=>$nilai]);
    }
    public function getDataAdbis(){
        $jab = DB::table('tbl_pilihan')
                        ->join('tbl_bpm','tbl_pilihan.bpm','=','tbl_bpm.no')
                        ->join('tbl_pemilih','tbl_pemilih.nim','=','tbl_bpm.nim')
                        ->select(DB::raw('tbl_pemilih.nama_mhs,count(tbl_pilihan.bpm) as jumlah'))
                        ->where('tbl_pilihan.jurusan','=',5)
                        ->groupBy('bpm')
                        ->orderBy('tbl_bpm.urutan','asc')
                        ->get();

        $Spilih = DB::table('tbl_pilihan')
                        ->select('*')
                        ->where('jurusan','=',5)
                        ->count();

        $tot_pemilih = DB::table('tbl_pemilih')
                        ->select('*')
                        ->where('jurusan','=',5)
                        ->count();
            
        $Selisih = $tot_pemilih - $Spilih;

        $nilai = [$Spilih,$Selisih,$tot_pemilih];

        return view('admin.bpm_adbis',['jab'=>$jab,'nilai'=>$nilai]);
    }
    public function getDataAkuntansi(){
        $ja = DB::table('tbl_pilihan')
                        ->join('tbl_bpm','tbl_pilihan.bpm','=','tbl_bpm.no')
                        ->join('tbl_pemilih','tbl_pemilih.nim','=','tbl_bpm.nim')
                        ->select(DB::raw('tbl_pemilih.nama_mhs,count(tbl_pilihan.bpm) as jumlah'))
                        ->where('tbl_pilihan.jurusan','=',4)
                        ->groupBy('bpm')
                        ->orderBy('tbl_bpm.urutan','asc')
                        ->get();

        $Spilih = DB::table('tbl_pilihan')
                        ->select('*')
                        ->where('jurusan','=',4)
                        ->count();

        $tot_pemilih = DB::table('tbl_pemilih')
                        ->select('*')
                        ->where('jurusan','=',4)
                        ->count();
            
        $Selisih = $tot_pemilih - $Spilih;

        $nilai = [$Spilih,$Selisih,$tot_pemilih];

        return view('admin.bpm_akun',['ja'=>$ja,'nilai'=>$nilai]);
    }

    public function indexPresma()
    {
        $presma = DB::table('tbl_presma')
                        ->select('*')
                        ->get();
            
        return view('admin.dataPresma',['presma'=>$presma]);
    }

    public function indexBpm()
    {
        $bpm = DB::table('tbl_bpm')
                        ->join('tbl_pemilih','tbl_bpm.nim','=','tbl_pemilih.nim')
                        ->join('tbl_jurusan','tbl_jurusan.id_jurusan','=','tbl_pemilih.jurusan')
                        ->select('tbl_pemilih.nama_mhs','tbl_jurusan.nama_jurusan','tbl_bpm.*')
                        ->get();
            
        return view('admin.dataBpm',['bpm'=>$bpm]);
    }

    public function mhsElektro()
    {
        $mE = DB::table('tbl_pemilih')
                        ->join('tbl_jurusan','tbl_jurusan.id_jurusan','=','tbl_pemilih.jurusan')
                        ->select('tbl_pemilih.*','tbl_jurusan.nama_jurusan')
                        ->where('jurusan','=', 1)
                        ->get();
            
        return view('admin.mhs_elektro',['mhs_elektro'=>$mE]);
    }
    public function mhsMesin()
    {
        $mM = DB::table('tbl_pemilih')
                        ->join('tbl_jurusan','tbl_jurusan.id_jurusan','=','tbl_pemilih.jurusan')
                        ->select('tbl_pemilih.*','tbl_jurusan.nama_jurusan')
                        ->where('jurusan','=', 2)
                        ->get();
            
        return view('admin.mhs_mesin',['mhs_mesin'=>$mM]);
    }
    public function mhsSipil()
    {
        $mS = DB::table('tbl_pemilih')
                        ->join('tbl_jurusan','tbl_jurusan.id_jurusan','=','tbl_pemilih.jurusan')
                        ->select('tbl_pemilih.*','tbl_jurusan.nama_jurusan')
                        ->where('jurusan','=', 3)
                        ->get();
            
        return view('admin.mhs_sipil',['mhs_sipil'=>$mS]);
    }
    public function mhsAdbis()
    {
        $mAB = DB::table('tbl_pemilih')
                        ->join('tbl_jurusan','tbl_jurusan.id_jurusan','=','tbl_pemilih.jurusan')
                        ->select('tbl_pemilih.*','tbl_jurusan.nama_jurusan')
                        ->where('jurusan','=', 5)
                        ->get();
            
        return view('admin.mhs_adbis',['mhs_adbis'=>$mAB]);
    }
    public function mhsAkun()
    {
        $mA = DB::table('tbl_pemilih')
                        ->join('tbl_jurusan','tbl_jurusan.id_jurusan','=','tbl_pemilih.jurusan')
                        ->select('tbl_pemilih.*','tbl_jurusan.nama_jurusan')
                        ->where('jurusan','=', 4)
                        ->get();
            
        return view('admin.mhs_akun',['mhs_akun'=>$mA]);
    }
    
    public function login(Request $request)
    {
        $user = $request -> username;
        $pass = $request -> password;

        $admin = DB::table('admin')->whereRaw("username = '$user' && password = '$pass'")->first();

        if($user && $pass)
        {
            if(!$admin)
            {
                return redirect('/admin/login')->with('message');
            }else{
                $request->session()->put('admin', $admin -> username);
                return redirect('admin');
            }
        }else{
            return 0;
        }
    }
    public function logout()
    {
        // menghapus session admin
        session()->forget('admin');
        return redirect('/admin/login');
    }
}
