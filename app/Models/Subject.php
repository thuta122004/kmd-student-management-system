<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function assignments()
    {
        return $this->hasMany(SubjectAssignment::class);
    }

    public function delivery()
    {
        return $this->hasOne(SubjectDelivery::class);
    }

    public function schedules()
    {
        return $this->hasMany(SessionSchedule::class);
    }

    public function sessions()
    {
        return $this->hasMany(AcademicSession::class);
    }
}
