<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    //protected $table = 'participants';
    public $timestamps = false;
    protected $fillable = [
    	'courseName', 'instructorId', 'courseDate',
    	'courseDuration', 'courseDescription', 'courseCategory',
    	'courseModality', 'courseCP', 'courseMap', 
    	'courseImage', 'courseStatus', 'maximumPlaces', 'availablePlaces', 'createdBy', 'modifyDate', 'modifyBy'
    ];
}
