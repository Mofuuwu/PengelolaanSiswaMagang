<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniversityAdvisor extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'phoneNumber', 'unit_id', 'placementLocation_id'];
    public $timestamps = false;  
    public function workUnit() {
        return $this->belongsTo(WorkUnit::class, 'unit_id');
    }
    public function placementLocation() {
        return $this->belongsTo(PlacementLocation::class, 'placementLocation_id');
    }
}
