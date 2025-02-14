<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Lot;
use App\Models\WorkRecord;
use App\Models\WorkType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Obtener IDs generados en los otros seeders
         $employees = Employee::pluck('id');
         $lots = Lot::pluck('id');
         $workTypes = WorkType::pluck('id');
 

        foreach (range(1, 20) as $i) {
            WorkRecord::factory()->create([
                'employee_id' => $employees->random(),
                'lot_id' => $lots->random(),
                'work_type_id' => $workTypes->random(),
            ]);
        }
    }
}
