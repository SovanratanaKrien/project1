@extends('layouts.app')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h2>{{ __('Product Create') }}
                    <a class="btn btn-primary" style="float: right;" href="{{ route('products.index') }}"> Back</a>
                </h2></div>

                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row mb-3">
                            <label for="email" class="col-md-1 col-form-label text-md-start"><strong>{{ __('Name') }}</strong></label>

                            <div class="col-md-11">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name"  placeholder="Name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-1 col-form-label text-md-start"><strong>{{ __('Detail') }}</strong></label>

                            <div class="col-md-11">
                                <textarea id="detail" type="text" class="form-control @error('detail') is-invalid @enderror" name="detail" required autocomplete="detail"  placeholder="Detail" autofocus></textarea>

                                @error('detail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-1 col-form-label text-md-start"><strong>{{ __('Image') }}</strong></label>

                            <div class="col-md-11">
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" required autocomplete="image"  placeholder="Image" autofocus>

                                @error('detail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-6">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
