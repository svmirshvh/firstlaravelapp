@extends('layouts.app')

@section('content')
<div class="container">
    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div> --}}
        <div class="jumbotron">
            <h1 class="display-4">Let's do this</h1>
            <p class="lead">This is a simple crud app for adding, updating and deleting Customers and Suppliers.</p>
            <hr class="my-4">
            <p class="lead">
                <a class="btn btn-primary btn-md mr-2" href="/customers/create" role="button">Add Customers</a>
                <a class="btn btn-light btn-md" href="/suppliers/create" role="button">Add Suppliers</a>
            </p>
        </div>   
</div>
@endsection
