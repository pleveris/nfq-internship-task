<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'numGroups',
        'numStudentsInEach',
        'studentsTotal'
    ];
    public function studentss()
    {
        return $this->hasMany('App\Models\Student');
    }
}
