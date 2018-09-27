<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\jurusan;
use App\pemilih;
use App\presma;
use DB;

class UserController extends Controller
{
    //Area Post
    public function loginJurusan(Request $request)
    { 
        $user = $request -> usernameJur;
        $pass = $request -> passwordJur;

        $jurusan = jurusan::whereRaw("username = '$user' && password = '$pass'")->first();

        if($user && $pass)
        {
            if(!$jurusan)
            {
                return redirect('/')->with('message');
            }else{
                $request->session()->put('jurusan', $jurusan -> id_jurusan);
                return view('loginUser',['jurusan' => $jurusan]);
            }
        }else{
            return redirect('/')->with('message');
        }
    } 

    public function loginUser(Request $request)
    {
        $user = $request -> usernameUser;
        $pass = $request -> passwordUser;
        $id = $request->session()->get('jurusan');

        $pemilih = pemilih::whereRaw("username = '$user' && password = '$pass' && jurusan = '$id'")->first();

        if($user && $pass)
        {
            if(!$pemilih)
            {
                return redirect('/')->with('message');
            }else{
                $request->session()->put('nim', $pemilih -> nim);
                $presma = DB::table('tbl_nomor_urut')
                            ->join('tbl_presma','tbl_nomor_urut.id','=','tbl_presma.urutan')
                            ->select('tbl_presma.*','tbl_nomor_urut.*')
                            ->get();   
                            return view('presma',['presma' => $presma]);
            }
        }else{
            return redirect('/')->with('message');
        }
    }

    public function StorePilihan()
    {
        if(session()->get('nim')!= null){
            // mencari id dari presma
            $presma = presma::where('urutan',session()->get('presma'))->first();
            
            $validate = DB::table('tbl_pilihan')
                        ->where('nim',session()->get('nim'))
                        ->first();
            if(!$validate)
            {
                // Insert ke table pilihan
                $pilihan = DB::table('tbl_pilihan')
                ->insert([
                    'nim' => session()->get('nim'),
                    'presma' => $presma -> no,
                    'bpm' => session()->get('bpm'),
                    'jurusan' => session()->get('jurusan')
                ]);

                //Hapus Session
                session()->forget('bpm');
                session()->forget('nim');
                session()->forget('presma');

                return redirect('user');
            }else{
                // menghapus session bpm dan presma
                session()->forget('bpm');
                session()->forget('presma');

                // menampilkan data presma
                $presma = DB::table('tbl_nomor_urut')
                                ->join('tbl_presma','tbl_nomor_urut.id','=','tbl_presma.urutan')
                                ->select('tbl_presma.*','tbl_nomor_urut.*')
                                ->get();   
                return view('presma',['presma' => $presma]);

                //with modal

            }
        }
        return redirect('/');
    }

    // Area Validasi

    public function validasiLoginJurusan()
    {
        if(session()->get('jurusan')!= null){
            //get isi session jurusan
            $id = session()->get('jurusan');
            //menampilkan jurusan sesuai isi session jurusan
            $jurusan = jurusan::whereRaw("id_jurusan = '$id'")->first();
            return view('loginUser',['jurusan' => $jurusan]);
        } 
        
		return view('loginJurusan');
    }

    public function validasiLogin()
    {
        if(session()->get('jurusan')!= null){
            //get isi session jurusan
            $id = session()->get('jurusan');
            //menampilkan jurusan sesuai isi session jurusan
            $jurusan = jurusan::whereRaw("id_jurusan = '$id'")->first();
            return view('loginUser',['jurusan' => $jurusan]);
        } 
        
		return redirect('/')->with('message','Login Dulu!');
    }

    public function PilihLagi()
    {
        if(session()->get('jurusan')!= null && session()->get('nim')!= null){
            // menghapus session bpm dan presma
            session()->forget('bpm');
            session()->forget('presma');

            // menampilkan data presma
            $presma = DB::table('tbl_nomor_urut')
                            ->join('tbl_presma','tbl_nomor_urut.id','=','tbl_presma.urutan')
                            ->select('tbl_presma.*','tbl_nomor_urut.*')
                            ->get();   
            return view('presma',['presma' => $presma]);
        } 
        
		return redirect('/')->with('message','Login Dulu!');
    }

    // Area Get

    public function getPresma(Request $request, $id)
    {
        if(session()->get('nim')!= null){
            //masukan session presma pilihan
            $request->session()->put('presma',$id);

            //menampilkan data bpm sesuai jurusan
            $bpm = DB::table('tbl_bpm')
                     ->join('tbl_pemilih','tbl_bpm.nim','=','tbl_pemilih.nim')
                     ->join('tbl_nomor_urut','tbl_bpm.urutan','=','tbl_nomor_urut.id')
                     ->where('jurusan','=',session()->get('jurusan'))
                     ->select('tbl_pemilih.nama_mhs','tbl_bpm.*')
                     ->orderBy('urutan')
                     ->get();

            //get isi session jurusan
            $id = session()->get('jurusan');

            //menampilkan jurusan sesuai isi session jurusan
            $jurusan = jurusan::whereRaw("id_jurusan = '$id'")->first();

            return view('bpm',['bpm' => $bpm,'jurusan' => $jurusan]);
        } 
        
		return redirect('/')->with('message','Login Dulu!');
    }
    
    public function getBpm(Request $request, $id)
    {
        if(session()->get('nim')!= null){
            //masukan session bpm pilihan
            $request->session()->put('bpm',$id);

            //menampilkan data bpm
            $bpm = DB::table('tbl_bpm')
                     ->join('tbl_pemilih','tbl_bpm.nim','=','tbl_pemilih.nim')
                     ->join('tbl_nomor_urut','tbl_bpm.urutan','=','tbl_nomor_urut.id')
                     ->where('no','=',session()->get('bpm'))
                     ->select('tbl_pemilih.nama_mhs','tbl_bpm.*')
                     ->first();

            //menampilkan data presma 
            $presma = DB::table('tbl_presma')
                        ->select('tbl_presma.*')
                        ->where('urutan','=', session()->get('presma'))
                        ->first();
            return view('konfirmation',compact('bpm','presma'));
        } 
        
		return redirect('/')->with('message','Login Dulu!');
    }

    //Area Logout

    public function LogJur()
    {
        // menghapus session jurusan
        session()->forget('jurusan');
        return redirect('/');
    }

}
