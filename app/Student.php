<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function progamme()
    {
        return $this->belongsTo('App\Programme')->withDefault();
    }

    public function student_course()
    {
        return $this->hasMany('App\StudentCourse');
    }
}
