@extends('layouts.manage')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card card-plain">
            <div class="card-header">
                <h4 class="card-title"> User Information </h4>
                <p class="card-category"> Full Account details </p>
            </div>
            <div class="card-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>
                                Full Name
                            <td>
                            <td>
                                <a href="#" class="nav-link"><b>{{ $user->name }}</b></a>
                            <td>
                        </tr>
                        <tr>
                            <td>
                                Email Address
                            <td>
                            <td>
                                <a href="#" class="nav-link"><b>{{ $user->email }}</b></a>
                            <td>
                        </tr>
                        <tr>
                            <td>
                                Registered at
                            <td>
                            <td>
                                <a href="#" class="nav-link"><b>{{ $user->created_at->format('F d, Y') }}</b></a>
                            <td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        @foreach ($user->roles as $role)
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $role->display_name }}<span class="small">{{ '@'.$role->name }}<span></h3>
                    <p class="card-category"> Description : {{ $role->description }} </p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>
                                    Permission
                                </th>
                                <th class="text-right">
                                    Total : {{ $role->permissions->count() }}
                                </th>
                            </thead>
                            <tbody>

                                @foreach ($role->permissions->slice(0, 6) as $permission)
                                    <tr>
                                        <td>
                                            {{ $permission->display_name }}
                                        </td>
                                        <td class="text-right">
                                            <i class="nc-icon nc-key-25"></i>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                        @if ($role->permissions->count() > 6)
                        <a href="{{route('role:show', $role->id)}}" class="pull-right mr-3 card-link"><b>View More</b></a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="col-md-2">
        <div class="card p-2">
            <div class="card-header">
                <h4 class="card-title"> Tools </h4>
                <p class="card-category">  </p>
            </div>
            <div class="card-body">
                <a href="{{ route('user:edit', $user->id) }}"  class="btn btn-success btn-round">edit</a>
                <a href="{{ route('user:show', $user->id) }}"  
                   class="btn btn-danger btn-round"  
                   data-toggle="modal" 
                   data-target="#deleteModal">delete</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLongTitle">Are you sure ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="deleteUserForm" method="POST" action="{{ route('user:destroy', $user->id)}}">
                    @method('delete')
                    @csrf
                    <div class="form-group">
                        <label for="inputConfirm">If you really want to delete this user please enter <b class="text-danger">CONFIRM</b> in the input below</label>
                        <input type="text" name="confirm" class="form-control" id="inputConfirm" aria-describedby="confirmHelp" placeholder='Enter "CONFIRM"'>
                        <small id="confirmHelp" class="form-text text-muted">You won't be able to retrieve this user again after deletion.</small>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger" form="deleteUserForm" >Delete</button>
            </div>
        </div>
    </div>
</div>
@endsection