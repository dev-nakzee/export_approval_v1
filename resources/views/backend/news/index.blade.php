@extends('backend.layouts.app', ['module' => 'News', 'title' => 'All News'])
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
            <a href="{{route('news.create')}}" class="float-end btn btn-outline-primary btn-sm">
                <i class="fas fa-plus"></i>
            </a>
        </div>
        <div class="col-md-12 pt-1">
            <table class="table table-secondary table-bordered table-hover table-sm" id="news-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>News</th>
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
        clientsDatatable();
    });
    function clientsDatatable() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        var table = $('#news-table').DataTable({
            paging: true,
            retrieve: true,
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: "{{ route('news.show') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'news_title', name: 'news_title'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    }

</script>
@endsection