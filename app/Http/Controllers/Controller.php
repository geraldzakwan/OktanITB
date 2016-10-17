<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Peserta;
use View;
use Session;
//use Khill\Lavacharts\Lavacharts;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index() {
        if (Session::has('sid') && Session::get('sid')!=12061998) {
            return redirect('uploadBuktiPembayaran');
        } else {
            return redirect('login');
        }
    }

    public function validate(Request $req) {
        $input = $req;
        $str = "";
        $count = 0;
    
        if ($input['search'] === 'email') {
            $count = Peserta::where('email', '=', $input['str'])->count();
        } else if ($input['search'] === 'username') {
            $count = Peserta::where('username', '=', $input['str'])->count();
        }
    
        if ($count>0) {
            if ($input['search'] === 'email') {
                echo "Email already used<br>";
            } else if ($input['search'] === 'username' ) {
                echo "Username already used<br>";
            }
        } else {
            echo "<br><br>";
        }
    }

    public function checkIfExist(Request $req) {
        $input = $req;
        $str = "";
        $count = 0;
    
        if ($input['search'] === 'email') {
            $count = Peserta::where('email', '=', $input['str'])->count();
        } else if ($input['search'] === 'username') {
            $count = Peserta::where('username', '=', $input['str'])->count();
        }
    
        if ($count===0) {
            if ($input['search'] === 'email') {
                echo "Email not found<br><br>";
            } else if ($input['search'] === 'username' ) {
                echo "Username not found<br><br>";
            }
        } else {
            echo "<br><br>";
        }
    }

    public function getRegister() {
        return view('register');
    }

    public function postRegister(Request $req) {

    	//Ambil semua data POST ke input
        $input = $req->all();
        //Buat akun peserta
        Peserta::create($input);

        //Variabel
        //Bentuk nomor urut
        //nanti select max, sementara 0001
        $id = Peserta::where('username', '=', $input['username'])->select('id')->get()->toArray()[0]['id'];

        //Set nomor urut
        $nomorurut = "";
        if ($id<10) {
            $nomorurut = $nomorurut."000".$id;
        } else if ($id<100) {
            $nomorurut = $nomorurut."00".$id;
        } else if($id<1000) {
            $nomorurut = $nomorurut."0".$id;
        } else {
            $nomorurut = $nomorurut.$id;
        }
        $rayon = $input['rayon'];
        $nama = $input['nama'];

        //Buktibayar
        //nanti nama filenya tuh Nomor Urut-Rayon-Nama
        $input['nomorurut'] = $nomorurut;
        //$buktibayar = "Not yet uploaded";
        $approval = "No";

        //Tambahkan 3 info tersebut
        Peserta::where('id', '=', $id)->update(['nomorurut' => $nomorurut]);
        //Peserta::where('id', '=', $id)->update(['buktibayar' => $buktibayar]);
        Peserta::where('id', '=', $id)->update(['approval' => $approval]);

       	Session::put('sid', $id);
        return redirect('uploadBuktiPembayaran');
    }

    public function getUploadBuktiPembayaran() {
        //print_r("masuk sini");
        return view('uploadBuktiPembayaran');
    }

    public function postUploadBuktiPembayaran(Request $req) {
        $target_dir = public_path()."\image";

        $input = $req->all();
        if ($req->hasFile('fotoBukti')) {
            $foto = $req->file('fotoBukti');
            $extension = $foto->getClientOriginalExtension();

            if ($req->file('fotoBukti')->isValid()) {
                //query
                $sid = Session::get('sid');             
                $record = Peserta::where('id', '=', $sid)->select('nomorurut', 'rayon', 'nama')->get()[0];
                $photo_name = $record['nomorurut']."_".$record['rayon']."_".$record['nama'].".jpg";

                //Update nama di basis data
                Peserta::where('id','=',$sid)->update(['buktibayar' => $photo_name]);
                //Upload image ke storage
                $upload_path = $target_dir;
                $req->file('fotoBukti')->move($upload_path, $photo_name);
            }
        }
        
        $inputData = array (
            'message' => 'Bukti pembayaran sudah berhasil diupload'
        );
        return view('uploadBuktiPembayaran') -> with($inputData);
    }

    public function getEditProfile() {
        return view('editProfile');
    }

    public function postEditProfile(Request $req) {
        $input = $req->all();

        //Update
        Peserta::where('username', '=', $input['username'])->update($input);

        $inputData = array (
            'message' => 'Your profile has been updated'
        );
        return view('editProfile') -> with($inputData);
    }

    public function logout(Request $req) {
        session()->flush();
        return redirect('login');
    }

    public function getLogin() {
        return view('login');
    }

    public function postLogin(Request $req) {
        //Ajax
        //Sementara dummy dulu
        $input = $req->all();

        if($input['username'] === 'administratoroktanitb' && $input['password'] === 'geraldidzakwan') {
            Session::start();
            Session::put('sid', 12061998);
            return view('dashboard');
        }
    
        $rec = Peserta::where('username','=',$input['username'])->select('id', 'password')->count();
        if ($rec > 0) {
            $record = Peserta::where('username','=',$input['username'])->select('id', 'password')->get()->toArray()[0];
            if ($input['password'] === $record['password']) {
                Session::start();
                Session::put('sid', $record['id']);
                return redirect('uploadBuktiPembayaran');
            } else {
                $inputData = array (
                    'errorMessage' => 'Wrong password'
                );
                return view('login')->with($inputData);
            }
        } else {
            $inputData = array (
                'errorMessage' => 'No username found'
            );
            return view('login')->with($inputData);
        }
    }

    public function getDashboard() {
        return view('dashboard');
    }

    public function getDetail() {
        return view('details');
    }

    public function postDetail(Request $req) {
        
    }

    public function approve(Request $req) {
        $input = $req;
        Peserta::where('id', '=', $input['id'])->update(['approval' => $input['value']]);
    }
}
