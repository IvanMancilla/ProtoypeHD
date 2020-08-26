<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class participant extends Model
{
    use Authenticatable;
    protected $table = 'participants';
    public $timestamps = false;
    protected $fillable = [
    	'participantFirstName', 'participantLastName', 'participantEmail',
    	'participantPassword', 'participantBirthday', 'participantPhone',
    	'participantImage', 'participantHQR', 'participantCountry', 
    	'participantRegion', 'participantCP', 'createdBy', 'modifyDate', 'modifyBy'
    ];
}
