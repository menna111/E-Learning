<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'phone_number',
        'level_id',


    ];
    public function user(){
        return $this->belongsTo(User::class);
    }


    public function result(){
        return $this->hasMany(QuizStudent::class,'student_id');
    }
}
