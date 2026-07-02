<?php

namespace Database\Seeders;

use App\Models\Course_status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            'Borrador',
            'Publicado',
            'Finalizado',
        ];

        foreach ($statuses as $status) {
            Course_status::firstOrCreate([
                'name' => $status,
            ]);
        }
    }
}
