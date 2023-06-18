@extends('frontend.layouts.master')
@section('title', config('app.name'))
@section('content')
<main class="page-wrapper" style="background-color: #FCFBF7;">
<!-- password starts -->
<section class="registr-section password d-flex align-items-center">
    <div class="password_container">
        <div class="row">
            <div class="col-12 col-sm-6 text-center">
                <div class="btn-wrapper mb-2">
                    <a href="{{route('user.login')}}" class="green">Я покупал ранее</a>
                </div>
            </div>
            <div class="col-12 col-sm-6 text-center">
                <div class="btn-wrapper mb-2">
                    <a href="{{route('user.register')}}" class="dark">Регистрация</a>
                </div>
            </div>
            <div class="forget-title text-end">
                <a href="forget-password.html">Забыли пароль?</a>
            </div >
        </div>
    </div>
</section>
<!-- password ends -->

</main>
@endsection
