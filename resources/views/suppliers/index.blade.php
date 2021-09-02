@extends('layouts.app')

@section('content')
<div class="container"> 
    @include('inc.messages')
    <div class="py-4">
        <h1 class="float-left">Customers</h1>
        <a href="/suppliers/create" class="btn btn-primary float-right">Add</a>   
    </div>
    @if (count($suppliers) > 0)
    
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col"></th>
                 </tr>
            </thead>
            <tbody>
        @foreach ($suppliers as $supplier)
             <tr>
                <th scope="row"> {{$supplier->supplier_code}} </th>
                <td> {{$supplier->name}} </td>
                <td><a href="/suppliers/{{$supplier->supplier_code}}/edit" class="btn btn-light">Edit</td>
             </tr>
            
        @endforeach
            </tbody>
        </table>
        
    @else <p> There are no suppliers</p>    
    @endif
    
</div>
{{-- @if ( {{posts(count) > 0}})
    
@endif --}}
    
@endsection