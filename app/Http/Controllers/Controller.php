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
        if (Session::has('sid')) {
            return view('profile');
        } else {
            return view('login');
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
        $buktibayar = $nomorurut.$rayon.$nama;
        $approval = "No";

        //Tambahkan 3 info tersebut
        Peserta::where('id', '=', $id)->update(['nomorurut' => $nomorurut]);
        Peserta::where('id', '=', $id)->update(['buktibayar' => $buktibayar]);
        Peserta::where('id', '=', $id)->update(['approval' => $approval]);

       	Session::put('sid', $id);
        return view('profile');
    }

    public function showProfile() {
    	return view('profile');
    }

    public function showUploadPhoto() {
        return view('uploadPhoto');
    }

    public function showEditProfile() {
        return view('editProfile');
    }

    public function logout(Request $req) {
        session()->flush();
        return redirect('login');
    }

    public function getLogin() {
        return view('login');
    }

    public function postLogin() {
        //Ajax
        //Sementara dummy dulu
        Session::start();
        Session::put('sid', 1);
        return redirect('profile');
    }
}
