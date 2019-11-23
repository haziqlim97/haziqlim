@extends('layouts.customer')

@section('content')

<div class="container">
    <div class="row" style="height:90vh;">
        <div class="col-lg-12 text-center" style="margin:auto;">
            <div class="row" style="margin-top:-91px;">
                <div class="col-lg-12">
                    <h2> Payment Unuccessful </h2>
                    <p>Sorry, We aren't able to process your payments. Please try again.</p>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-12">
                    <a href="/cart" class="btn btn-primary">Return</a><br><br>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection