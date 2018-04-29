@extends ('layouts.app')

@section('content')

    
    <div class="container">
    <div class="row align-items-center justify-content-center ml-5 my-3">
        <h1 class="text-center">{{Auth::user()->first_name }}'s Account</h1> <button type="button" class="btn btn-primary ml-5" data-toggle="modal" data-target="#addEmailAddress">
    Add Email Address
    </button>
    </div>

  
<p class="lead text-center text-danger">* You may only log in using the primary email</p>
        @if ($errors->has('email'))
            <span class="form-text text-center text-danger">Must have a primary email!</span>
        @endif
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
                            <li class="list-inline-item">
                                <a href="/account/{{ $email->id }}/edit" data-id="{{$email->id}}" data-email="{{$email->email}}" data-default="{{$email->is_default}}" class="edit-button btn btn-info px-3" data-toggle="modal" data-target="#editEmailAddress">Edit</a>
                            </li>
                            <li class="list-inline-item">
                                <form action="/account/{{$email->id}}" method="POST">
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
                <!-- Add Email Modal -->
<div class="modal fade" id="addEmailAddress" tabindex="-1" role="dialog" aria-labelledby="addEmailAddressTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addEmailModalTitle">Add Email Address</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="fas fa-times"></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/account" method="post">
            @csrf
            <div class="form-group">
                <label for="email" class="form-control-label text-uppercase font-weight-bold">Email Address <span class="text-danger">*</span></label>
                <input type="email" name="email" class="form-control" id="email" value="{{Request::old('email')}}">
                @if ($errors->has('email'))
                    <span class="form-text text-danger">{{$errors->first('email')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="email_confirmation" class="form-control-label text-uppercase font-weight-bold">Confirm Email Address <span class="text-danger">*</span></label>
                <input type="email" name="email_confirmation" class="form-control" id="email_confirmation">
                 @if ($errors->has('email'))
                    <span class="form-text text-danger">{{$errors->first('email')}}</span>
                @endif
            </div>
            <div class="form-group">
                <div class="custom-checkbox custom-control">
                    <input type="checkbox" name="is_default" class="custom-control-input" id="primarycheck" value="1">
                    <label for="primarycheck" class="custom-control-label text-uppercase font-weight-bold">
                        Set as Primary Email
                    </label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Add Email</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
                        <!-- Edit Email Modal -->
        <div class="modal fade" id="editEmailAddress" tabindex="-1" role="dialog" aria-labelledby="editEmailAddressTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editEmailModalTitle">Edit Email Address</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="fas fa-times"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit-form" method="post">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label for="email_edit" class="form-control-label text-uppercase font-weight-bold">Email Address <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control" id="email_edit">
                            @if ($errors->has('email'))
                                <span class="form-text text-danger">{{$errors->first('email')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <div class="custom-checkbox custom-control">
                                <input type="checkbox" name="is_default" class="custom-control-input" id="primaryemailcheck_edit" value="1">
                                <label for="primaryemailcheck_edit" class="custom-control-label text-uppercase font-weight-bold">
                                    Set as Primary Email
                                </label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update Email</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
                        </div>
                    </form>
                </div>

                </div>
            </div>
        </div>
    </div>
    
@endsection