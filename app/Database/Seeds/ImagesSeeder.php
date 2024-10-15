<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class ImagesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                "travel_id" => 1,
                "image_url" => "https://images.unsplash.com/photo-1522547902298-51566e4fb383?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjB8fGphcGFufGVufDB8fDB8fHww",
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                "travel_id" => 2,
                "image_url" => "https://plus.unsplash.com/premium_photo-1664304492320-8359efcaad38?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8Y2hpbmF8ZW58MHx8MHx8fDA%3D",
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                "travel_id" => 3,
                "image_url" => "https://images.unsplash.com/photo-1582468546235-9bf31e5bc4a1?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjJ8fHRoYWlsYW5kfGVufDB8fDB8fHww",
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                "travel_id" => 4,
                "image_url" => "https://images.unsplash.com/photo-1688403346944-6d8ac49d4961?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjR8fGxpYmVydHl8ZW58MHx8MHx8fDA%3D",
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                "travel_id" => 5,
                "image_url" => "https://plus.unsplash.com/premium_photo-1688466338520-214516689a1e?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTd8fHBvbGFuZHxlbnwwfHwwfHx8MA%3D%3D",
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                "travel_id" => 6,
                "image_url" => "https://plus.unsplash.com/premium_photo-1661893264436-dca8429bd27b?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTI4fHx2aWV0bmFtfGVufDB8fDB8fHww",
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                "travel_id" => 7,
                "image_url" => "https://images.unsplash.com/photo-1542114633831-6c3880908875?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjJ8fHNpbmdhcG9yZXxlbnwwfHwwfHx8MA%3D%3D",
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                "travel_id" => 8,
                "image_url" => "https://images.unsplash.com/photo-1638239387566-64a11fc0d3ca?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8ODZ8fFBoaWxpcHBpbmVzJTIwZmFtb3VzJTIwcGxhY2VzfGVufDB8fDB8fHww",
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                "travel_id" => 9,
                "image_url" => "https://images.unsplash.com/photo-1444194563460-454833ba6005?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjZ8fGluZG9uZXNpYXxlbnwwfHwwfHx8MA%3D%3D",
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                "travel_id" => 10,
                "image_url" => "https://images.unsplash.com/photo-1678543736046-45ac8ad142f7?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjN8fG1hbGRpdmVzfGVufDB8fDB8fHww",
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ]
        ];

        $this->db->table('images')->insertBatch($data);
    }
}
