@extends('layouts.app')
@section('content')
            <label for="" class=" w-100 text-white pl-1" style="background-color:#560656; font-size:24px;">My Loans</label>
            <div class="w-100 ">
                <button class="btn btn-dark mb-2 " id="renewall" onclick="renewBooks()">Renew Loans</button>
            </div>
            <table class="table table-bordered">
              
                <thead>
                    <tr>
                        <th scope="col"><input type="checkbox" name="renew"  onclick="toggle(this);"> </td>
                        <th scope="col">Loan</td>
                        <th scope="col">Due Date</td>
                        <th scope="col">Status</td>
                    </tr>
                </thead>
                <tbody>
                  
                    @forelse ($user->borrowed as $book)
                    <tr scope="row">
                    <td  book_id = "{{$book->id}}" user_id="{{$book->pivot->user_id}}"><input type="checkbox" name="renew[]"  onclick="changeStatus(this);"></td>
                       <td>{{$book->loan->title}}</td>
                       <td>{{$book->pivot->return_date}}</td>
                       @if ($book->pivot->return_date > now()->addDay(15)->format('Y-m-d'))
                          <td style="color:red;">cannot be renewed </td>  
                       @else
                       <td><button class="btn" style="background-color:#B8BABA;" onclick="renewOne(this);">Renew</button> </td> 
                       @endif
                       
                    </tr>
                @empty
                    <p>No books borrowed</p>
                @endforelse                   
                </tbody>
            </table>
        <script src="{{asset('js/renew.js')}}"></script>
   @endsection