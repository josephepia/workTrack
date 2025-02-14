<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /** @use HasFactory<\Database\Factories\EmployeeFactory> */
    use HasFactory;

    protected $fillable = [
        'name',

    ];
     
     public function workRecords()
     {
         return $this->hasMany(WorkRecord::class);
     }
 
     
     public function lots()
     {
         return $this->hasManyThrough(Lot::class, WorkRecord::class);
     }
 
     
     public function workTypes()
     {
         return $this->hasManyThrough(WorkType::class, WorkRecord::class);
     }

}
