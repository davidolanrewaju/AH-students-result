<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentScore extends Model
{
    use HasFactory;
    
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    protected $fillable = [
        'course_title',
        'course_code',
        'student_reg_no',
        'ca_score',
        'exam_score',
        'practical_score',
        'total_score',
    ];
}
