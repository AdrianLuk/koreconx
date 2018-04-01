@extends ('layouts.app')

@section('content')

    <h1 class="text-center">{{Auth::user()->first_name }}'s Account</h1>
    <div class="container">

        <table class="table table-hover table-striped table-bordered m-0">
            <thead>
                <tr class="row m-0 text-center">
                    <th class="col-8">Email Address</th>
                    <th class="col-2">Primary Email</th>
                    <th class="col-2">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr class="row m-0 align-items-center">
                    <td class="col-8 px-0 py-4">adrian@email.com</td>
                    <td class="col-2 px-0 py-4"><span class="fas fa-check"></span></td>
                    <td class="col-2 px-0 py-3">
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
            </tbody>
        </table>
    </div>
    
@endsection