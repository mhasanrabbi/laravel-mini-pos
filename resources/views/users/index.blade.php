@extends('layout.index')

@section('content')

<div class="row clearfix page__header">
    <div class="col-md-6">
        <h4>User List</h4>
    </div>
    <div class="col-md-6 text-right">
        <a href="{{ url('users/create')}}" class="btn btn-info"><i class="fa fa-plus"></i> New User</a>
    </div>
</div>


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">User Groups</h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Group</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Group</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th colspan="2">Action</th>
                    </tr>
                </tfoot>

                <tbody>
                    {{-- {{dd($users)}} --}}
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->address}}</td>
                        <td>{{$user->group->title}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>{{$user->updated_at}}</td>
                        <td colspan="2" class="text-right">

                            <form action="{{ route('users.destroy', ['user' => $user->id])}}" method="POST">
                                <a class="btn btn-primary btn-sm"
                                    href="{{ route('users.show', ['user' => $user->id]) }}">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a class="btn btn-sm btn-primary"
                                    href="{{ route('users.edit', ['user' => $user->id])}}"><i
                                        class="fas fa-edit"></i></a>
                                @if(
                                $user->sales()->count() == 0
                                && $user->purchases()->count() == 0
                                && $user->receipts()->count() == 0
                                && $user->payments()->count() == 0
                                )
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you sure?')" type="submit"
                                    class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                @endif
                            </form>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
