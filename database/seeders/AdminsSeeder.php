<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
          [
            'name' => 'Osama Atef',
            'email' => 'osamaatef@gmail.com',
            'password' => Hash::make('123123123'),
            'role' => 1
          ],
         [
            'name' => 'Ahmed Tantawy',
            'email' => 'Tantawy@gmail.com',
            'password' => Hash::make('123123123'),
            'role' => 1
         ],
        ];

        foreach ($data as $item){
            Admin::create($item);
        }
    }
}
