@extends('layouts.customer')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h2> Available Packages </h2>
            <p>Find packages fit for your purpose here.</p>
        </div>
    </div>
    <br><br>
    <div class="row mb-5">
        @foreach ($packages as $package)
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ $package->name }}<h4>
                        <p>RM {{ $package->price }}</p>
                    </div>
                    <div class="card-body">
                        {{ $package->content }}
                    </div>
                    <div class="card-footer">
                        <form>
                            <button class="btn btn-primary">Add to Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection