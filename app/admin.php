<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class admin extends Model
{
    use Authenticatable;
    
    public $timestamps = false;
    protected $fillable = [
    	'adminFirstName', 'adminLastName', 'adminEmail',
    	'adminPassword', 'instructorHQR', 'createdBy', 'modifyDate', 'modifyBy'
    ];

}
