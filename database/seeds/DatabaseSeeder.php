<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        // $faker = Faker\Factory::create(); //import library faker

        // $limit = 20; //batasan berapa banyak data

        // for ($i = 0; $i < $limit; $i++) {
        //     DB::table('profile')->insert([ //mengisi datadi database
        //         'nama_depan' => $faker->firstname,
        //         'nama_belakang' => $faker->lastname,
        //         'nik'=> $faker->isbn13,
        //         'tempat_lahir' => $faker->city,
        //         'tanggal_lahir' => $faker->date,
        //         'domisili' => $faker->address,
        //         'nohp' => $faker->phoneNumber,
                
        //     ]);
        // }
    }
}
