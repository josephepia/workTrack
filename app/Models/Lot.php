<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lot extends Model
{
    /** @use HasFactory<\Database\Factories\LotFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
    ];

     public function workRecords()
     {
         return $this->hasMany(WorkRecord::class);
     }
 
     public function employees()
     {
         return $this->hasManyThrough(Employee::class, WorkRecord::class);
     }
 
     public function workTypes()
     {
         return $this->hasManyThrough(WorkType::class, WorkRecord::class);
     }
}
