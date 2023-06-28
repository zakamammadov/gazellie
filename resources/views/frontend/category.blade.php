 @extends('frontend.layouts.master')
@section('title', config('app.name'))
@section('content')
<main style="background-color: #FCFBF7;">
    <!-- product list starts -->
<section class="product-list">
  <div class="container">
      <h6 class="product-list_title">{{$category->cat_name_ru}}</h6>
      <div class="row">

@if (count($products)==0)
  <h1 style="text-align: center">  {{'Product not found'}}</h1>
@endif


        @foreach ($products as $product )

          <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
              <div class="single-product">
                  <div class="sing-pic_wrapper">
                      <div class="sing-product_pic">
                          <img src="{{asset('uploads/products/'.$product->product_main_image)}}" alt="product">
                      </div>
                  </div>
                  <div class="single-product_details">
                      <strong class="single-product_code">{{$product->product_name_ru}}</strong>
                      <p class="single-product_descr">{{strip_tags($product->description_ru)}}</p>
                      {{-- <div class="single-product_descr">Обьемы: 250 мл, 500 мл</div> --}}
                    @if (Auth::user())

                      <div class="single-product_price">Цена:<span>{{$product->price}}<sup>₼</sup></span></div>
                      @endif

                  </div>
                  <div class="single-product_btns">
                      <a href="{{route('product',$product->slug)}}" class="more-btn">Подробнее</a>


                      <form action="{{ route('cart.add') }}" method="post">
                        {{ csrf_field() }}

                        <input type="hidden" name="id" value="{{ $product->id }}">
                      <button class="buy-btn" type="submit">Купить</button>
                    </form>

                  </div>
              </div>
          </div>
          @endforeach

      </div>
      {{-- <div class="pagination-wrapper">
          <nav aria-label="Page navigation example">
              <ul class="pagination">
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
                <li class="page-item"><a class="page-link active" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              </ul>
          </nav>
      </div> --}}
  </div>
</section>
</main>
@endsection
