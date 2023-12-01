@extends('backend.layouts.app', ['module' => 'Products', 'title' => 'Edit product'])
@section('content')
<form class="form-horizontal" method="POST" action="{{route('products.update', $product->product_id)}}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="mb-2 col-md-12">
            <button type="submit" class="btn btn-sm btn-outline-success"><i class="fa-light fa-save"></i>&nbsp;Save</button>
            <a href="{{ URL::previous() }}" class="btn btn-sm btn-outline-danger float-end"><i class="fa-light fa-arrow-left"></i>&nbsp;Back</a>
        </div>
        <div class="mb-3 col-md-6">
            <label for="name" class="form-label">Product name</label>
            <input type="text" class="form-control form-control-sm" id="name" name="name" value="{{$product->product_name}}">
        </div>
        <div class="mb-3 col-md-6">
            <label for="slug" class="form-label">Product slug</label>
            <input type="text" class="form-control form-control-sm" id="slug" name="slug" value="{{$product->product_slug}}">
        </div>
        <div class="mb-3 col-md-12">
            <label for="product_technical_name" class="form-label">Product technical name</label>
            <input type="text" class="form-control form-control-sm" id="product_technical_name" name="product_technical_name" value="{{$product->product_technical_name}}">
        </div>
        <div class="mb-3 col-md-6">
            <label for="product_service_id" class="form-label">Service</label>
            <select class="form-control form-control-sm" id="product_service_id" name="product_service_id" value="{{$product->product_service_id}}">
                <option value="{{$service->service_id}}" data-standard="{{$service->service_compliance}}">{{$service->service_name}}</option>
                <option value="">Select service</option>
                @foreach($services as $service)
                <option value="{{$service->service_id}}" data-standard="{{$service->service_compliance}}">{{$service->service_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 col-md-6">
            <label for="product_category_id" class="form-label">Category</label>
            <select class="form-control form-control-sm" id="product_category_id" name="product_category_id">
                <option value="{{$category->product_category_id}}">{{$category->product_category_name}}</option>
                <option value="">Select category</option>
                @foreach($categories as $category)
                <option value="{{$category->product_category_id}}">{{$category->product_category_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 col-md-6">
            <label for="media_id" class="form-label">Product image</label>
            <div class="input-group input-group-sm">
                <span class="input-group-text"><i class="fa-light fa-image"></i></span>
                <input type="text" class="form-control form-control-sm" id="image" disabled value="@if($image){{$image->media_name}}@endif">
                <input type="text" class="form-control form-control-sm" id="media_id" name="media_id" hidden value="@if($image){{$image->media_id}}@endif">
                <a class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#uploadMediaModal"><i class="fa-light fa-plus"></i></a>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <label for="slug" class="form-label">Product image alt text</label>
            <input type="text" class="form-control form-control-sm" id="img_alt" name="img_alt" value="{{$product->img_alt}}">
        </div>
        <div class="mb-3 col-md-12">
            <label for="product_compliance" class="form-label">Product complaince</label>
            <div class="input-group input-group-sm" id="standards">
                @if(unserialize($product->product_compliance) == null)
                    <input type="text" class="form-control form-control-sm" name="product_compliance[]">
                @else
                    @foreach(unserialize($product->product_compliance) as $key => $value)
                    <span class="input-group-text">{{$key}}</span>
                    <input type="text" class="form-control form-control-sm" name="product_compliance[{{$key}}]" value="{{$value}}">
                    @endforeach
                @endif
            </div>
        </div>
        <div class="mb-3 col-md-12">
            <label for="product_category_content" class="form-label">Product content</label>
            <textarea class="form-control form-control-sm text-editor" id="product_content" name="product_content">{{$product->product_content}}</textarea>
        </div>
        <div class="mb-3 col-md-6">
            <label for="infoDocument_id" class="form-label">Product information</label>
            <div class="input-group input-group-sm">
                <span class="input-group-text"><i class="fa-light fa-image"></i></span>
                <input type="text" class="form-control form-control-sm" id="infoDocument" disabled value="@if($product->information){{$infoDocument->document}}@endif">
                <input type="text" class="form-control form-control-sm" id="infoDocument_id" name="infoDocument_id" hidden value="@if($product->information){{$infoDocument->doc_id}}@endif">
                <a class="btn btn-outline-secondary btn-sm document-btn" data-bs-toggle="modal" data-bs-target="#fileUpload" data-pdf="infodocs"><i class="fa-light fa-plus"></i></a>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <label for="guideDocument_id" class="form-label">Product guidelines</label>
            <div class="input-group input-group-sm">
                <span class="input-group-text"><i class="fa-light fa-image"></i></span>
                <input type="text" class="form-control form-control-sm" id="guideDocument" disabled value="@if($product->guidelines){{$guideDocument->document}}@endif">
                <input type="text" class="form-control form-control-sm" id="guideDocument_id" name="guideDocument_id" hidden value="@if($product->guidelines){{$guideDocument->doc_id}}@endif">
                <a class="btn btn-outline-secondary btn-sm document-btn" data-bs-toggle="modal" data-bs-target="#fileUpload" data-pdf="guidelines"><i class="fa-light fa-plus"></i></a>
            </div>
        </div>
        <div class="mb-3 col-md-12">
            <label for="seo_title" class="form-label">SEO Title - <b class="text-sm">Length : <span id="titleLength">0</span>&nbsp;|&nbsp;Character : <span id="titleChar">0</span></b></label>
            <input type="text" class="form-control form-control-sm" id="seo_title" name="seo_title" value="{{$product->seo_title}}">
        </div>
        <div class="mb-3 col-md-12">
            <label for="seo_description" class="form-label">SEO Description - <b  class="text-sm">Character : <span id="descriptionChar">0</span></b></label>
            <textarea class="form-control form-control-sm" id="seo_description" name="seo_description">{{$product->seo_description}}</textarea>
        </div>
        <div class="mb-3 col-md-12">
            <label for="seo_keywords" class="form-label">SEO Keywords - <b  class="text-sm">Count : <span id="keywordCount">0</span></b></label>
            <textarea class="form-control form-control-sm" id="seo_keywords" name="seo_keywords">{{$product->seo_keywords}}</textarea>
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
<script>
    $('#product_service_id').on('change', function(){
        var standard = $(this).find(':selected').data('standard');
        var stdArray = standard.split(',');
        $('#standards').empty();
        $. each(stdArray, function(index, value) {
            $('#standards').append('<span class="input-group-text">'+value+'</span><input type="text" class="form-control form-control-sm" id="product_compliance" name="product_compliance['+value+']">'); 
        });
    });
</script>
@endsection