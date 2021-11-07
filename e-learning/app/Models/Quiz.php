<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'subject_id',
        'duration',
        'expire_at',
        'published',
    ];

    public function questions(){
        return $this->hasMany(Question::class);
    }
    public function subject(){
      return  $this->belongsTo(Subject::class);
    }
    public function  getPublished(){
        if ($this->published == 1){
            return 'مرئي' ;

        }else{
            return  'غير مرئي' ;
        }
    }
}
