<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'status_id', 'token'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
