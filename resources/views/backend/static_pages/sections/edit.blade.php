@extends('backend.layouts.app', ['module' => 'Pages', 'title' => 'Edit '.ucfirst($static_page->page_name)." - ".ucfirst($static_page_section->section_name)])
@section('content')
<form class="form-horizontal" method="POST" action="{{route('static.pages.sections.update', [$static_page->static_page_id, $static_page_section->static_page_section_id])}}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="mb-2 col-md-12">
            <button type="submit" class="btn btn-sm btn-outline-success"><i class="fa-light fa-save"></i>&nbsp;Save</button>
            <a href="{{ URL::previous() }}" class="btn btn-sm btn-outline-danger float-end"><i class="fa-light fa-arrow-left"></i>&nbsp;Back</a>
        </div>
        <div class="mb-3 col-md-6">
            <label for="name" class="form-label">Section Title</label>
            <input type="text" class="form-control form-control-sm" id="name" name="name" value="{{$static_page_section->section_name}}">
        </div>
        <div class="mb-3 col-md-6">
            <label for="slug" class="form-label">Section Slug</label>
            <input type="text" class="form-control form-control-sm" id="slug" name="slug" value="{{$static_page_section->page_slug}}">
        </div>
        <div class="mb-3 col-md-12">
            <label for="section_tagline" class="form-label">Section Tagline</label>
            <textarea class="form-control form-control-sm text-editor" id="section_tagline" name="section_tagline">{!!$static_page_section->section_tagline!!}</textarea>
        </div>
        <div class="mb-3 col-md-6">
            <label for="media_id" class="form-label">Section image</label>
            <div class="input-group input-group-sm">
                <span class="input-group-text"><i class="fa-light fa-image"></i></span>
                <input type="text" class="form-control form-control-sm" id="image" disabled value="{{$static_page_section->media_name}}">
                <input type="text" class="form-control form-control-sm" id="media_id" name="media_id" hidden value="{{$static_page_section->media_id}}">
                <a class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#uploadMediaModal"><i class="fa-light fa-plus"></i></a>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <label for="img_alt" class="form-label">Section image alt text</label>
            <input type="text" class="form-control form-control-sm" id="img_alt" name="img_alt" value="{{$static_page_section->img_alt}}">
        </div>
        <div class="mb-3 col-md-12">
            <label for="section_description" class="form-label">Section description</label>
            <textarea class="form-control form-control-sm text-editor" id="section_description" name="section_description">{{$static_page_section->section_description}}</textarea>
        </div>
        <div class="mb-3 col-md-12">
            <label for="section_content" class="form-label">Section content</label>
            <textarea class="form-control form-control-sm text-editor" id="section_content" name="section_content">{{$static_page_section->section_content}}</textarea>
        </div>
        <div class="mb-3 col-md-4">
            <label for="section_status" class="form-label">Section status</label>
            <select class="form-control form-control-sm" id="section_status" name="section_status">
                <option value="{{$static_page_section->section_status}}">@if($static_page_section->section_status ===1){{'Active'}}@else{{'Inactive'}}@endif</option>
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>
        <div class="mb-3 col-md-4">
            <label for="section_order" class="form-label">Section order</label>
            <input type="text" class="form-control form-control-sm" id="section_order" name="section_order" value="{{$static_page_section->section_order}}">
        </div>
        <div class="mb-3 col-md-4">
            <label for="img_alt" class="form-label">Section Color</label>
            <input type="color" class="form-control form-control-sm" id="section_color" name="section_color" value="{{$static_page_section->section_color}}">
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