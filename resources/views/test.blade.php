@extends('layouts.app')

@section('content')

@foreach ($packages as $package)
    
    <div class="card col-md-3">
        <div class="card-header">
            {{ $package->name }}
        </div>
        <div class="card-body">
            {{ $package->content }}
        </div>
        <div class="card-footer">
            <form method="POST" action="{{ route('cart:add', $package->id) }}">
                @csrf

                <button type="submit">Add to Cart</button>
            </form>
        </div>
    </div>
@endforeach

@endsection