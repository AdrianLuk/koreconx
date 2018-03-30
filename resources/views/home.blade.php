@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header text-center h1">Welcome {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h2 class="text-center">Please pick an option below</h2>
                </div>
                <div class="row justify-content-center card-footer m-0">
            <a class="btn btn-warning mx-2" href="{{ route('shares.create') }}">Purchase Shares</a>
            <a class="btn btn-info mx-2" href="{{ route('shares.index') }}">View Shares</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
