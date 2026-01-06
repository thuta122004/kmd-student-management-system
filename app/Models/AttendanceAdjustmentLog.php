<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceAdjustmentLog extends Model
{
    use HasFactory;

    public function attendanceLedger()
    {
        return $this->belongsTo(AttendanceLedger::class);
    }

    public function adjustedBy()
    {
        return $this->belongsTo(Teacher::class, 'adjusted_by');
    }
}
