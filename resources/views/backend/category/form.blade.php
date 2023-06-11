@extends('backend.layouts.master')
{{-- @section('title')
User detal
@endsection --}}
@section("content")
<form method="post" action="{{ route('back.category.save', $entry->id) }}">
    {{ csrf_field() }}
    <div class="float-right">
                <button type="submit" class="btn btn-primary">
            {{ $entry->id > 0 ? "Edit" : "Save" }}
        </button>
    </div>
    <h3 class="sub-header">
        Category {{ $entry->id > 0 ? "Edit" : "Add" }}
    </h3>
<hr>
    @include('backend.layouts.errors')
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="adsoyad">Top Category </label>
<select name="top_cat_id" class="form-control">
    <option value=""><span  style="color:black";font-weight="bold"> Main Category</span></option>
@foreach ($category as $cat)
<option value="{{$cat->id}}">{{$cat->cat_name_en}}</option>
@endforeach
</select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="adsoyad">Category Name Aze</label>
                <input type="text" class="form-control" id="cat_name_az" name="cat_name_az" placeholder="Cat name" value="{{ old('cat_name_az', $entry->cat_name_az) }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="adsoyad">Category Name Eng</label>
                <input type="text" class="form-control" id="cat_name_en" name="cat_name_en" placeholder="Cat name" value="{{ old('cat_name_en', $entry->cat_name_en) }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="adsoyad">Category Name Ru</label>
                <input type="text" class="form-control" id="cat_name_ru" name="cat_name_ru" placeholder="Cat name" value="{{ old('cat_name_ru', $entry->cat_name_ru) }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="adsoyad">Slug</label>
                <input type="hidden" name="original_slug" value="{{ old('slug', $entry->slug) }}">
                <input type="text" class="form-control" id="slug" name="slug" placeholder="Cat slug" value="{{ old('slug', $entry->slug) }}">
            </div>
        </div>
    </div>
</form>
@endsection
