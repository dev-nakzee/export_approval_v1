@extends('backend.layouts.app', ['module' => 'Products', 'title' => 'New product category'])
@section('content')
<form class="form-horizontal" method="POST" action="{{route('products.categories.update', $productCategory->product_category_id)}}">
    @csrf
    <div class="row">
        <div class="mb-2 col-md-12">
            <button type="submit" class="btn btn-sm btn-outline-success"><i class="fa-light fa-save"></i>&nbsp;Save</button>
            <a href="{{ URL::previous() }}" class="btn btn-sm btn-outline-danger float-end"><i class="fa-light fa-arrow-left"></i>&nbsp;Back</a>
        </div>
        <div class="mb-3 col-md-6">
            <label for="name" class="form-label">Product category name</label>
            <input type="text" class="form-control form-control-sm" id="name" name="name" value="{{$productCategory->product_category_name}}">
        </div>
        <div class="mb-3 col-md-6">
            <label for="slug" class="form-label">Product category slug</label>
            <input type="text" class="form-control form-control-sm" id="slug" name="slug" value="{{$productCategory->product_category_slug}}">
        </div>
        <div class="mb-3 col-md-12">
            <label for="product_category_content" class="form-label">Product category content</label>
            <textarea class="form-control form-control-sm text-editor" id="product_category_content" name="product_category_content">{{$productCategory->product_category_content}}</textarea>
        </div>
        <div class="mb-3 col-md-12">
            <label for="seo_title" class="form-label">SEO Title - <b class="text-sm">Length : <span id="titleLength">0</span>&nbsp;|&nbsp;Character : <span id="titleChar">0</span></b></label>
            <input type="text" class="form-control form-control-sm" id="seo_title" name="seo_title" value="{{$productCategory->seo_title}}">
        </div>
        <div class="mb-3 col-md-12">
            <label for="seo_description" class="form-label">SEO Description - <b  class="text-sm">Character : <span id="descriptionChar">0</span></b></label>
            <textarea class="form-control form-control-sm" id="seo_description" name="seo_description">{{$productCategory->seo_description}}</textarea>
        </div>
        <div class="mb-3 col-md-12">
            <label for="seo_keywords" class="form-label">SEO Keywords - <b  class="text-sm">Count : <span id="keywordCount">0</span></b></label>
            <textarea class="form-control form-control-sm" id="seo_keywords" name="seo_keywords">{{$productCategory->seo_keywords}}</textarea>
        </div>
        <div class="mb-3 col-md-12 text-center">
           <button type="submit" class="btn btn-sm btn-outline-primary"><i class="fa-light fa-save"></i>&nbsp;Save</button>
        </div>
    </div>
</form>
@endsection
@section('css')
@endsection
@section('js')
<script src="{{asset('tinymce/tinymce.min.js')}}"></script>
<script src="{{asset('backend/js/editor.min.js')}}"></script>
<script>
    $(document).ready(function() {  

    });
</script>
@endsection