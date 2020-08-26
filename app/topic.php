<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class topic extends Model
{
    public $timestamps = false;
    protected $fillable = [
    	'courseId', 'topicName', 'subTopics', 'createdBy', 'modifyDate', 'modifyBy'
    ];
}
