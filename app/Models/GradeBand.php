<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradeBand extends Model
{
    use HasFactory;

    public function gradingScheme()
    {
        return $this->belongsTo(GradingScheme::class);
    }
}
