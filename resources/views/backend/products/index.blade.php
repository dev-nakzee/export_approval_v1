@extends('backend.layouts.app', ['module' => 'Products', 'title' => 'Products'])
@section('content')
<div>
    <div class="container-fluid row">
        <div class="col-md-12">
            @if (session('response'))
            <div class="alert alert-info alert-dismissible alert-sm fade show" role="alert">
                <strong>{{ session('status') }}!</strong>
                {{ session('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <a href="{{route('products.create')}}" class="float-end btn btn-outline-primary btn-sm">
                <i class="fas fa-plus"></i>
            </a>
        </div>
        <div class="col-md-12 pt-1">
            <table class="table table-secondary table-bordered table-hover table-sm" id="product-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product</th>
                        <th>Category</th>
                        <th>Service</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('backend/dropzone/dropzone.css')}}" type="text/css" />
<link rel="stylesheet" href="{{asset('datatables/datatables.min.css')}}" type="text/css" />
@endsection
@section('js')
<script src="{{asset('backend/js/media.min.js')}}"></script>
<script src="{{asset('backend/dropzone/dropzone.js')}}"></script>
<script src="{{asset('datatables/datatables.min.js')}}"></script>
<script>
    $(document).ready(function() {  
        productCategoryDatatable();
    });
    function productCategoryDatatable() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        var table = $('#product-table').DataTable({
            paging: true,
            retrieve: true,
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: "{{ route('products.show') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'product_name', name: 'product_name'},
                {data: 'product_category_name', name: 'product_category_name'},
                {data: 'service_name', name: 'service_name'},
                {data: 'product_status', name: 'product_status'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    }

</script>
@endsection