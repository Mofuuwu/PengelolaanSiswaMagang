<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;
    protected $fillable = ['id','name', 'address', 'responsiblePerson'];
    public $timestamps = false;  

    public function schoolAdvisor() {
        return $this->belongsTo(SchoolAdvisor::class);
    }
    public function students() {
        return $this->hasMany(Student::class);
    }
}
