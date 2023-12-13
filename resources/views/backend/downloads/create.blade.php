@extends('backend.layouts.app', ['module' => 'Downloads', 'title' => 'New Download Category'])
@section('content')
<form class="form-horizontal" method="POST" action="{{route('downloads.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="mb-2 col-md-12">
            <button type="submit" class="btn btn-sm btn-outline-success"><i class="fa-light fa-save"></i>&nbsp;Save</button>
            <a href="{{ URL::previous() }}" class="btn btn-sm btn-outline-danger float-end"><i class="fa-light fa-arrow-left"></i>&nbsp;Back</a>
        </div>
        <div class="mb-3 col-md-6">
            <label for="name" class="form-label">Download name</label>
            <input type="text" class="form-control form-control-sm" id="name" name="name">
        </div>
        <div class="mb-3 col-md-6">
            <label for="slug" class="form-label">Download Slug</label>
            <input type="text" class="form-control form-control-sm" id="slug" name="slug">
        </div>
        <div class="mb-3 col-md-6">
            <label for="product_category_id" class="form-label">Category</label>
            <select class="form-control form-control-sm" id="download_category_id" name="download_category_id">
                <option value="">Select category</option>
                @foreach($downloadCategory as $category)
                <option value="{{$category->download_category_id}}">{{$category->download_category}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 col-md-6">
            <label for="infoDocument_id" class="form-label">Download Information</label>
            <div class="input-group input-group-sm">
                <span class="input-group-text"><i class="fa-light fa-image"></i></span>
                <input type="text" class="form-control form-control-sm" id="download" disabled >
                <input type="text" class="form-control form-control-sm" id="download_id" name="download_id" hidden>
                <a class="btn btn-outline-secondary btn-sm document-btn" data-bs-toggle="modal" data-bs-target="#fileUpload" data-pdf="downloads"><i class="fa-light fa-plus"></i></a>
            </div>
        </div>
        <div class="mb-3 col-md-12 text-center">
           <button type="submit" class="btn btn-sm btn-outline-primary"><i class="fa-light fa-save"></i>&nbsp;Save</button>
        </div>
    </div>
</form>
<div class="modal fade" id="fileUpload" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="FileUploader" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="FileUploader">File upload <button id="fileType"></button></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('document.store') }}" method="POST" enctype="multipart/form-data" class="dropzone" id="upload-file">
                @csrf
            </form>
        </div>
        <div class="document-gallery m-1 mr-2 container-fluid" data-doctype="" id="document-gallery">

        </div>
    </div>
    </div>
</div>
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('backend/dropzone/dropzone.css')}}" type="text/css" />
@endsection
@section('js')
<script src="{{asset('backend/dropzone/dropzone.js')}}"></script>
<script src="{{asset('backend/js/document.min.js')}}"></script>
@endsection