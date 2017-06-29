@extends('layouts.master')

		@section('title')
			Trending quotes
		@endsection	
		
		@section('style')
			<link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		@endsection
		
		@include('layouts.header')
		
		@section('content')
		
			@if(!empty(Request::segment(1)))
				<div class="filter-bar">
					All quote by the author you select. <a href="/">show all Quotes</a>
				</div>
			@endif
			
			@if(count($errors))
			      <div >
			        <ul>  
			          @foreach ($errors->all() as $error)
			            <li class="info-box fail" style="margin-top: 10px;">{{ $error }}</li>
			          @endforeach
			        </ul>  
			      </div>
			 @endif 
			 
			 @if(Session::has('success'))
			 	<li class="info-box success" style="margin-top: 10px;">{{ Session::get('success') }}</li>
			 @endif	
			 
			<section class="quotes">
				<h1>Lastest Quotes</h1>
				
				@for($i=0; $i < count($quotes); $i++)
					<article class="quote">
						<div class="delete">
							<a href="/delete/{{ $quotes[$i]->id }}">x</a>
						</div>
						{{ $quotes[$i]->quote }}
						<div class="info">
							Created by <a href="/{{ $quotes[$i]->author->authorName }}" style="font-weight: bold;">{{$quotes[$i]->author->authorName}}</a> on {{ $quotes[$i]->created_at }}
						</div>
					</article>
				@endfor
				
				<div class="pagination">
					
					@if($quotes->currentpage() !== 1)
						<a class="a" href="{{ $quotes->previousPageUrl() }}">
							<span class="fa fa-caret-left"></span>
						</a>
					@endif
					
					@if($quotes->currentpage() !== $quotes->lastPage() && $quotes->haspages())
						<a class = "a" href="{{ $quotes->nextPageUrl() }}">
							<span class="fa fa-caret-right"></span>
						</a>
					@endif
					
				</div>					
			</section>
			
			<section class="edit-qoute">
				<h1>Add a Quote</h1>
				<form method="post" action="{{ route('save') }}">
					{{ csrf_field()}}
					<div class="input-group">
						<label for="author">Your name</label>
						<input type="text" name="author" id="author" placeholder="Your name" class="me">
					</div>
					<div class="input-group">
						<label for="email">Your email</label>
						<input type="text" name="email" id="author" placeholder="Your email" class="me">
					</div>
					<div class="input-group">
						<label for="quote">Your quote</label>
						<textarea name="quote" id="quote" placeholder="Your quote" row="5"></textarea>
					</div>
					<button class="btn" type="submit">Submit Quote</button>
				</form>
			</section>
			
		@endsection