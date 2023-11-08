@extends('backend.layouts.app', ['module' => 'Services', 'title' => 'Services'])
@section('content')
<div>
    <div class="container-fluid row">
        <div class="col-md-12">
            <a href="{{route('services.create')}}" class="float-end btn btn-outline-primary btn-sm">
                <i class="fas fa-plus"></i>
            </a>
        </div>
        <div class="col-md-12 pt-1">
            <table class="table table-secondary table-bordered table-hover table-sm" id="services-table">
                <thead>
                    <tr>
                        <th>#</th>
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
        mediaDatatable();
    });
    function mediaDatatable() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        var table = $('#services-table').DataTable({
            paging: true,
            retrieve: true,
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: "{{ route('services.show') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'service', name: 'service'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    }

</script>
@endsection