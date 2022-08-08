@extends('layouts.app')
@section('content')
     
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>{{ __('Product List') }}
                        <a class="btn btn-primary" style="float: right;" href="{{ route('products.create') }}"> New Create</a>
                    </h2>
                </div>
                <div class="card-body">

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    
                    <table class="table table-bordered my-2">
                        <tr>
                            <th>No</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Details</th>
                            <th width="280px">Action</th>
                        </tr>
                        @foreach ($products as $product)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td><img src="/image/{{ $product->image }}" width="100px"></td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->detail }}</td>
                            <td>
                                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                    
                                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
                    
                                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
                    
                                    @csrf
                                    @method('DELETE')
                        
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                        Delete
                                    </button>
                                    
                                    <!-- Modal -->
                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Product delete</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are sure to delete this products ?
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                {!! $products->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-3"><a href="{{ route('products.show',$product->id) }}">
                    <div class="card">
                        <img src="/image/{{ $product->image }}" alt="Product Image">
                        <div class="card-body">
                            <h5><strong>{{ $product->name }}</strong></h5>
                            <small>{{ $product->detail }}</small>
                        </div>
                    </div></a>
                </div>
            @endforeach
            {!! $products->links() !!}
        </div>
    </div>
</div>

@endsection
