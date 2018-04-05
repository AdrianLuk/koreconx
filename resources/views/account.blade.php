@extends ('layouts.app')

@section('content')

    <h1 class="text-center">{{Auth::user()->first_name }}'s Account</h1>
    <div class="container">

        <table class="table table-hover table-striped table-bordered m-0">
            <thead>
                <tr>
                    <th>Email Address</th>
                    <th>Primary Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($emails as $email)
                <tr>
                    <td>{{ $email->email }}</td>
                    <td><span class="fas fa-check"></span></td>
                    <td>
                        <ul class="list-inline list-unstyled">
                            <li class="list-inline-item"><a href="#" class="btn btn-info px-3">Edit</a></li>
                                <form class="list-inline-item" action="#" method="POST">
                                    @csrf
                                    @method('delete')
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