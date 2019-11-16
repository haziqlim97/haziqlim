@extends('layouts.manage')

@section('content')
<div class="row">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Edit User Form</h4>
                <p class="card-category"> Please enter all details </p>
            </div>
            <div class="card-body">
                <form>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Full Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword" value="{{ $user->name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword" value="{{ $user->email }}">
                        </div>
                    </div>

                    <fieldset class="form-group">
                        <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0">Password</legend>
                        <div class="col-sm-10">
                            <div class="col-sm-12 ml-5">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                    <label class="form-check-label" for="gridRadios1">
                                        Don't Change
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                                    <label class="form-check-label" for="gridRadios2">
                                        Manually Register New Password
                                    </label>
                                </div>
                            </div>
                        </div>
                        </div>
                    </fieldset>

                    <fieldset class="form-group">
                        <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0">Role</legend>
                        <div class="col-sm-10">
                            <div class="col-sm-12 ml-5">

                                @foreach ($roles as $role)   
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                        <label class="form-check-label" for="gridRadios1">
                                            {{ $role->display_name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        </div>
                    </fieldset>


                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-primary pull-right" type="submit">Submit form</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection