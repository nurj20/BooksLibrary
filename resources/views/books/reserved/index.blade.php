@extends('layouts.app')
@section('content')

<label for="" class=" w-100 text-white pl-1" style="background-color:#560656; font-size:24px;">My Reservations</label>
<table class="table table-bordered">
    <caption>Reserved Books</caption>
    <thead>
        <tr>
            {{-- <th scope="col"><input type="checkbox" name="reserve"  onclick="toggle(this);"> </td> --}}
            <th scope="col">Title</td>
            <th scope="col">Author</td>
            <th scope="col">Status</td>
            <td scope="col">Action</td>
        </tr>
    </thead>
    <tbody>

    @forelse ($user->reserved as $book)
    <tr>
        {{-- <td></td> --}}
       <td> {{$book->title}}</td>
        <td>{{$book->author->name}}</td>
        <td>{{$book->pivot->status}}</td>

        @if ($book->pivot->status == 'ready_for_collection')
          <td>
            <form action="/reserve/{{$book->pivot->book_id}}" method="POST">
                @csrf
                @method('PATCH')
                    <input type="submit" value="Collect">
                </form>
          </td>
        @else
               <td><button disabled>Collect</button></td>
         @endif 
          </tr>
    @empty
        <p>No Reservations</p>
    @endforelse
</tbody>
</table>
@endsection

