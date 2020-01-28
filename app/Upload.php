<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    protected $fillable = [
    	'file_name','user_id'
    ];

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
