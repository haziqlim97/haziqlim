@extends('layouts.manage')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                @foreach ($roles as $role)
                    <div class="card col-md-3 m-4">
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
                                        <th></th>
                                    </thead>
                                    <tbody>

                                        @foreach ($role->permissions as $permission)
                                            <tr>
                                                <td>
                                                    {{ $permission->display_name }}
                                                </td>
                                                <td>
                                                    <i class="nc-icon nc-key-25"></i>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
