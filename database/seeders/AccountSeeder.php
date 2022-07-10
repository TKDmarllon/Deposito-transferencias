<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('account')->insert([
            "fullname"=>Str::random(10),
	        "cnpj"=>"222333333",
            "email"=>Str::random(8)."@gmail.com",
            "password"=>Hash::make('password'),
            "balance"=>3000
        ]);
    
        DB::table('account')->insert([
            "fullname"=>Str::random(10),
	        "cpf"=>"234234323",
            "email"=>Str::random(8)."@gmail.com",
            "password"=>Hash::make('password'),
            "balance"=>3000
        ]);

        DB::table('account')->insert([
            "fullname"=>Str::random(10),
	        "cpf"=>"6242352",
            "email"=>Str::random(8)."@gmail.com",
            "password"=>Hash::make('password'),
            "balance"=>3000
        ]);
    }
}
