<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    public function academicCycles()
    {
        return $this->hasMany(AcademicCycle::class);
    }

    public function levels()
    {
        return $this->hasMany(Level::class);
    }
}
