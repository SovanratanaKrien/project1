@extends('layouts.app')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>{{ __('Product Show') }}
                        <a class="btn btn-primary" style="float: right;" href="{{ route('products.index') }}"> Back</a>
                    </h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 my-4">
                            <img src="/image/{{ $product->image }}" width="250px">
                        </div>
                        <div class="col-md-8">
                            <h1>{{ 'Product Name:' }}
                                <strong>{{ $product->name }}</strong>
                            </h1>
                            <p class="card-text"><strong>{{ $product->detail }}</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection