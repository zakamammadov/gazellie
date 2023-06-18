@extends('frontend.layouts.master')
@section('title', config('app.name'))
@section('content')
<main class="page-wrapper" style="background-color: #FCFBF7;">
    <section class="registr-section">
        <div class="custom-form_container">
          <div class="page-title_cover">
            <h3 class="page-title">Регистрация</h3>
          </div>
    - @include('frontend.layouts.partials.alert')

          <p class="page-descr"> <span class="warning-text">ВНИМАНИЕ!</span> Продажа товаров Gazelli Expert осуществляется только
            сертифицированным косметологам.</p>
          <form action="{{route('user.register')}}" method="POST" enctype="multipart/form-data" id="registr-form">
            <label class="registr-form_title">Заполните пожалуйста следующие поля для регистрации*</label>
            <div class="row">
              <div class="col-12 col-sm-12 col-md-6">
                <div class="registr-input">
                  <input type="text" class="form-control" value="{{ old('name') }}" name="name" placeholder="Ваше Имя ">
                  @csrf
                </div>
              </div>
              <div class="col-12 col-sm-12 col-md-6">
                <div class="registr-input">
                  <input type="text" class="form-control" value="{{ old('surname') }}" name="surname" placeholder="Фамилия">
                </div>
              </div>
              <div class="col-12 col-sm-12 col-md-6">
                <div class="registr-input">
                  <input type="email" class="form-control" value="{{ old('email') }}" name="email" placeholder="Email">
                </div>
              </div>
              <div class="col-12 col-sm-12 col-md-6">
                <div class="registr-input">
                  <input type="tel" class="form-control" value="{{ old('phone') }}" name="phone" placeholder="Телефон">
                </div>
              </div>
              <div class="col-12 col-sm-12">
                <div class="registr-input">
                  <input type="text" class="form-control" value="{{ old('adress') }}" name="adress" placeholder="Адрес">
                </div>
              </div>
              <div class="col-12 col-sm-12 col-lg-4">
                <div class="registr-input">
                  <input type="text" class="form-control" value="{{ old('userlogin') }}" name="userlogin" placeholder="Логин">
                </div>
              </div>
              <div class="col-12 col-sm-12 col-lg-4">
                <div class="registr-input">
                  <input type="password" class="form-control"  name="password" placeholder="Введите пароль">
                </div>
              </div>
              <div class="col-12 col-sm-12 col-lg-4">
                <div class="registr-input">
                  <input type="text" class="form-control" name="password_confirmation" placeholder="Повторите пароль">
                </div>
              </div>
              <div class="col-12 col-sm-12">
                <div class="registr-input d-flex upload-container">
                  <input type="file" id="upload" name="image" class="custom-file-input">
                  <label for="upload" class="upload-label">Прикрепите документ подтверждающий профессию косметолога (фото, скан) </label>
                </div>
              </div>
              <div class="submit-btn_cover">
                <button class="success-btn" type="submit">Зарегистрироваться</button>
              </div>
            </div>
          </form>
        </div>


      </section>

    </main>
    <!-- register form section ends -->
@endsection
