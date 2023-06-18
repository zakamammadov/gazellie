@extends('frontend.layouts.master')
@section('title', config('app.name'))
@section('content')
<section class="registr-section d-flex align-items-center">
    <div class="custom-form_container">
        <div class="page-title_cover">
            <h3 class="page-title">Авторизация</h3>
            </div>
            @include('backend.layouts.errors')
            <form action="{{route('user.login')}}" method="POST"  id="signup-form">
                <label class="registr-form_title">Заполните пожалуйста следующие поля для авторизации*</label>
                <div class="row">
                    @csrf
                  <div class="col-12 col-sm-12 col-md-6">
                    <div class="registr-input mb-2">
                      <input type="text" name="userlogin" class="form-control" placeholder="Введите логин">
                    </div>
                  </div>
                  <div class="col-12 col-sm-12 col-md-6">
                    <div class="registr-input mb-2">
                      <input type="text" name="password" class="form-control" placeholder="Введите пароль">
                    </div>
                  </div>
                  <div class="forget-title text-end">
                        <a href="forget-password.html">Забыли пароль?</a>
                    </div >
                  <div class="submit-btn_cover text-start">
                    <button type="submit" class="success-btn">Авторизоваться</button>
                  </div>
                </div>
            </form>

          </div>
    </div>
</section>
@endsection
