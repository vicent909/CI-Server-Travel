<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AllSeeder extends Seeder
{
    public function run()
    {
        $this->call('CategoriesSeeder');
        $this->call('TravelsSeeder');
        $this->call('ImagesSeeder');
    }
}
