<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'level_id',
    ];
    public function quiz(){
     return   $this->hasOne(Quiz::class);
    }
    public  function level(){
        return $this->belongsTo(level::class);
    }
}
