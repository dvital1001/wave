<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
	protected $fillable = [
		'title',
		'text',
		'user_id',
    ];
    
    public function user()
    {
		return $this->belongsTo(User::class);
	}
}