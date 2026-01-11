<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_id',
        'level_number',
        'semester_count',
        'nqf_level',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }
}
