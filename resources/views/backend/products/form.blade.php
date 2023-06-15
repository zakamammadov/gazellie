@extends('backend.layouts.master')
{{-- @section('title')
User detal
@endsection --}}
@section("content")
<form method="post" action="{{ route('back.product.save', $entry->id) }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="float-right">
                <button type="submit" class="btn btn-primary">
            {{ $entry->id > 0 ? "Edit" : "Save" }}
        </button>
    </div>
    <h3 class="sub-header">
        Product {{ $entry->id > 0 ? "Edit" : "Add" }}
    </h3>
<hr>
    @include('backend.layouts.errors')
    <div class="row">

        <div class="col-md-4">
            <div class="form-group">
                <label for="product_name_az">Product Name Aze</label>
                <input type="text" class="form-control" id="product_name_az" name="product_name_az" placeholder="Product name" value="{{ old('product_name_az', $entry->product_name_az) }}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="product_name_en">Product Name Eng</label>
                <input type="text" class="form-control" id="product_name_en" name="product_name_en" placeholder="Product name" value="{{ old('product_name_en', $entry->product_name_en) }}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="product_name_ru">Product Name Ru</label>
                <input type="text" class="form-control" id="product_name_ru" name="product_name_ru" placeholder="Product name" value="{{ old('product_name_ru', $entry->product_name_ru) }}">
            </div>
        </div>


        <div class="col-md-4">
            <div class="form-group">
                <label for="description_az">Product Description Aze</label>
                <textarea class="form-control" id="description_az" name="description_az" placeholder="Product description">{{ old('description_az', $entry->description_az) }}</textarea>

            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="product_name_en">Product Description Eng</label>
                <textarea class="form-control" id="description_en" name="description_en" placeholder="Product description">{{ old('description_en', $entry->description_en) }}</textarea>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="description_ru">Product Description Ru</label>
                <textarea class="form-control" id="description_ru" name="description_ru" placeholder="Product description">{{ old('description_ru', $entry->description_ru) }}</textarea>

            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" id="price" name="price" placeholder="Product price" value="{{ old('price', $entry->price) }}">
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="adsoyad">Slug</label>
                <input type="hidden" name="original_slug" value="{{ old('slug', $entry->slug) }}">
                <input type="text" class="form-control" id="slug" name="slug" placeholder="Product slug" value="{{ old('slug', $entry->slug) }}">
            </div>
        </div>



            <div class="col-md-6">
                <div class="form-group">
                    <label for="category">Categories</label>
                    <select name="category[]" class="form-control" id="category" multiple>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ collect(old('category', $pr_category))->contains($category->id) ? 'selected': '' }}>{{ $category->cat_name_en }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">

            <div class="form-group">
                @if ($entry->product_main_image!=null)
                    <img src="/uploads/products/{{ $entry->product_main_image }}" style="height: 100px;width:150px;margin-right: 20px;" class="thumbnail pull-left">
                @endif
                <label for="product_main_image">Product Main image</label>
                <input type="file" id="product_main_image" name="product_main_image">
            </div>
            </div>
    </div>
</form>
@endsection

@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>

@endsection

@section('script')
<script src="//cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.9.2/plugins/autogrow/plugin.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

        <script>
        $(function () {
            $('#category').select2({
                placeholder: 'Select category'
            });

            var options = {
                uiColor: '0000FF',
                language: 'az',
                extraPlugins: 'autogrow',
                autoGrow_minHeight: 250,
                autoGrow_maxHeight: 600,
                filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
            };
            CKEDITOR.replace('description_az', options);
            CKEDITOR.replace('description_en', options);
            CKEDITOR.replace('description_ru', options);
        });
    </script>

@endsection
