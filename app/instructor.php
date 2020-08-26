<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class instructor extends Model
{
    use Authenticatable;
    
    public $timestamps = false;
    protected $fillable = [
    	'instructorFirstName', 'instructorLastName', 'instructorEmail',
    	'instructorPassword', 'instructorBirthday', 'instructorPhone',
    	'instructortImage', 'instructorHQR', 'instructorAbstract', 'instructorCountry', 
    	'instructorRegion', 'instructorCP', 'createdBy', 'modifyDate', 'modifyBy'
    ];
}
