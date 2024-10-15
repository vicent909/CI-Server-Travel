<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class CategoriesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                "category" => "Asia",
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                "category" => "Afrika",
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                "category" => "North America",
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                "category" => "South America",
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                "category" => "Europe",
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                "category" => "Antartica",
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                "category" => "Australia",
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ]
        ];

        $this->db->table('categories')->insertBatch($data);
    }
}
