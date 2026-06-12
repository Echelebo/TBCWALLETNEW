<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    protected $table="comments";
    protected $fillable = ['ticket_id', 'message', 'sender', 'sender_id'];
    public function ticket(){
    	return $this->belongsTo('App\Models\ticket', 'id');
    }
    public function user(){
    	return $this->belongsTo('App\User', 'sender_id');
    }
}
