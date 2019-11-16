@extends('layouts.manage')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-plain">
                <div class="card-header">
                    <h4 class="card-title"> List of Permissions</h4>
                    <p class="card-category"> This is only for view purpose </p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>
                                    Name
                                </th>
                                <th>
                                    Display Name
                                </th>
                                <th>
                                    Description
                                </th>
                                <th class="text-right">
                                    Action
                                </th>
                            </thead>
                            <tbody>

                                @foreach ($permissions as $permission)
                                    <tr>
                                        <td>
                                            {{ $permission->name }}
                                        </td>
                                        <td>
                                            {{ $permission->display_name }}
                                        </td>
                                        <td>
                                            {{ $permission->description }}
                                        </td>
                                        <td class="text-right">
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        <table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
