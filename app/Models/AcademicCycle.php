<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicCycle extends Model
{
    use HasFactory;

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }
}
