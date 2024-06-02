<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['class_id', 'attendance_id', 'email', 'firstname', 'lastname', 'course'];

    public function class()
    {
        return $this->belongsTo(ClassModel::class);
    }

    public function attendance()
    {
        return $this->hasOne(Attendance::class);
    }
}
