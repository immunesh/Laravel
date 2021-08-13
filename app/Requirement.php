<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    protected $fillable=['user_id','name','email','phone','area', 'req_name',
    'req_in_days','expected_rent','specific_req'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
