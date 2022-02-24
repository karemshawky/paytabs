<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['name' => 'Phone', 'parent_id' => 0],
            ['name' => 'Tablet', 'parent_id' => 0],
            ['name' => 'Computer', 'parent_id' => 0],
            ['name' => 'Iphone 13 pro max', 'parent_id' => 1],
            ['name' => 'Sony xperia 1 III', 'parent_id' => 1],
            ['name' => 'Apple AirPods Pro', 'parent_id' => 4],
        ];

        $this->db->table('categories')->insertBatch($data);
    }
}
