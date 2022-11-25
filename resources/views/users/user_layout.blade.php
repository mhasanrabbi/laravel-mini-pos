@extends('layout.index')


@section('content')

<div class="row clearfix page_header">
    <div class="col-md-3">
        <a class="btn btn-primary" href="{{ route('users.index') }}"> <i class="fa fa-arrow-left"
                aria-hidden="true"></i> Back </a>
    </div>
    <div class="col-md-8 text-right">
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#newSale">
            <i class="fa fa-plus"></i> New Sale
        </button>
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#newPurchase">
            <i class="fa fa-plus"></i> New Purchase
        </button>
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#newPayment">
            <i class="fa fa-plus"></i> New Payment
        </button>
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#newReceipt">
            <i class="fa fa-plus"></i> New Receipt
        </button>
    </div>
</div>

@include('users.user_layout_content')

@endsection
