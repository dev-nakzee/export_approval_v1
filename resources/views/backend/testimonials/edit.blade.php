@extends('backend.layouts.app', ['module' => 'Testimonials', 'title' => 'New Testimonial'])
@section('content')
<form class="form-horizontal" method="POST" action="{{route('testimonials.update', $testimonial->testimonial_id)}}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="mb-2 col-md-12">
            <button type="submit" class="btn btn-sm btn-outline-success"><i class="fa-light fa-save"></i>&nbsp;Save</button>
            <a href="{{ URL::previous() }}" class="btn btn-sm btn-outline-danger float-end"><i class="fa-light fa-arrow-left"></i>&nbsp;Back</a>
        </div>
        <div class="mb-3 col-md-6">
            <label for="name" class="form-label">Testimonial name</label>
            <input type="text" class="form-control form-control-sm" id="name" name="name" value="{{$testimonial->testimonial_name}}">
        </div>
        <div class="mb-3 col-md-6">
            <label for="slug" class="form-label">Testimonial slug</label>
            <input type="text" class="form-control form-control-sm" id="slug" name="slug" value="{{$testimonial->testimonial_slug}}">
        </div>
        <div class="mb-3 col-md-6">
            <label for="media_id" class="form-label">Testimonial image</label>
            <div class="input-group input-group-sm">
                <span class="input-group-text"><i class="fa-light fa-image"></i></span>
                <input type="text" class="form-control form-control-sm" id="image" disabled value="{{$media->media_name}}">
                <input type="text" class="form-control form-control-sm" id="media_id" name="media_id" hidden value="{{$media->media_id}}">
                <a class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#uploadMediaModal"><i class="fa-light fa-plus"></i></a>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <label for="slug" class="form-label">Testimonial image alt text</label>
            <input type="text" class="form-control form-control-sm" id="img_alt" name="img_alt" value="{{$testimonial->img_alt}}">
        </div>
        <div class="mb-3 col-md-6">
            <label for="testimonial_designation" class="form-label">Testimonial designation</label>
            <input type="text" class="form-control form-control-sm" id="testimonial_designation" name="testimonial_designation" value="{{$testimonial->testimonial_designation}}">
        </div>
        <div class="mb-3 col-md-6">
            <label for="testimonial_company" class="form-label">Testimonial company</label>
            <input type="text" class="form-control form-control-sm" id="testimonial_company" name="testimonial_company" value="{{$testimonial->testimonial_company}}">
        </div>
        <div class="mb-3 col-md-12">
            <label for="testimonial_content" class="form-label">Testimonial content</label>
            <textarea class="form-control form-control-sm text-editor" id="testimonial_content" name="testimonial_content">{{$testimonial->testimonial_content}}</textarea>
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
@endsection