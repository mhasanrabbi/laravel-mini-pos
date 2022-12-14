@extends('layout.index')


@push('styles')
<!-- Custom styles for this page -->
<link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush


@section('content')

<div class="row clearfix page_header">
    <div class="col-md-4">
        <h2> Sales Report </h2>
    </div>
    <div class="col-md-8 text-right">
        {!! Form::open([ 'route' => ['reports.sales'], 'method' => 'get' ]) !!}
        <div class="form-row align-items-center">
            <div class="col-auto">
                  <label class="sr-only" for="inlineFormInput">Start Date</label>
                  {{ Form::date('start_date', $start_date, [ 'class'=>'form-control', 'id' => 'date', 'placeholder' => 'Start Date' ]) }}
            </div>
            <div class="col-auto">
                  <label class="sr-only" for="inlineFormInputGroup">End Date</label>
                  <div class="input-group mb-2">
                    {{ Form::date('end_date', $end_date, [ 'class'=>'form-control', 'id' => 'date', 'placeholder' => 'End Date' ]) }}
                  </div>
            </div>
            <div class="col-auto">
                  <button type="submit" class="btn btn-primary mb-2">Submit</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>

<!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Sales Report From <strong>{{ $start_date }}</strong> to <strong>{{ $end_date }}</strong> </h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-striped table-borderless" cellspacing="0">
          <thead>
            <tr>
                <th>Date</th>
                  <th>Products</th>
                  <th class="text-right">Quantity</th>
                  <th class="text-right">Price</th>
                  <th class="text-right">Total</th>
            </tr>
          </thead>

          <tbody>
              @foreach ($sales as $sale)
                <tr>
                    <td> {{ $sale->date }} </td>
                    <td> {{ $sale->title }} </td>
                    <td class="text-right"> {{ $sale->quantity }} </td>
                    <td class="text-right"> {{ $sale->price }} </td>
                    <td class="text-right"> {{ $sale->total }} </td>
                </tr>
            @endforeach
          </tbody>

          <tfoot>
            <tr>
                <th></th>
                  <th class="text-right">Ttoal Items:</th>
                  <th class="text-right"> {{ $sales->sum('quantity') }} </th>
                  <th class="text-right">Total:</th>
                  <th class="text-right"> {{ $sales->sum('total') }} </th>
            </tr>
          </tfoot>

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
