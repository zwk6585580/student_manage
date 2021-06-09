<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'student';

    public function classes()
    {
        return $this->belongsTo('App\Models\Classes','class_id','id');
    }

    public function grade()
    {
        return $this->belongsTo('App\Models\Grade');
    }
}
