@extends('layouts.app')
@section('content')
@php
 $user=auth()->user();   
@endphp

<label for="" class=" w-100 text-white pl-1" style="background-color:#560656; font-size:24px;">My Penalities</label>
<div class="w-100 ">
    <button class="btn btn-dark mb-2 " id="renewall" onclick="" disabled>Pay Penalities</button>
</div>
<table class="table table-bordered">
      <thead>
        <tr>
            <th scope="col"><input type="checkbox" name="renew"  onclick="toggle(this);"> </td>
            <th scope="col">Title</td>
            <th scope="col">Overdue Since</td>
            <th scope="col">Penality</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($user->overdue as $book)
        <tr scope="row">
        <td>  <input type="checkbox" name="renew[]"  onclick="changeStatus(this);"></td>
           <td>{{$book->title}}</td>
           <td>{{$book->pivot->over_since}}</td>
          
        <td>{{$book->pivot->penality}}</td> 
        </tr>
    @endforeach  
    <tr>
    <td colspan="3" style="text-align:right;">Total Penality is:</td> 
    <td>    {{$user->penality}}</td>
</tr>
    </tbody>
</table>
@endsection
