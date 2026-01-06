<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceLedger extends Model
{
    use HasFactory;

    public function academicSession()
    {
        return $this->belongsTo(AcademicSession::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function adjustments()
    {
        return $this->hasMany(AttendanceAdjustmentLog::class);
    }
}
