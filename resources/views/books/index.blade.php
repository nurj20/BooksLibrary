
@extends('layouts.app')
@section('content')
@if (session()->has('message'))
<div class="alert alert-danger" role="alert" onload="closeAlert(this);">
  {{session()->get('message')}}
</div>  
@endif
<label for="" class=" w-100 text-white pl-1" style="background-color:#560656; font-size:24px;">Library Catalog</label>
<table class="table table-bordered">
   
    <thead>
        <tr>
            {{-- <th scope="col"><input type="checkbox" name="reserve"  onclick="toggle(this);"> </td> --}}
            <th scope="col">Title</td>
            <th scope="col">Author</td>
            <th scope="col">Description</td>
            <td scope="col">Avalibility</td>
        </tr>
    </thead>
    <tbody>

@forelse ($books as $book)
<tr scope="row">
  {{-- <td><input type="checkbox" name="renew[]"  onclick="changeStatus(this);"></td> --}}
  <td>{{$book->title}}</td>
     <td>{{$book->author->name}}</td>
     <td>{{$book->description}}</td>
       @auth  
  <td> 
    @if ($book->inStock() > 0)
    <a href="/reserve/{{$book->id}}">Reserve</a>
    @else
    <span style="background-color:red;">out of stock</span>
  </td>
      @endauth
     @endif
  </tr>
@empty
    <p>No Books in the Catalog</p>
@endforelse
</tbody>
</table>

{{-- <script defer>
  function closeAlert(source){
    console.log('c,sdlkmclvm');
    setTimeout(function(source){console.log(source);}, 3000);
  }
</script> --}}
@endsection
