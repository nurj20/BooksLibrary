<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Book;

class BookController extends Controller
{
 public function index(){
     $books = \App\Book::all();
     return view('books.index', compact('books'));
 }
 
public function update($request){
  
    $user_id = auth()->user()->id;

    if (request()->has('bookID'))
   {
      $book_id = request()['bookID'];
      return 'success' . $this->updateReturnDate($user_id, $book_id);
   } 
    else
    {
        for ($i=0; $i< count(request()['data']); $i++) {
            $book_id = request()['data'][$i];
            $this->updateReturnDate($user_id, $book_id);
         }
        return  'success';
    }
}

private function updateReturnDate($user_id, $book_id){

    DB::transaction(function() use ($user_id, $book_id) {
    $date = DB::select('select return_date from borrowed_by_user where user_id=? and book_id=? ;', [$user_id, $book_id]);
    // foreach($dates as )
    DB::update('update borrowed_by_user set return_date =? where user_id=? and book_id=?;', [(Carbon::parse($date[0]->return_date))->addDay(5),  $user_id, $book_id]);
    });
     return ;
}

public function search(Request $request){
    // dd(request()['search']);
    // dd(request()->attributes);
    // dd($request->input('search'));
    $books = Book::where('title', 'like', '%'.request()['search'].'%')->get();
    return view ('books.search', compact('books'));
}

}