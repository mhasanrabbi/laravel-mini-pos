@extends('layout.index')


@section('content')

<div class="row clearfix page_header">
    <div class="col-md-3">
        <a class="btn btn-primary" href="{{ route('users.index') }}"> <i class="fa fa-arrow-left"
                aria-hidden="true"></i> Back </a>
    </div>
</div>

@include('users.user_layout_content')

@endsection
