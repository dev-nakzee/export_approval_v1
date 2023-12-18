@extends('backend.layouts.app', ['module' => 'Gallery', 'title' => 'Edit Image'])
@section('content')
<form class="form-horizontal" method="POST" action="{{route('gallery.images.update', $galleryImage->gallery_image_id)}}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="mb-2 col-md-12">
            <button type="submit" class="btn btn-sm btn-outline-success"><i class="fa-light fa-save"></i>&nbsp;Save</button>
            <a href="{{ URL::previous() }}" class="btn btn-sm btn-outline-danger float-end"><i class="fa-light fa-arrow-left"></i>&nbsp;Back</a>
        </div>
        <div class="mb-3 col-md-6">
            <label for="name" class="form-label">Image Caption</label>
            <input type="text" class="form-control form-control-sm" id="name" name="name" value="{{$galleryImage->gallery_image_title}}">
        </div>
        <div class="mb-3 col-md-6">
            <label for="slug" class="form-label">Image slug</label>
            <input type="text" class="form-control form-control-sm" id="slug" name="slug" value="{{$galleryImage->gallery_image_slug}}">
        </div>
        <div class="mb-3 col-md-6">
            <label for="media_id" class="form-label">Image</label>
            <div class="input-group input-group-sm">
                <span class="input-group-text"><i class="fa-light fa-image"></i></span>
                <input type="text" class="form-control form-control-sm" id="image" disabled value="{{$galleryImage->media_name}}">
                <input type="text" class="form-control form-control-sm" id="media_id" name="media_id" hidden value="{{$galleryImage->media_id}}">
                <a class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#uploadMediaModal"><i class="fa-light fa-plus"></i></a>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <label for="slug" class="form-label">Image alt text</label>
            <input type="text" class="form-control form-control-sm" id="img_alt" name="img_alt" value="{{$galleryImage->img_alt}}">
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
@endsection