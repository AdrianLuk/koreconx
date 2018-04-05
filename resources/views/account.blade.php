@extends ('layouts.app')

@section('content')

    
    <div class="container">
    <div class="row align-items-center justify-content-center ml-5 my-3">
        <h1 class="text-center">{{Auth::user()->first_name }}'s Account</h1> <button type="button" class="btn btn-primary ml-5" data-toggle="modal" data-target="#addEmailAddress">
    Add Email Address
    </button>
    </div>
        <!-- Modal -->
<div class="modal fade" id="addEmailAddress" tabindex="-1" role="dialog" aria-labelledby="addEmailAddressTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Email Address</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="fas fa-times"></span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
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
                <tr id="email-row">
                    <td>{{ $email->email }}</td>
                    <td>
                        @if ($email->is_default == '1')
                            <span class="fas fa-check text-success"></span>
                        @else
                            <span class="fas fa-times text-danger"></span>
                        @endif
                        </td>
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