<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePeserta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peserta', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomorurut', 4)->default("0000");
            $table->string('nama', 50);
            $table->string('tempatlahir', 20);
            $table->date('tanggallahir');
            $table->string('alamat', 100);
            $table->string('kodepos', 5);
            $table->string('asalsma', 50);
            $table->string('asalprovinsi', 20);
            $table->string('rayon', 15);
            $table->string('nomorhp', 12);
            $table->string('username', 20); 
            $table->string('email', 40);
            $table->string('password', 20);
            $table->string('confirmpassword', 20);
            //Bukti bayar : ID-Rayon-Nama.jpg
            $table->string('buktibayar', 80)->default("Not yet uploaded");
            $table->string('approval', 3)->default("No");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peserta');
    }
}
