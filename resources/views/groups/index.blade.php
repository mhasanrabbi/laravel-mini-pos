@extends('layout.index')

@push('styles')
<!-- Custom styles for this page -->
<link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush


@section('content')


    <div class="row clearfix page__header">
        <div class="col-md-6">
            <h4>User Groups</h4>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ url('groups/create')}}" class="btn btn-info"><i class="fa fa-plus"></i> New Group</a>
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
                        <th>Title</th>
                        <th class="text-right">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($groups as $group)
                    <tr>
                        <td>{{$group->id}}</td>
                        <td>{{$group->title}}</td>
                        <td class="text-right">
                            <form action="{{ url('groups/' . $group->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                            </form>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<!-- Page level plugins -->
<script src="{{asset('assets/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<!-- Page level custom scripts -->
<script src="{{asset('assets/js/demo/datatables-demo.js')}}"></script>
@endpush
