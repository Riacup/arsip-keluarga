<?php

use Illuminate\Database\Seeder;

class DiariSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // insert data ke table pegawai
        DB::table('diari')->insert([
        	'judul' => 'Hari Ulang Tahunku',
        	'tanggal' => '2020-01-10',
        	'deskripsi' => 'lorem ipsum bla bla'
        ]);
    }
}
