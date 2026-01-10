<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicCycle extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_id',
        'exam_cycle',
        'academic_year',
        'cycle_start',
        'cycle_end',
        'cycle_status',
        'is_locked',
    ];

    protected $casts = [
        'cycle_start' => 'date',
        'cycle_end'   => 'date',
        'is_locked'   => 'boolean',
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
