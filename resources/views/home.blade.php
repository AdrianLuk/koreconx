@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header text-center h1">Welcome {{ Auth::user()->first_name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                
            <a class="btn btn-primary" href="{{ route('shares.index') }}">View Shares</a>
            </div>
        </div>
    </div>
</div>
@endsection
