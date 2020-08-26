<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class preregister extends Model
{
    public $timestamps = false;
    protected $fillable = [
    	'courseId', 'participantId', 'createdBy', 'modifyDate', 'modifyBy'
    ];
}
