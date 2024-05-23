<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Record;

class RecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        foreach(range(1,10) as $index) {
            Record::factory()->create([
                'access' => $index % 2 === 1 ? 1 : 0,
            ]);
        }

    }
}

