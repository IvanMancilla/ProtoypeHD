<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class schedule extends Model
{
    public $timestamps = false;
    protected $fillable = [
    	'courseId', 'scheduleDay', 'scheduleStart', 'scheduleEnd', 'createdBy', 'modifyDate', 'modifyBy'
    ];
}
