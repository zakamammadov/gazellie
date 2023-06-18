@extends('frontend.layouts.master')
@section('title', config('app.name'))
@section('content')
<div class="full-screen" id="about-page" style="background-image: url('{{asset('front')}}/img/about/about-bg.png');min-height: 430px;">

    <div class="banner-container">
      <h4 class="page-title">О Нас</h4>
      <p class="page-descr">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      <nav style="--bs-breadcrumb-divider: '>>';color: #FCFBF7 !important;" aria-label="breadcrumb">
          <ol class="breadcrumb custom-breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">О нас</li>
          </ol>
        </nav>
  </div>
    <!-- banner ends -->
  </div>
  <section class="about-item">
    <div class="about-row">
      <div class="container">
        <div class="row">
          <div class="col-12 col-xl-6">
            <div class="about-col">
              <h6 class="about-item_title">Dr Zarifa Hamzayeva</h6>
              <p class="about-item_descr">
                Originally a doctor of genetics and preventative medicine, Dr
                Hamzayeva spent forty years studying, identifying and treating the
                symptoms of chronic illness. She is renowned for her pioneering
                in-depth diagnostic methods and the effective healing programmes
                she has created and championed. Inspired by her mother, who
                combined a strong commitment to family life with a successful
                career running one of the biggest tea plants in Azerbaijan, Dr
                Hamzayeva realised a long-term ambition when in 1999 she founded
                Azerbaijan’s first cosmetics research, development and production
                facility and launched her first range of Gazelli products.
              </p>
              <p class="about-item_descr">In 2003 Dr Hamzayeva founded Gazelli House Baku, that included specially devised diagnostic methods, bespoke treatment programs to heal and prevent as well as a full range of professional Gazelli Expert products range that covered skin, body and hair care.</p>
              <p class="about-item_descr">In 2003 Dr Hamzayeva founded Gazelli House Baku, that included specially devised diagnostic methods, bespoke treatment programs to heal and prevent as well as a full range of professional Gazelli Expert products range that covered skin, body and hair care.</p>
          </div>
        </div>
        <div class="col-12 col-xl-6">
          <div class="about-col">
            <div class="about-col-pic">
              <img src="{{asset('front')}}/img/about/doc-pic.png" alt="Doctor pic" />
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
    <div class="about-row">
      <div class="container">
        <div class="row">
          <div class="col-12 col-xl-6">
            <div class="about-col">
              <h6 class="about-item_title">Фабрика</h6>
              <p class="about-item_descr">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
              </p>
              <p class="about-item_descr">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          </div>
        </div>
        <div class="col-12 col-xl-6">
          <div class="about-col">
            <div class="about-col-pic">
              <img src="{{asset('front')}}/img/about/about-2.png" alt="abput us" />
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
    <div class="about-row">
      <div class="container">
        <div class="row">
          <div class="col-12 col-xl-6">
            <div class="about-col">
              <h6 class="about-item_title">Производство</h6>
              <p class="about-item_descr">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
              </p>
              <p class="about-item_descr">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          </div>
        </div>
        <div class="col-12 col-xl-6">
          <div class="about-col">
            <div class="about-col-pic">
              <img src="{{asset('front')}}/img/about/about-3.png" alt="abput us" />
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
    <div class="about-row">
      <div class="container">
        <div class="row">
          <div class="col-12 col-xl-6">
            <div class="about-col">
              <h6 class="about-item_title">Научно исследовательский центр</h6>
              <p class="about-item_descr">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
              </p>
              <p class="about-item_descr">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          </div>
        </div>
        <div class="col-12 col-xl-6">
          <div class="about-col">
            <div class="about-col-pic">
              <img src="{{asset('front')}}/img/about/about-4.png" alt="abput us" />
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </section>
@endsection
