@extends('layouts.manage')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> List of Users</h4>
                    <p class="card-category"> All user list </p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>
                                    #
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    E-Mail
                                </th>
                                <th>
                                    Role
                                </th>
                                <th class="text-right">
                                    Action
                                </th>
                            </thead>
                            <tbody>

                                @foreach ($users as $key => $user)
                                    <tr>
                                        <td>
                                            {{ $key+1 }}
                                        </td>
                                        <td>
                                            {{ $user->name }}
                                        </td>
                                        <td>
                                            {{ $user->email }}
                                        </td>
                                        <td>
                                            @foreach ($user->roles as $role)
                                                {{ $role->display_name }}
                                            @endforeach
                                        </td>
                                        <td class="text-right">
                                            <a href="{{ route('manage:user:show', $user->id) }}"  class="btn btn-primary btn-round">view</a>
                                            <a href="{{ route('manage:user:edit', $user->id) }}"  class="btn btn-success btn-round">edit</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
