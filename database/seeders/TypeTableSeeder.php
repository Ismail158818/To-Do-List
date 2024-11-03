<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Type;
class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ['type_name' => 'Home'],
            ['type_name' => 'Work']
        ];

        foreach ($types as $type) {
            Type::create($type);
        }
    }
}
