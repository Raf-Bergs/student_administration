<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function programme()
    {
        return $this->belongsTo('App\Programme')->withDefault();
    }

    public function student_course()
    {
        return $this->hasMany('App\StudentCourse');
    }
}
