@extends ('layouts.app')

@section('content')
        <div class="row align-items-center justify-content-center ml-5 my-3">
    <h1 class="text-center">{{Auth::user()->first_name }}'s Shares</h1><a href="/shares/create" class="ml-3 btn btn-success">Purchase Shares</a>
    </div>
    <div class="container">
        <table class="table table-hover table-striped table-bordered">
            <thead>
                <tr>
                    <th>Company Name</th>
                    <th>Share Class</th>
                    <th>Quantity</th>
                    <th>Price ($)</th>
                    <th>Total Investment ($)</th>
                    <th>Certificate Number</th>
                    <th>Transaction Date</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($shares as $share)
                    <tr>
                        <td>{{ $share->company_name }} </td>
                        <td>{{ $share->share_instrument_name }}</td>
                        <td>{{ $share->quantity }}</td>
                        <td>${{ $share->price }}</td>
                        <td>${{ number_format($share->total_investment, 2, '.', ',') }}</td>
                        <td>{{ $share->certificate_number }}</td>
                        <td>{{ substr($share->transaction_date, 0, 10) }}</td>
                        <td>
                            <ul class="list-inline list-unstyled">
                                <li class="list-inline-item"><a href="/shares/{{$share->id}}/edit" class="btn btn-info px-3">Edit</a></li>
                                    <form class="list-inline-item" action="/shares/{{ $share->id }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </li>
                            </ul>
                        </td> 
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
        
@endsection