<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BooksBorrowedController extends Controller

{
    public function __construct(){
        return $this->middleware('auth');
    }
    public function index(\App\User $user){
        return view('books.borrowed.index', compact('user'));
        // dd($user->borrowed);
    }

    
}
