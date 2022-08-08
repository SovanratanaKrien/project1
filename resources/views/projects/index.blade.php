@extends('layouts.app')
@section('content')
     
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>{{ __('projects List') }}
                        <a class="btn btn-primary" style="float: right;" href="{{ route('projects.create') }}"> New Create</a>
                    </h2>
                </div>
                <div class="card-body">

                    <table class="table table-bordered my-2">
                        <tr>
                            <th>No</th>
                            <th>File Name</th>
                            <th>File</th>
                            <th>Post Date</th>
                            <th>Description</th>
                            <th width="280px">Action</th>
                        </tr>
                        @foreach ($projects as $project)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $project->name }}</td>
                            <td>{{ $project->filenames }}</td>
                            <td>{{ $project->dob }}</td>
                            <td>{{ $project->Description }}</td>
                            <td>
                                <form action="{{ route('projects.destroy',$project->id) }}" method="POST">
                    
                                    <a class="btn btn-info" href="{{ route('projects.show',$project->id) }}">Show</a>
                    
                                    <a class="btn btn-primary" href="{{ route('projects.edit',$project->id) }}">Edit</a>
                    
                                    @csrf
                                    @method('DELETE')
                        
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                        Delete
                                    </button>
                                    
                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">project delete</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are sure to delete this projects ?
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
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
