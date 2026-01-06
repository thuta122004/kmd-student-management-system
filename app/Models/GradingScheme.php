<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradingScheme extends Model
{
    use HasFactory;

    public function gradeBands()
    {
        return $this->hasMany(GradeBand::class);
    }

    public function finalGrades()
    {
        return $this->hasMany(FinalGrade::class);
    }
}
