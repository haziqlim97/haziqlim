@extends('layouts.customer')

@section('content')

<div class="container">
    <table class="table table-borderless">
    <thead>
        <tr >
        <th scope="col" class="border">#</th>
        <th scope="col" class="border">Name</th>
        <th scope="col" class="border">Quantity</th>
        <th scope="col" class="border">Price</th>
        </tr>
    </thead>
    <tbody class="border">
        <tr>
            <th scope="row" class="border-bottom">1</th>
            <td class="border-bottom">
                <div class="media">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRlVa5KaiFAz-6dHSmlmtyI86pW9zGZjYO2Ftp-3ryktqRFTJci" class="mr-3" alt="..." width="128" height="128">
                    <div class="media-body">
                        <h5 class="mt-0">Media heading</h5>
                    </div>
                </div>
            </td>
            <td class="border-bottom" class="text-center">
                <div class="input-group mb-2 form-row">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-secondary" type="button"><i class="fas fa-plus"></i></button>
                    </div>
                    <input type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button"><i class="fas fa-minus"></i></button>
                    </div>
                </div>
            </td>
            <td class="border-bottom">@mdo</td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3" class="border">Total</td>
            <td class="border">RM100</td>
        </tr>
    </tfoot>
    </table>

    <div class="col-lg-4 offset-lg-8">
        <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Have Coupon ?
                    </button>
                </h5>
                </div>

                <div id="collapseOne" class="collapse show border-bottom" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="row">
                        <div class="col-md-8">
                            <form action="">
                                <div class="form-group">
                                    <input type="text" class="form-control">
                                </div>
                            </form>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary">Apply</button>
                        </div>
                        </div>
                            
                    </div>
                </div>
            </div>
        </div>

        <table class="table table-borderless">
            <tr>
                <td>Total</td>
                <td>RM 100</td>
            </tr>
            <tr>
                <td>Shipping</td>
                <td>RM 30</td>
            </tr>
            <tr class="border-top border-dark">
                <td>Total Amount</td>
                <td>RM 130</td>
            </tr>
            <tr>
                <td colspan="2" align="center"><button class="button"> Proceed to Checkout</button></td>
            </tr>
        </table>
    </div>
</div>

@endsection