@extends('layouts.app')

@section('content')
<div class="container"> 
    @include('inc.messages')
   <div class="py-4">
        <h1 class="float-left">Customers</h1>
        <a href="/suppliers/create" class="btn btn-primary float-right">Add</a>   
    </div>
    @if (count($customers) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col"></th>
                 </tr>
            </thead>
            <tbody>
        @foreach ($customers as $customer)
             <tr>
                <th scope="row"> {{$customer->customer_id}} </th>
                <td> {{$customer->name}} </td>
                <td><a href="/customers/{{$customer->customer_id}}/edit" class="btn btn-light">Edit</td>
             </tr>
            
        @endforeach
            </tbody>
        </table>
    @else <p> There are no customers</p>    
    @endif
    
</div>
{{-- @if ( {{posts(count) > 0}})
    
@endif --}}
    
@endsection