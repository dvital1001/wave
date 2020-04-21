<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Ticket extends Model
{
	use Searchable;
	
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
