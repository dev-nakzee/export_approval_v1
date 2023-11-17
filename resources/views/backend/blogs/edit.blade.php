@extends('backend.layouts.app', ['module' => 'Blogs', 'title' => 'Edit Blog'])
@section('content')
<form class="form-horizontal" method="POST" action="{{route('blogs.update', $blog->blog_id)}}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="mb-2 col-md-12">
            <button type="submit" class="btn btn-sm btn-outline-success"><i class="fa-light fa-save"></i>&nbsp;Save</button>
            <a href="{{ URL::previous() }}" class="btn btn-sm btn-outline-danger float-end"><i class="fa-light fa-arrow-left"></i>&nbsp;Back</a>
        </div>
        <div class="mb-3 col-md-6">
            <label for="name" class="form-label">Blog name</label>
            <input type="text" class="form-control form-control-sm" id="name" name="name" value="{{$blog->blog_title}}">
        </div>
        <div class="mb-3 col-md-6">
            <label for="slug" class="form-label">Blog slug</label>
            <input type="text" class="form-control form-control-sm" id="slug" name="slug" value="{{$blog->blog_slug}}">
        </div>
        <div class="mb-3 col-md-6">
            <label for="media_id" class="form-label">Blog image</label>
            <div class="input-group input-group-sm">
                <span class="input-group-text"><i class="fa-light fa-image"></i></span>
                <input type="text" class="form-control form-control-sm" id="image" disabled value="{{$media->media_name}}">
                <input type="text" class="form-control form-control-sm" id="media_id" name="media_id" hidden value="{{$media->media_id}}">
                <a class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#uploadMediaModal"><i class="fa-light fa-plus"></i></a>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <label for="slug" class="form-label">Blog image alt text</label>
            <input type="text" class="form-control form-control-sm" id="img_alt" name="img_alt" value="{{$blog->img_alt}}">
        </div>
        <div class="mb-3 col-md-6">
            <label for="blog_category_id" class="form-label">Blog categories</label>
            <select class="form-control form-control-sm" id="blog_category_id" name="blog_category_id"  value="{{$blog->blog_category_id}}">
                <option value="{{$blogCategory->blog_category_id}}">{{$blogCategory->blog_category_name}}</option>
                @foreach($blog_categories as $blog_category)
                <option value="{{$blog_category->blog_category_id}}">{{$blog_category->blog_category_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 col-md-12">
            <label for="blog_content" class="form-label">Blog content</label>
            <textarea class="form-control form-control-sm text-editor" id="blog_content" name="blog_content">{{$blog->blog_content}}</textarea>
        </div>
        <div class="mb-3 col-md-12">
            <label for="seo_title" class="form-label">SEO Title - <b class="text-sm">Length : <span id="titleLength">0</span>&nbsp;|&nbsp;Character : <span id="titleChar">0</span></b></label>
            <input type="text" class="form-control form-control-sm" id="seo_title" name="seo_title" value="{{$blog->seo_title}}">
        </div>
        <div class="mb-3 col-md-12">
            <label for="seo_description" class="form-label">SEO Description - <b  class="text-sm">Character : <span id="descriptionChar">0</span></b></label>
            <textarea class="form-control form-control-sm" id="seo_description" name="seo_description">{{$blog->seo_description}}</textarea>
        </div>
        <div class="mb-3 col-md-12">
            <label for="seo_keywords" class="form-label">SEO Keywords - <b  class="text-sm">Count : <span id="keywordCount">0</span></b></label>
            <textarea class="form-control form-control-sm" id="seo_keywords" name="seo_keywords">{{$blog->seo_keywords}}</textarea>
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