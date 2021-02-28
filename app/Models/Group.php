<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillables = [
        'title',
        'project_id',
        'stud_total',
        'stud_count'
    ];

    public function students() 
    {
        return $this->belongsToMany('App\Models\Student');
    }
}
