@extends('layouts.manage')

@section('content')
    <div class="row">
        @if ($orders->isEmpty())
            <div class="col-lg-12 justify-content-center" 
                style="
                height: 50vh;
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-align: center;
                -webkit-align-items: center;
                -ms-flex-align: center;
                align-items: center
                ">
                <div class="text-center">
                    <i class="nc-icon nc-delivery-fast text-danger" style="font-size:60px;"></i>
                    <br>
                    Aww,
                    Your Order List is Empty, <br>
                    Please wait for new order and it will appear here.<br><br>
                    If you don't have any packages, add one now!
                    <br>
                    <a href="{{ route('package:create') }}" class="btn btn-primary btn-large">Create New Package</a>
                    <br><br>
                </div>     
            </div>
        @else
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('package:create') }}" class="btn btn-primary pull-right">Create New Package</a>
                    <h4 class="card-title"> 
                        List of Order 
                    </h4>
                    <p class="card-category"> All of your catering orders is here </p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>
                                    Order #
                                </th>
                                <th>
                                    Items
                                </th>
                                <th>
                                    Status
                                </th>
                                <th class="text-right">
                                    Action
                                </th>
                            </thead>
                            <tbody>

                                @foreach ($orders as $key => $order)
                                    <tr>
                                        <td>
                                            {{ $key+1 }}
                                        </td>
                                        <td>
                                            @foreach ($order->items as $item)
                                                {{ json_decode($item->item)->name }}
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $order->status }}
                                        </td>
                                        <td class="text-right">
                                            <a href="{{ route('order:show', $order->id) }}"  class="btn btn-primary btn-round">view</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>

                        
        @endif
    </div>
@endsection
