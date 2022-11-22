@extends('layout.index')


@push('styles')
<!-- Custom styles for this page -->
<link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush


@section('content')

<div class="col-md-4">
    <a class="btn btn-primary" href="{{ route('products.index') }}"> <i class="fa fa-arrow-left" aria-hidden="true"></i> Back </a>
</div>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
  <h6 class="m-0 font-weight-bold text-primary"> {{ $product->title }} </h6>
</div>
<div class="card-body">

    <div class="row clearfix justify-content-md-center">
        <div class="col-md-12">
            <table class="table table-borderless table-striped">
              <tr>
                  <th class="text-right">Category :</th>
                  <td> {{ $product->category->title }} </td>
              </tr>
              <tr>
                  <th class="text-right">Title : </th>
                  <td> {{ $product->title }} </td>
              </tr>
              <tr>
                  <th class="text-right">Description: </th>
                  <td> {{ $product->description }} </td>
              </tr>
              <tr>
                  <th class="text-right">Cost Price : </th>
                  <td> {{ $product->cost_price }} </td>
              </tr>
              <tr>
                  <th class="text-right">Sale Price : </th>
                  <td> {{ $product->price }} </td>
              </tr>
             </table>
        </div>
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
