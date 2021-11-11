<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizStudent extends Model
{
    use HasFactory;
    protected $fillable=[
        'student_id',
        'quiz_id',
        'result',
        'end_at',
        'finished'
    ];

    public function student(){
        return $this->belongsTo(Student::class);
    }
}
