@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h2>{{ __('staff Create') }}
                    <a class="btn btn-primary" style="float: right;" href="{{ route('staffs.index') }}"> Back</a>
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
                        
                    <form action="{{ route('staffs.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row mb-3">
                            <label for="name" class="col-md-1 col-form-label text-md-start"><strong>{{ __('Name') }}</strong></label>

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
                            <label for="image" class="col-md-1 col-form-label text-md-start"><strong>{{ __('Image') }}</strong></label>

                            <div class="col-md-11">
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" required autocomplete="image"  placeholder="Image" autofocus>

                                @error('detail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="fname" class="col-md-1 col-form-label text-md-start"><strong>{{ __('First Name :') }}</strong></label>

                            <div class="col-md-11">
                                <input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" required autocomplete="fname"  placeholder="Name" autofocus>

                                @error('fname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="lname" class="col-md-1 col-form-label text-md-start"><strong>{{ __('Last Name :') }}</strong></label>

                            <div class="col-md-11">
                                <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" required autocomplete="lname"  placeholder="Name" autofocus>

                                @error('lname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="phone_number" class="col-md-1 col-form-label text-md-start"><strong>{{ __('TEL :') }}</strong></label>

                            <div class="col-md-11">
                                <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" required autocomplete="phone_number"  placeholder="Name" autofocus>

                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="dob" class="col-md-1 col-form-label text-md-start"><strong>{{ __('BIRTHDAY :') }}</strong></label>

                            <div class="col-md-11">
                                <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" required autocomplete="dob"  placeholder="Name" autofocus>

                                @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="gender" class="col-md-1 col-form-label text-md-start"><strong>{{ __('Sex :') }}</strong></label>

                            <div class="col-md-11">
                                <input id="gender" type="text" class="form-control @error('gender') is-invalid @enderror" name="gender" required autocomplete="gender"  placeholder="Name" autofocus>

                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-1 col-form-label text-md-start"><strong>{{ __('Email :') }}</strong></label>

                            <div class="col-md-11">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email"  placeholder="Name" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="detail" class="col-md-1 col-form-label text-md-start"><strong>{{ __('Detail') }}</strong></label>

                            <div class="col-md-11">
                                <textarea id="detail" type="text" class="form-control @error('detail') is-invalid @enderror" name="detail" required autocomplete="detail"  placeholder="Detail" autofocus></textarea>

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
