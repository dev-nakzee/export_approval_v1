@extends('backend.layouts.app', ['module' => 'Files', 'title' => 'Gallery'])
@section('content')
<div class="row">
    <div class="col-12">
        <button type="button" class="float-end btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#mediaUpload">
            <i class="fas fa-plus"></i>
        </button>
        <div class="modal fade" id="mediaUpload" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="MediaUploader" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="MediaUploader">Media upload</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('media.store') }}" method="POST" enctype="multipart/form-data" class="dropzone" id="upload-media">
                        @csrf
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 pt-1">
        <table class="table table-secondary table-bordered table-hover table-sm" id="media-table">
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
        var table = $('#media-table').DataTable({
            paging: true,
            retrieve: true,
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: "{{ route('media.show') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'media_name', name: 'media_name'},
                {data: 'media_path', name: 'media_path'},
                {data: 'media_detail', name: 'media_detail'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    }
    function refreshMedia() {
        $('#media-table').DataTable().ajax.reload();
    }
    $('#mediaUpload').on('hidden.bs.modal', function() {
        refreshMedia();
    });

</script>
@endsection