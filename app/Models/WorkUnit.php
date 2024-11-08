<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkUnit extends Model
{
    use HasFactory;
    public $timestamps = false;  
    protected $fillable = ['name', 'leader', 'placementLocation_id'];
    public function placementLocation() {
        return $this->belongsTo(PlacementLocation::class, 'placementLocation_id');
    }
}
