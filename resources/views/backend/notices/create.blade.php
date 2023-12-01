@extends('backend.layouts.app', ['module' => 'Notices', 'title' => 'New Notice'])
@section('content')
<form class="form-horizontal" method="POST" action="{{route('notices.store')}}">
    @csrf
    <div class="row">
        <div class="mb-2 col-md-12">
            <button type="submit" class="btn btn-sm btn-outline-success"><i class="fa-light fa-save"></i>&nbsp;Save</button>
            <a href="{{ URL::previous() }}" class="btn btn-sm btn-outline-danger float-end"><i class="fa-light fa-arrow-left"></i>&nbsp;Back</a>
        </div>
        <div class="mb-3 col-md-6">
            <label for="name" class="form-label">Notice title</label>
            <input type="text" class="form-control form-control-sm" id="name" name="name">
        </div>
        <div class="mb-3 col-md-6">
            <label for="slug" class="form-label">Notice slug</label>
            <input type="text" class="form-control form-control-sm" id="slug" name="slug">
        </div>
        <div class="mb-3 col-md-6">
            <label for="media_id" class="form-label">Notice image</label>
            <div class="input-group input-group-sm">
                <span class="input-group-text"><i class="fa-light fa-image"></i></span>
                <input type="text" class="form-control form-control-sm" id="image" disabled >
                <input type="text" class="form-control form-control-sm" id="media_id" name="media_id" hidden>
                <a class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#uploadMediaModal"><i class="fa-light fa-plus"></i></a>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <label for="slug" class="form-label">Notice image alt text</label>
            <input type="text" class="form-control form-control-sm" id="img_alt" name="img_alt">
        </div>
        <div class="mb-3 col-md-12">
            <label for="notice_content" class="form-label">Notice content</label>
            <textarea class="form-control form-control-sm text-editor" id="notice_content" name="notice_content"></textarea>
        </div>
        <div class="mb-3 col-md-6">
            <label for="service_id" class="form-label">Notice services</label>
            <select class="form-select form-select-sm" id="service_id" name="service_id">
                <option value="">Select service</option>
                @foreach ($services as $service)
                <option value="{{$service->service_id}}">{{$service->service_name}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3 col-md-6">
            <label for="noticeDocument_id" class="form-label">Notice document</label>
            <div class="input-group input-group-sm">
                <span class="input-group-text"><i class="fa-light fa-image"></i></span>
                <input type="text" class="form-control form-control-sm" id="noticeDocument" disabled >
                <input type="text" class="form-control form-control-sm" id="noticeDocument_id" name="noticeDocument_id" hidden>
                <a class="btn btn-outline-secondary btn-sm document-btn" data-bs-toggle="modal" data-bs-target="#fileUpload" data-pdf="notices"><i class="fa-light fa-plus"></i></a>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <label for="products" class="form-label">Notice products</label>
            <select class="form-select form-select-sm" id="products" name="products[]" multiple>
                @foreach ($products as $product)
                <option value="{{$product->product_id}}">{{$product->product_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 col-md-6">
            <label for="notice_date" class="form-label">Notice date</label>
            <input type="date" class="form-control form-control-sm" id="notice_date" name="notice_date">
        </div>
        <div class="mb-3 col-md-12">
            <label for="seo_title" class="form-label">SEO Title - <b class="text-sm">Length : <span id="titleLength">0</span>&nbsp;|&nbsp;Character : <span id="titleChar">0</span></b></label>
            <input type="text" class="form-control form-control-sm" id="seo_title" name="seo_title">
        </div>
        <div class="mb-3 col-md-12">
            <label for="seo_description" class="form-label">SEO Description - <b  class="text-sm">Character : <span id="descriptionChar">0</span></b></label>
            <textarea class="form-control form-control-sm" id="seo_description" name="seo_description"></textarea>
        </div>
        <div class="mb-3 col-md-12">
            <label for="seo_keywords" class="form-label">SEO Keywords - <b  class="text-sm">Count : <span id="keywordCount">0</span></b></label>
            <textarea class="form-control form-control-sm" id="seo_keywords" name="seo_keywords"></textarea>
        </div>
        <div class="mb-3 col-md-12 text-center">
           <button type="submit" class="btn btn-sm btn-outline-primary"><i class="fa-light fa-save"></i>&nbsp;Save</button>
        </div>
    </div>
</form>
<div class="modal fade" id="uploadMediaModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="mediaImageUpload" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="mediaImageUpload">Add Image</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('media.store') }}" method="POST" enctype="multipart/form-data" class="dropzone" id="upload-image">
                    @csrf
                </form>
                <div class="media-gallery m-1 mr-2 container-fluid" id="media-gallery">

                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="fileUpload" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="FileUploader" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="FileUploader">File upload <button hidden id="fileType"></button></h1>
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
<script src="{{asset('backend/js/media.min.js')}}"></script>
<script src="{{asset('tinymce/tinymce.min.js')}}"></script>
<script src="{{asset('backend/js/editor.min.js')}}"></script>
@endsection