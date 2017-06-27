<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $guarded = [];

    public function quote()
    {
    	return $this->hasMany(Quote::class);
    }
    public function saveQuote($quote, $email)
    {
    	Quote::create([
   	 		'quote' => $quote,
   	 		'author_id' => $this->id
   	 	]);
    }
}
