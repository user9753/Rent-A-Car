<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=[
            [
                'name'=>'Marko',
                'email'=>'marko.markovic@gmail.com',
                'password'=>Hash::make('marko123'),
                'role'=>'admin',
            ],
            [
                'name'=>'Nikola',
                'email'=>'nikola.nikolic@gmail.com',
                'password'=>Hash::make('nikola123'),
                'role'=>'menager',
            ], 
            [
                'name'=>'Pera',
                'email'=>'pera.peric@gmail.com',
                'password'=>Hash::make('pera123'),
                'role'=>'NULL',
            ], 
            
        ];
    DB::table('users')->insert($user);
    }
    }


            
