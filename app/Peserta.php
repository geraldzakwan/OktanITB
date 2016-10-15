<?php

namespace App;

//use Illuminate\Notifications\Notifiable;
//use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model//Authenticatable //or model
{
    //use Notifiable;

    protected $table = 'peserta';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        //'name', 'email', 'password',
        'nomorurut',
        'nama',
        'tempatlahir',
        'tanggallahir',
        'alamat',
        'kodepos',
        'asalsma',
        'asalprovinsi',
        'rayon',
        'nomorhp',
        'username',
        'email',
        'password',
        'confirmpassword',
        'buktibayar',
        'approval'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //'password', 'remember_token',
    ];
}
