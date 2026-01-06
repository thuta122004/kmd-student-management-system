<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    public function academicCycle()
    {
        return $this->belongsTo(AcademicCycle::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function semesters()
    {
        return $this->hasMany(Semester::class);
    }
}
