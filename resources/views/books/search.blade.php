@extends('layouts.app')
@section('content')
{{-- @forelse ($books as $book) --}}
    {{-- {{$book->title}} --}}
    <table class="table table-bordered">
        {{-- <caption>Library Catalog</caption> --}}
        <thead>
            <tr>
                <th scope="col"><input type="checkbox" name="reserve"  onclick="toggle(this);"> </td>
                <th scope="col">Title</td>
                <th scope="col">Author</td>
                <th scope="col">Description</td>
                <td scope="col">Avalibility</td>
            </tr>
        </thead>
        <tbody>
    
    @forelse ($books as $book)
    <tr scope="row">
      <td><input type="checkbox" name="renew[]"  onclick="changeStatus(this);"></td>
      <td>{{$book->title}}</td>
         <td>{{$book->author->name}}</td>
         <td>{{$book->description}}</td>
         @php
         $borrowed = DB::select('select * from borrowed_by_user where book_id = ?', [$book->id]);
         $borrowed = count($borrowed);
         $reserved =   DB::select('select * from reserved_by_user where book_id = ?', [$book->id]);
         $reserved = count($reserved);
         $overdue = DB::select('select * from overdue_from_user where book_id = ?', [$book->id]);
         $overdue = count($overdue);
         $total = $borrowed+$reserved+$overdue;
       @endphp
       @auth  
      <td> 
        @if ($book->quantity-$total > 0)
        <a href="/reserve/{{$book->id}}">Reserve</a>
        @else
        <span style="background-color:red;">out of stock</span>
      </td>
         
         @endif
         @endauth
      </tr>
   
@empty
    no books founds matching search criteria
@endforelse
</tbody>
</table>    
@endsection


