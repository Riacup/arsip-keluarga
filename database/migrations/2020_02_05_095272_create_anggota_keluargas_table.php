<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotaKeluargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota_keluarga', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('hubungan');
            $table->string('nik');
            $table->string('nama_lengkap');
            $table->boolean('jenis_kelamin')->default(0);       //jenis_kelamin 0 = laki-laki, jenis_kelamin 1 = perempuan
            $table->boolean('status')->default(0);      //status 0 = hidup, status 1 = meninggal
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->date('tanggal_kematian')->nullable();
            $table->string('lokasi_pemakaman')->nullable();
            $table->string('foto')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('anggota_keluarga');
    }
}
