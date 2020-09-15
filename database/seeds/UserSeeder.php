<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 49)->create();
        $this->insertAdmin();
    }

    public function insertAdmin()
    {
        DB::table('users')->insert([
            'fname' => 'fname_admin',
            'lname' => 'lname_admin',
            'email' => 'email@admin.fr',
            'password' => Hash::make(env('ADMIN_PASSWORD')), // password
            'reset_password_token' => Str::random(80),
            'address' => 'address_admin',
            'postalcode' => '69000',
            'city' => 'Lyon',
            'admin' => true,
        ]);
    }
}
