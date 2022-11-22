@extends('layout.index')

@section('content')

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Add New User</h6>
    </div>

    <div class="card-body">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <form action="{{ route('users.store')}}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="group">Group <span class="text-danger">*</span></label>
                        <div class="col">
                            <select class="custom-select" name="group_id">
                                <option @if(!empty(old('group_id'))) selected @endif>--- Select Category ---</option>
                            @foreach($groups as $key => $group)
                            <option @if(old('group_id')) selected @endif value="{{ $group->id }}">{{ $group->title }}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-form-label">Name <span class="text-danger">*</span></label>
                        <div class="col">
                            <input type="text" class="form-control" id="name" placeholder="Enter User Name" name="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-form-label">Email  <span class="text-danger">*</span></label>
                        <div class="col">
                            <input type="email" class="form-control" id="email" placeholder="Enter User Email"
                                name="email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-form-label">Phone</label>
                        <div class="col">
                            <input type="text" class="form-control" id="name" placeholder="Enter User phone"
                                name="phone">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="address" class="col-form-label">Address</label>
                        <div class="col">
                            <input type="text" class="form-control" id="name" placeholder="Enter User address"
                                name="address">
                        </div>
                    </div>

                    <div class="mt-3 text-right">
                        <button type="submit" class="btn btn-primary">Add User</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection
