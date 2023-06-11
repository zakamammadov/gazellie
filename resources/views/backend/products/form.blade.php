@extends('backend.layouts.master')
{{-- @section('title')
User detal
@endsection --}}
@section("content")
<form method="post" action="{{ route('back.product.save', $entry->id) }}">
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

        <div class="col-md-6">
            <div class="form-group">
                <label for="product_name_az">Product Name Aze</label>
                <input type="text" class="form-control" id="product_name_az" name="product_name_az" placeholder="Product name" value="{{ old('product_name_az', $entry->product_name_az) }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="product_name_en">Product Name Eng</label>
                <input type="text" class="form-control" id="product_name_en" name="product_name_en" placeholder="Product name" value="{{ old('product_name_en', $entry->product_name_en) }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="product_name_ru">Product Name Ru</label>
                <input type="text" class="form-control" id="product_name_ru" name="product_name_ru" placeholder="Product name" value="{{ old('product_name_ru', $entry->product_name_ru) }}">
            </div>
        </div>


        <div class="col-md-6">
            <div class="form-group">
                <label for="product_name_az">Product Description Aze</label>
                <input type="text" class="form-control" id="description_az" name="description_az" placeholder="Product description" value="{{ old('description_az', $entry->description_az) }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="product_name_en">Product Description Eng</label>
                <input type="text" class="form-control" id="description_en" name="description_en" placeholder="Product description" value="{{ old('description_en', $entry->description_en) }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="product_name_ru">Product Description Ru</label>
                <input type="text" class="form-control" id="description_ru" name="description_ru" placeholder="Product description" value="{{ old('description_ru', $entry->description_ru) }}">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" id="price" name="price" placeholder="Product price" value="{{ old('price', $entry->price) }}">
            </div>
        </div>


        <div class="col-md-6">
            <div class="form-group">
                <label for="adsoyad">Slug</label>
                <input type="hidden" name="original_slug" value="{{ old('slug', $entry->slug) }}">
                <input type="text" class="form-control" id="slug" name="slug" placeholder="Product slug" value="{{ old('slug', $entry->slug) }}">
            </div>
        </div>
    </div>
</form>
@endsection
