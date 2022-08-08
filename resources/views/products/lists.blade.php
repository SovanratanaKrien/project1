@extends('layouts.app')
@section('content')

<div class="py-5">
    <div class="container">
        <div class="row">
            @foreach ($productLists as $productList)
                <div class="col-md-3"><a href="{{ route('products.show',$productList->id) }}">
                    <div class="card">
                        <img src="/image/{{ $productList->image }}" alt="Product Image">
                        <div class="card-body">
                            <h5><strong>{{ $productList->name }}</strong></h5>
                            <small>{{ $productList->detail }}</small>
                        </div>
                    </div></a>
                </div>
            @endforeach
            {!! $productLists->links() !!}
        </div>
    </div>
</div>

@endsection
