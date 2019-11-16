@extends('layouts.manage')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                @foreach ($roles as $role)
                    <div class="col-md-4">
                        <div class="card col-md-12">
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
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
