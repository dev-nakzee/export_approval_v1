@extends('backend.layouts.app', ['module' => 'Downloads', 'title' => 'Downloads'])
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
            <a href="{{route('downloads.create')}}" class="float-end btn btn-outline-primary btn-sm">
                <i class="fas fa-plus"></i>
            </a>
        </div>
        <div class="col-md-12 pt-1">
            <table class="table table-secondary table-bordered table-hover table-sm" id="download-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Download Name</th>
                        <th>Download Category</th>
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

@endsection
@section('js')

<script src="{{asset('datatables/datatables.min.js')}}"></script>
<script>
    $(document).ready(function() {  
        clientsDatatable();
    });
    function clientsDatatable() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        var table = $('#download-table').DataTable({
            paging: true,
            retrieve: true,
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: "{{ route('downloads.show') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'download_name', name: 'download_name'},
                {data: 'download_category', name: 'download_category'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    }

</script>
@endsection