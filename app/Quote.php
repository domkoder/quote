<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    
	protected $guarded = [];
    public function author()
    {
    	return $this->belongsTo(Author::class);
    }
}
