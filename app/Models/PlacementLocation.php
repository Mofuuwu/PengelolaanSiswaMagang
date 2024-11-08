<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlacementLocation extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'address'];
    public $timestamps = false;  

    public function workUnits() {
        return $this->hasMany(WorkUnit::class);
    }
    public function universityAdvisors() {
        return $this->hasMany(UniversityAdvisor::class);
    }

}
