@extends('backend.layouts.app', ['module' => 'Services', 'title' => 'New service'])
@section('content')
<form class="form-horizontal" method="POST" action="{{route('services.store')}}">
    @csrf
    <div class="row">
        <div class="mb-2 col-md-12">
            <button type="submit" class="btn btn-sm btn-outline-success"><i class="fa-light fa-save"></i>&nbsp;Save</button>
            <a href="{{ URL::previous() }}" class="btn btn-sm btn-outline-danger float-end"><i class="fa-light fa-arrow-left"></i>&nbsp;Back</a>
        </div>
        <div class="mb-3 col-md-6">
            <label for="name" class="form-label">Service name</label>
            <input type="text" class="form-control form-control-sm" id="name" name="name">
        </div>
        <div class="mb-3 col-md-6">
            <label for="slug" class="form-label">Service slug</label>
            <input type="text" class="form-control form-control-sm" id="slug" name="slug">
        </div>
        <div class="mb-3 col-md-6">
            <label for="media_id" class="form-label">Service image</label>
            <div class="input-group input-group-sm">
                <span class="input-group-text"><i class="fa-light fa-image"></i></span>
                <input type="text" class="form-control form-control-sm" id="image" disabled >
                <input type="text" class="form-control form-control-sm" id="media_id" name="media_id" hidden>
                <a class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#uploadMediaModal"><i class="fa-light fa-plus"></i></a>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <label for="slug" class="form-label">Service image alt text</label>
            <input type="text" class="form-control form-control-sm" id="img_alt" name="img_alt">
        </div>
        <div class="mb-3 col-md-12">
            <label for="slug" class="form-label">Service description</label>
            <textarea class="form-control form-control-sm text-editor" id="description" name="description"></textarea>
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
        <div class="mb-3 col-md-12">
            <label for="service_compliance" class="form-label">Service Compliance <span class="text-sm">(Comma ',' separated - Example: Indian Standard, Group, Scheme)</span></label>
            <input type="text" class="form-control form-control-sm" id="service_compliance" name="service_compliance">
        </div>
        <div class="mb-3 col-md-3">
            <label for="service_status" class="form-label">Service Status</label>
            <select class="form-control form-control-sm" id="service_status" name="service_status">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>
        <div class="mb-3 col-md-3">
            <label for="service_featured" class="form-label">Service featured</label>
            <select class="form-control form-control-sm" id="service_featured" name="service_featured">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>
        <div class="mb-3 col-md-3">
            <label for="service_product_show" class="form-label">Service product show</label>
            <select class="form-control form-control-sm" id="service_product_show" name="service_product_show">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>
        <div class="mb-3 col-md-3">
            <label for="service_order" class="form-label">Service Status</label>
            <input type="number" class="form-control form-control-sm" id="service_order" name="service_order">
        </div>
        <div class="mb-3 col-md-12">
            <label class="form-label">FAQ <span class="text-sm">(Dont put numbering)<span>&nbsp;<button type="button" id="addFaq" class="btn btn-outline-primary btn-sm ml-2"><i class="fa fa-plus"></i></button></label>
            <div class="container-fluid row pr-0" id="faq">
                <div class="col-md-12 row p-0">
                    <div class="col-md-6 pr-0">
                        <label>Question</label>
                        <input type="text" class="form-control" name="question[0]">
                    </div>
                    <div class="col-md-6 pr-0">
                        <label>Answer</label>
                        <input type="text" class="form-control" name="answer[0]">
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-3 col-md-12 text-center">
           <button type="submit" class="btn btn-sm btn-outline-primary"><i class="fa-light fa-save"></i>&nbsp;Save</button>
        </div>
        
    </div>
</form>
<div class="modal fade" id="uploadMediaModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="mediaImageUpload" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
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
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('backend/dropzone/dropzone.css')}}" type="text/css" />
@endsection
@section('js')
<script src="{{asset('backend/dropzone/dropzone.js')}}"></script>
<script src="{{asset('backend/js/media.min.js')}}"></script>
<script src="{{asset('tinymce/tinymce.min.js')}}"></script>
<script src="{{asset('backend/js/editor.min.js')}}"></script>
<script>
    $(document).ready(function() {  

    });
</script>
@endsection