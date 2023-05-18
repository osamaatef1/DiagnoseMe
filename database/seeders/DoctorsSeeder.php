<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =[[
          'name'=>'Dr Ahmed',
            'address'=>'mansoura'
            ,'info'=>'Diabetes Doctor Graduated since 2001',
            'phoneNumber'=>'0123456789'

        ] ,
            [
                'name'=>'Dr Mouhamed',
                'address'=>'mansoura'
                ,'info'=>'Doctor in liver that has certificate 2001',
                'phoneNumber'=>'0123456789'
            ]
            ];
       foreach ($data as $item){
           Doctor::create($item);
       }
    }

}
