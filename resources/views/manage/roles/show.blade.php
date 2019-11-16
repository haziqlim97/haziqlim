@extends('layouts.manage')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="">{{ $role->display_name }}<small>{{ '@'.$role->name }}</small></h2>
                    <p class="p-0">Role Description : {{ $role->description }}</p>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach ($role->permissions->groupBy('name') as $module)
                    <div class="col-md-4">
                        <div class="card col-md-12">
                            <div class="card-header">
                                <h3 class="card-title">{{ collect($module)->first()['name'] }}</h3>
                                <p class="card-category"> Description : {{ collect($module)->first()['name'] }} </p>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">
                                            <th>
                                                Permission
                                            </th>
                                            <th class="text-right">
                                            </th>
                                        </thead>
                                        <tbody>

                                            @foreach ($module as $permission)
                                                <tr>
                                                    <td>
                                                        {{ $permission['permission'] }}
                                                    </td>
                                                    <td class="text-right">
                                                        <i class="nc-icon nc-key-25"></i>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
