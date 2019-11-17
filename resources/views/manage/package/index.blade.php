@extends('layouts.manage')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> List of Package </h4>
                    <p class="card-category"> All of your catering packages is here </p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>
                                    #
                                </th>
                                <th>
                                    Package Name
                                </th>
                                <th>
                                    Content
                                </th>
                                <th>
                                    Price
                                </th>
                                <th>
                                    Date Created
                                </th>
                                <th class="text-right">
                                    Action
                                </th>
                            </thead>
                            <tbody>

                                @foreach ($packages as $key => $package)
                                    <tr>
                                        <td>
                                            {{ $key+1 }}
                                        </td>
                                        <td>
                                            {{ $package->name }}
                                        </td>
                                        <td>
                                            {{ $package->content }}
                                        </td>
                                        <td>
                                            RM {{ $package->price }}
                                        </td>
                                        <td>
                                            {{ $package->created_at->format('F d, Y') }}
                                        </td>
                                        <td class="text-right">
                                            <a href="{{ route('package:show', $package->id) }}"  class="btn btn-primary btn-round">view</a>
                                            <a href="{{ route('package:edit', $package->id) }}"  class="btn btn-success btn-round">edit</a>
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
