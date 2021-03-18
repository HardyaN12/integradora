<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario = User::create(
            [
                'name'=> 'Itsuki',
                'email' => 'itsuki@gmail.com',
                'password' => Hash::make('qwerty123'),
                'is_admin' => 1
            ]);

    }
}
