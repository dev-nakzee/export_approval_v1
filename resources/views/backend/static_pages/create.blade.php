@extends('backend.layouts.app', ['module' => 'Pages', 'title' => $product->product_name.' - New Sections'])
@section('content')
<form class="form-horizontal" method="POST" action="{{route('products.sections.store', $product->product_id)}}">
    @csrf
    <div class="row">
        <div class="mb-2 col-md-12">
            <button type="submit" class="btn btn-sm btn-outline-success"><i class="fa-light fa-save"></i>&nbsp;Save</button>
            <a href="{{ URL::previous() }}" class="btn btn-sm btn-outline-danger float-end"><i class="fa-light fa-arrow-left"></i>&nbsp;Back</a>
        </div>
        <div class="mb-3 col-md-6">
            <label for="name" class="form-label">Product section name</label>
            <input type="text" class="form-control form-control-sm" id="name" name="name">
        </div>
        <div class="mb-3 col-md-6">
            <label for="slug" class="form-label">Product section slug</label>
            <input type="text" class="form-control form-control-sm" id="slug" name="slug">
        </div>
        <div class="mb-3 col-md-12">
            <label for="product_section_content" class="form-label">Product section content</label>
            <textarea class="form-control form-control-sm text-editor" id="product_section_content" name="product_section_content"></textarea>
        </div>
        <div class="mb-3 col-md-3">
            <label for="product_section_status" class="form-label">Product section Status</label>
            <select class="form-control form-control-sm" id="product_section_status" name="product_section_status">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>
        <div class="mb-3 col-md-3">
            <label for="product_section_order" class="form-label">Product order</label>
            <input type="number" class="form-control form-control-sm" id="product_section_order" name="product_section_order">
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

@endsection