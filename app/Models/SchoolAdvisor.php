<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolAdvisor extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'phoneNumber', 'school_id'];
    public $timestamps = false;

    public function school() {
        return $this->belongsTo(School::class, 'school_id');
    }
    public function students() {
        return $this->hasMany(Student::class);
    }
}
