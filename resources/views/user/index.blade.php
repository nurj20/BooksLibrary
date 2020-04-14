@extends('layouts.app')

@section('content')
<div class="container">
    
       @php
          $user = auth()->user();  
       @endphp
       <div class="row">{{$user->id}} </div>
        <div class="row"> {{$user->name}} </div>

        @forelse ($user->reserved as $book)
                <div class="row"> Book ID:  {{$book->book_id}} 
                <br> Status: 
                @if ($book->status == 'ready_for_collection')
                <form action="/reserve/{{$book->book_id}}" method="POST">
                @csrf
                @method('PATCH')
                    <input type="submit" value="Collect">
            
                </form>
                @else
                    {{$book->status}}<br>  
                @endif 
            <div>Charges: {{$user->penality}}</div>
    </div>

        @empty
            <p>no books reserved</p>
        @endforelse
    </div>
@endsection
