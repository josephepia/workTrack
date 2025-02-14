<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkRecord extends Model
{
    /** @use HasFactory<\Database\Factories\WorkRecordFactory> */
    use HasFactory;

    protected $filable = [
        'employee_id',
        'lot_id',
        'work_type_id',
        'date',
        'amount',
        'tariff',
    ];

    // Relación con Employee
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    // Relación con Lot
    public function lot()
    {
        return $this->belongsTo(Lot::class);
    }

    // Relación con WorkType
    public function workType()
    {
        return $this->belongsTo(WorkType::class);
    }
}
