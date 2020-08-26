<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class group extends Model
{
    public $timestamps = false;
    protected $fillable = [
    	'courseId', 'participantId', 'participantScore', 'participantPay', 'createdBy', 'modifyDate', 'modifyBy'
    ];
}
