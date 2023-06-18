 @extends('frontend.layouts.master')
@section('title', config('app.name'))
@section('content')
<main style="background-color: #FCFBF7;">
    <!-- product list starts -->
<section class="product-list">
  <div class="container">
      <h6 class="product-list_title">Очищающие средства</h6>
      <div class="row">
          <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
              <div class="single-product">
                  <div class="sing-pic_wrapper">
                      <div class="sing-product_pic">
                          <img src="assets/img/product/product.png" alt="product">
                      </div>
                  </div>
                  <div class="single-product_details">
                      <strong class="single-product_code">Код : FC-12</strong>
                      <p class="single-product_descr">Увлажняющее очищающее молочко</p>
                      <div class="single-product_descr">Обьемы: 250 мл, 500 мл</div>
                      <div class="single-product_price">Цена:<span>25<sup>₼</sup></span></div>
                  </div>
                  <div class="single-product_btns">
                      <a href="#" class="more-btn">Подробнее</a>
                      <button class="buy-btn" type="button">Купить</button>
                  </div>
              </div>
          </div>
          <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
              <div class="single-product">
                  <div class="sing-pic_wrapper">
                      <div class="sing-product_pic">
                          <img src="assets/img/product/product.png" alt="product">
                      </div>
                  </div>
                  <div class="single-product_details">
                      <strong class="single-product_code">Код : FC-12</strong>
                      <p class="single-product_descr">Увлажняющее очищающее молочко</p>
                      <div class="single-product_descr">Обьемы: 250 мл, 500 мл</div>
                      <div class="single-product_price">Цена:<span>25<sup>₼</sup></span></div>
                  </div>
                  <div class="single-product_btns">
                      <a href="#" class="more-btn">Подробнее</a>
                      <button class="buy-btn" type="button">Купить</button>
                  </div>
              </div>
          </div>
          <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
              <div class="single-product">
                  <div class="sing-pic_wrapper">
                      <div class="sing-product_pic">
                          <img src="assets/img/product/product.png" alt="product">
                      </div>
                  </div>
                  <div class="single-product_details">
                      <strong class="single-product_code">Код : FC-12</strong>
                      <p class="single-product_descr">Увлажняющее очищающее молочко</p>
                      <div class="single-product_descr">Обьемы: 250 мл, 500 мл</div>
                      <div class="single-product_price">Цена:<span>25<sup>₼</sup></span></div>
                  </div>
                  <div class="single-product_btns">
                      <a href="#" class="more-btn">Подробнее</a>
                      <button class="buy-btn" type="button">Купить</button>
                  </div>
              </div>
          </div>
          <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
              <div class="single-product">
                  <div class="sing-pic_wrapper">
                      <div class="sing-product_pic">
                          <img src="assets/img/product/product.png" alt="product">
                      </div>
                  </div>
                  <div class="single-product_details">
                      <strong class="single-product_code">Код : FC-12</strong>
                      <p class="single-product_descr">Увлажняющее очищающее молочко</p>
                      <div class="single-product_descr">Обьемы: 250 мл, 500 мл</div>
                      <div class="single-product_price">Цена:<span>25<sup>₼</sup></span></div>
                  </div>
                  <div class="single-product_btns">
                      <a href="#" class="more-btn">Подробнее</a>
                      <button class="buy-btn" type="button">Купить</button>
                  </div>
              </div>
          </div>
      </div>
      <div class="pagination-wrapper">
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
      </div>
  </div>
</section>
</main>
@endsection
