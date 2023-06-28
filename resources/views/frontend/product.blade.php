@extends('frontend.layouts.master')
@section('title', config('app.name'))
@section('content')
<main class="page-wrapper" style="background-color: #FCFBF7;">
    <section class="single-product">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="product-slider-wrapper d-flex justify-content-between">
                          <div class="slider-nav">
                            {{-- <div class="product-helper_img">
                                    <img src="{{asset('front')}}/img/single-product/Group 104.png" alt="">
                            </div>
                            <div class="product-helper_img">
                                    <img src="{{asset('front')}}/img/single-product/product1.png" alt="">
                            </div> --}}
                          </div>
                          <div class="product-slider" id="lightgallery">
                            <a class="product-main_img test d-block text-decoration-none" href="{{asset('uploads/products/'.$product->product_main_image)}}" data-lg-size="1600-2400">
                              <img src="{{asset('uploads/products/'.$product->product_main_image)}}" data-lg-size="1600-2400" alt="">
                            </a>
                            {{-- <a class="product-main_img demo-trigger_second d-block text-decoration-none" href="assets/img/single-product/product2.png">
                              <img src="{{asset('front')}}/img/single-product/product2.png" alt="">
                            </a> --}}
                        </div>
                    </div>
                    <div class="product-slider_price">
                        <div class="product-slider_code">{{$product->product_name_ru}}</div>
                        <div class="buy d-flex align-items-center mt-3 justify-content-end">
                            <div class="single-product_price">Цена:<span>{{$product->price}}<sup>₼</sup></span></div>



                      <form action="{{ route('cart.add') }}" method="post">
                        {{ csrf_field() }}

                        <input type="hidden" name="id" value="{{ $product->id }}">
                      <button class="success-btn ms-2" type="submit">Купить</button>
                    </form>
                    </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="single-product_content">
                      <h3 class="single-prod_title">{{$product->price}}</h3>
                      {{-- <span class="single-prod_measure">250 мл</span> --}}
                      <p class="single-prod_descr">{{strip_tags($product->description_ru)}}</p>


                      <!-- accordion starts -->
                      {{-- <div class="product-accordion">
                          <div class="accordion accordion-flush" id="accordionFlushExample">
                              <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                      Активные компоненты
                                  </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                  <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the class. This is the first item's accordion body.</div>
                                </div>
                              </div>
                              <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingTwo">
                                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                      Применение
                                  </button>
                                </h2>
                                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                  <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
                                </div>
                              </div>
                            </div>
                      </div> --}}
                      <!-- accordion ends -->
                  </div>
                </div>
            </div>
        </div>
    </section>
    <!-- single product container ends -->
      <!-- product list starts -->
      <section class="product-list">
        <div class="container">
            <h6 class="product-list_title">Похожие продукты</h6>
            <div class="row">
@foreach ($pr_category as $pr)

                <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                    <div class="single-product">
                        <div class="sing-pic_wrapper">
                            <div class="sing-product_pic">
                                <img src="{{asset('uploads/products/'.$product->product_main_image)}}" alt="product">
                            </div>
                        </div>
                        <div class="single-product_details">
                            <strong class="single-product_code">Код : FC-12</strong>
                            <p class="single-product_descr">{{$pr->product_name_ru}}</p>
                            <div class="single-product_descr">{{strip_tags($pr->description_ru)}}</div>
                            <div class="single-product_price">Цена:<span>{{$pr->price}}<sup>₼</sup></span></div>
                        </div>
                        <div class="single-product_btns">
                            <a href="#" class="more-btn">Подробнее</a>

                            <form action="{{ route('cart.add') }}" method="post">
                                {{ csrf_field() }}

                                <input type="hidden" name="id" value="{{ $product->id }}">
                              <button class="buy-btn" type="submit">Купить</button>
                            </form>                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
      </section>
      <!-- product list ends -->

    </main>
@endsection
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/css/lightgallery.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/css/lg-zoom.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/css/lg-thumbnail.min.css" />
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/lightgallery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/plugins/thumbnail/lg-thumbnail.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/plugins/zoom/lg-zoom.umd.min.js"></script>
@endsection
