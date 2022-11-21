@extends('layout.index')

@section('content')


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add New Group</h6>
        </div>

        <div class="card-body">
            <form action="{{ url('groups')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="group">User Group Title</label>
                    <input type="title" class="form-control" id="title" placeholder="Enter Group Title" name="title">
                </div>
                    <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>

@endsection
