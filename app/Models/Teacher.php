<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    
    protected $fillable = ['firstname', 'lastname'];

    public function classes()
    {
        return $this->hasMany(ClassModel::class);
    }
}
