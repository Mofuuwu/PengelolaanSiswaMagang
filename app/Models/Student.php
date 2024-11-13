<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name', 'class', 'major_id', 'school_id', 'phoneNumber', 'address', 'fatherName', 'fatherJob', 'motherName', 'motherJob', 'schoolAdvisor_id'];
    public $timestamps = false;

    public function major() {
        return $this->belongsTo(Major::class, 'major_id');
    }
    public function school() {
        return $this->belongsTo(School::class, 'school_id');
    }
    public function schoolAdvisor() {
        return $this->belongsTo(SchoolAdvisor::class, 'schoolAdvisor_id');
    }
}
