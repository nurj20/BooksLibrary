<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Book extends Model
{
   
    protected $guarde=[];


    public function author(){
        return $this->belongsTo(\App\Author::class);
    }

    public function borrower(){
        return $this->belongsToMany('\App\User', 'borrowed_by_user', 'book_id', 'user_id');
    }

    public function reserver(){
        return $this->belongsToMany('\App\User', 'reserved_by_user')->withPivot(['reserve_date', 'status', 'return_date']);
    }

    public function overduer(){
        return $this->belongsToMany('\App\User', 'overdue_from_user', 'book_id', 'user_id')->withPivot(['over_since','penality']);
    }
    public function loan(){
        return $this->hasOne('\App\Book' ,'id'); 
     }
     public function catalog(){
        return $this->hasOne('\App\Book' ,'id'); 
     }

        public function inStock(){
        $borrowed = DB::select('select * from borrowed_by_user where book_id = ?', [$this->id]);
        $borrowed = count($borrowed);
        $reserved =   DB::select('select * from reserved_by_user where book_id = ?', [$this->id]);
        $reserved = count($reserved);
        $overdue = DB::select('select * from overdue_from_user where book_id = ?', [$this->id]);
        $overdue = count($overdue);
        $total = $borrowed+$reserved+$overdue;
        return $this->quantity-$total;
     }

}
