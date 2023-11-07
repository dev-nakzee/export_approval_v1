@extends('backend.layouts.app', ['module' => 'Files', 'title' => 'Documents'])
@section('content')
<div class="row">
    <div class="col-12">
        <button type="button" class="float-end btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#fileUpload">
            <i class="fas fa-plus"></i>
        </button>
        <div class="modal fade" id="fileUpload" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="FileUploader" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="FileUploader">File upload</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('document.store') }}" method="POST" enctype="multipart/form-data" class="dropzone" id="upload-file">
                        @csrf
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 pt-1">
        <table class="table table-secondary table-bordered table-hover table-sm" id="document-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>File Name</th>
                    <th>File Size</th>
                    <th>File Link</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
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
        var table = $('#document-table').DataTable({
            paging: true,
            retrieve: true,
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: "{{ route('document.show') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'document', name: 'document'},
                {data: 'doc_path', name: 'doc_path'},
                {data: 'doc_detail', name: 'doc_detail'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    }
    function refreshMedia() {
        $('#document-table').DataTable().ajax.reload();
    }
    $('#fileUpload').on('hidden.bs.modal', function() {
        refreshMedia();
    });

</script>
@endsection