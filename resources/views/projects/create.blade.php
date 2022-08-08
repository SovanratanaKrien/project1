@extends('layouts.app')
  
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header"><h2>{{ __('project Create') }}
            <a class="btn btn-primary" style="float: right;" href="{{ route('projects.index') }}"> Back</a>
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
                
            <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="row mb-3">
                    <label for="name" class="col-md-1 col-form-label text-md-start"><strong>{{ __('Project Name') }}</strong></label>

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
                    <label for="filenames" class="col-md-1 col-form-label text-md-start"><strong>{{ __('FIle') }}</strong></label>

                    <div class="col-md-11">
                        <input id="filenames" type="file" class="form-control @error('filenames') is-invalid @enderror" name="filenames" required autocomplete="filenames"  placeholder="filenames" autofocus>

                        @error('filenames')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                <div class="row mb-3">
                    <label for="dob" class="col-md-1 col-form-label text-md-start"><strong>{{ __('POST Date :') }}</strong></label>

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
                    <label for="" class="col-md-1 col-form-label text-md-start"><strong>{{ __('Description') }}</strong></label>

                    <div class="col-md-11">
                        <textarea id="Description" type="text" class="form-control @error('Description') is-invalid @enderror" name="Description" required autocomplete="Description"  placeholder="Description" autofocus></textarea>

                        @error('Description')
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
