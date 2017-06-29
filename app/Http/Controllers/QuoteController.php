<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quote;
use App\Author;

class QuoteController extends Controller
{

//This method takes care of index view and the filters view.
   public function indext($author = null)
   {
   	if (!is_null($author)) {
   		$authorExist = Author::where('authorName', $author)->first();
   		$quotes = $authorExist->quote()->latest()->paginate(6);
   	}else{
		$quotes = Quote::latest()->paginate(6);
	}	
   	return view('index', compact('quotes'));
   }

//This method saves the quote and the author.
   public function save(Request $request)
   {
   	//validate the uesr information.
 	$this->validate($request, [
	 	'quote'=>'required|min:3',
	 	'author'=>'required|min:2|max:60',
	 	'email'=>'required|email'
 	]);
   	 $quote = $request->quote;
   	 $newAuthor = ucfirst($request->author);
   	 $email = $request->email;

   	 //check if an author exist in your database.
   	 $author = Author::where('authorName', $newAuthor)->first();
   	 //if author doesn't exist we create a new one.
   	 if (! $author) {
   	 	$author = Author::create([ 
   	 		'authorName'=>$newAuthor,
   	 		'email'=>$email
   	 		]);
   	 }
   	 //we will save the quote in Author@saveQuote.
   	 $author->saveQuote($quote, $email);
   	 event(new \App\Events\whenQuoteCreated($author));
   	 return back()->with(['success' => 'Your quote has been successfully saved.']);	
   }

//This method delete a quote and author if the author does not have another quote.
   public function deleteQuote($id)
   {
   	//we find the quote we want to delete.
   	$quoteToDelete = Quote::find($id);
   	$Deleteauthor = false;
   	if (count($quoteToDelete->author->quote) === 1) {
   		$quoteToDelete->author->delete();
   		$Deleteauthor = true;
   	}
   	$quoteToDelete->delete();
   	if ($Deleteauthor === true) {
   		return redirect()->route('index')->with(['success'=>'Author and quote has been deleted successfully']);
   	}else{
   		return redirect()->route('index')->with(['success'=>'Quote has been deleted successfully']);
   	}	
   }
   
   public function admin()
   {
      return view('loginadmin'); 
   }
}
