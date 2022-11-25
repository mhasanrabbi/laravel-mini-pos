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

{{-- Modal for new payment --}}

<div class="modal fade" id="newPayment" tabindex="-1" role="dialog" aria-labelledby="newPaymentModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        {!! Form::open(['route' => ['user.payments.store', $user->id], 'method' => 'post']) !!}
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newPaymentModalLabel"> New Payments </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="date" class="col-sm-3 col-form-label"> Date <span class="text-danger">*</span> </label>
                    <div class="col-sm-9">
                        {{ Form::date('date', NULL, [ 'class'=>'form-control', 'id' => 'date', 'placeholder' => 'Date',
                        'required' ]) }}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="amount" class="col-sm-3 col-form-label">Amount <span class="text-danger">*</span>
                    </label>
                    <div class="col-sm-9">
                        {{ Form::text('amount', NULL, [ 'class'=>'form-control', 'id' => 'amount', 'placeholder' =>
                        'Amount', 'required' ]) }}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="note" class="col-sm-3 col-form-label">Note </label>
                    <div class="col-sm-9">
                        {{ Form::textarea('note', NULL, [ 'class'=>'form-control', 'id' => 'note', 'rows' => '3',
                        'placeholder' => 'Note' ]) }}
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>

{{-- Modal For Receipt --}}
<div class="modal fade" id="newReceipt" tabindex="-1" role="dialog" aria-labelledby="newReceiptModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        {!! Form::open([ 'route' => ['user.receipts.store', $user->id], 'method' => 'post' ]) !!}
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newReceiptModalLabel"> New Receipts </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group row">
                    <label for="date" class="col-sm-3 col-form-label"> Date <span class="text-danger">*</span> </label>
                    <div class="col-sm-9">
                        {{ Form::date('date', NULL, [ 'class'=>'form-control', 'id' => 'date', 'placeholder' => 'Date',
                        'required' ]) }}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="amount" class="col-sm-3 col-form-label">Amount <span class="text-danger">*</span>
                    </label>
                    <div class="col-sm-9">
                        {{ Form::text('amount', NULL, [ 'class'=>'form-control', 'id' => 'amount', 'placeholder' =>
                        'Amount', 'required' ]) }}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="note" class="col-sm-3 col-form-label">Note </label>
                    <div class="col-sm-9">
                        {{ Form::textarea('note', NULL, [ 'class'=>'form-control', 'id' => 'note', 'rows' => '3',
                        'placeholder' => 'Note' ]) }}
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>

{{-- Modal For Sale --}}

<div class="modal fade" id="newSale" tabindex="-1" role="dialog" aria-labelledby="newSaleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        {!! Form::open([ 'route' => ['user.sales.store', $user->id], 'method' => 'post' ]) !!}
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSaleModalLabel"> New Sale Invoice </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group row">
                    <label for="date" class="col-sm-3 col-form-label"> Date <span class="text-danger">*</span> </label>
                    <div class="col-sm-9">
                        {{ Form::date('date', NULL, [ 'class'=>'form-control', 'id' => 'date', 'placeholder' => 'Date',
                        'required' ]) }}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="challan_no" class="col-sm-3 col-form-label">Challan Number </label>
                    <div class="col-sm-9">
                        {{ Form::text('challan_no', NULL, [ 'class'=>'form-control', 'id' => 'challan_no', 'placeholder'
                        => 'Challan Number' ]) }}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="note" class="col-sm-3 col-form-label">Note </label>
                    <div class="col-sm-9">
                        {{ Form::textarea('note', NULL, [ 'class'=>'form-control', 'id' => 'note', 'rows' => '3',
                        'placeholder' => 'Note' ]) }}
                    </div>
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </div>
        {!! Form::close() !!}
    </div>
</div>


@endsection
