<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = Hash::make("password");
        $adminData = [

                ['id'=>1,'name'=>'Admin','email' =>'admin@admin.com','password'=>$password,'status'=>1]
        ];

        Admin::insert($adminData);
    }
}
