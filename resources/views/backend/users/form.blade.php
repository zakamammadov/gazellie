@extends('backend.layouts.master')
{{-- @section('title')
User detal
@endsection --}}

@section("content")

<form method="post" action="{{ route('back.user.save', $entry->id) }}">
    {{ csrf_field() }}

    <div class="float-right">
                <button type="submit" class="btn btn-primary">
            {{ $entry->id > 0 ? "Edit" : "Save" }}
        </button>
    </div>

    <h3 class="sub-header">
        User {{ $entry->id > 0 ? "Edit" : "Add" }}
    </h3>
<hr>
    @include('backend.layouts.errors')

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="adsoyad">Name Surname</label>
                <input type="text" class="form-control" id="adsoyad" name="name" placeholder="Ad Soyad" value="{{ old('name', $entry->name) }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email', $entry->email) }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="sifre">Password</label>
                <input type="password" class="form-control" id="sifre" name="password" placeholder="Password">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="adres">Adress</label>
                <input type="text" class="form-control" id="adres" name="adress" placeholder="Adress" value="{{old('adress',$entry->detail->adress)}}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" value="{{ old('phone',$entry->detail->phone)}}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="ceptelefonu">Mobile phone</label>
                <input type="text" class="form-control" id="mob_phone" name="mob_phone" placeholder="Mobile phone" value="{{ old('mob_phone', $entry->detail->mob_phone) }}">
            </div>
        </div>
    </div>
    <div class="checkbox">
        <label>
            <input type="hidden" name="is_active" value="0">
            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $entry->is_active) ? 'checked' : '' }}> Active
        </label>
    </div>
    <div class="checkbox">
        <label>
            <input type="hidden" name="is_admin" value="0">
            <input type="checkbox" name="is_admin" value="1" {{ old('is_admin', $entry->is_admin) ? 'checked' : '' }}> Adminstrator
        </label>
    </div>
</form>
@endsection
