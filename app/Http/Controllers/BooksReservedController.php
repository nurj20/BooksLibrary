<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class BooksReservedController extends Controller
{
    public function __construct(){
        return $this->middleware('auth');
    }

    public function index(\App\User $user){
        return view('books.reserved.index', compact('user'));
    }
    public function create(\App\Book $book){
        // if book already reserved by the same user; simply return;
        $rows = DB::select('select book_id from reserved_by_user where user_id =?;',[auth()->user()->id]);
        foreach($rows as $row)
         if ($book->id == $row->book_id)
                return redirect('/catalog')->with('message','book already present');
        // If book not already reserved then reserve it
        auth()->user()->reserved()->attach($book);
        return redirect('/reserved/'.auth()->user()->id);        
    }

    public function update(\App\Book $book){
        DB::transaction(function() use ($book) {
            //attach inserted row to respective pivot table
            auth()->user()->borrowed()->attach($book);   
        
        // detach from user and reserved pivot table
        auth()->user()->reserved()->detach($book);
      
    });  // End of transaction
    
   return back();
    }
}
