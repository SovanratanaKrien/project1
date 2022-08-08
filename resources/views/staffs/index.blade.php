@extends('layouts.app')
@section('content')
     
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>{{ __('Staff List') }}
                        <a class="btn btn-primary" style="float: right;" href="{{ route('staffs.create') }}"> New Create</a>
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
                            <th>fname</th>
                            <th>lname</th>
                            <th>phone_number</th>
                            <th>gender</th>
                            <th>email</th>
                            <th>Birthday</th>
                            <th width="280px">Action</th>
                        </tr>
                        @foreach ($staffs as $staff)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td><img src="/image/{{ $staff->image }}" width="100px"></td>
                            <td>{{ $staff->name }}</td>
                            <td>{{ $staff->detail }}</td>
                            <td>{{ $staff->fname }}</td>
                            <td>{{ $staff->lname }}</td>
                            <td>{{ $staff->phone_number }}</td>
                            <td>{{ $staff->gender }}</td>
                            <td>{{ $staff->email }}</td>
                            <td>{{ $staff->dob }}</td>
                            <td>
                                <form action="{{ route('staffs.destroy',$staff->id) }}" method="POST">
                    
                                    <a class="btn btn-info" href="{{ route('staffs.show',$staff->id) }}">Show</a>
                    
                                    <a class="btn btn-primary" href="{{ route('staffs.edit',$staff->id) }}">Edit</a>
                    
                                    @csrf
                                    @method('DELETE')
                        
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                {!! $staffs->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
