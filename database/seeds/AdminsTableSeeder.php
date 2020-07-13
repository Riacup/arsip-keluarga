<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
                    'name'  => "Admin",
                    'email' => 'cupi.supriyati07@gmail.com',
                    'password' => Hash::make('password'),
                ]);
        $admin->assignRole('admin');
    }
}
