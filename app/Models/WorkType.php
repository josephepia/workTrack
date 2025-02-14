<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkType extends Model
{
    /** @use HasFactory<\Database\Factories\WorkTypeFactory> */
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
 
     public function lots()
     {
         return $this->hasManyThrough(Lot::class, WorkRecord::class);
     }
}
