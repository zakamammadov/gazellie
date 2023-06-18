@extends('frontend.layouts.master')
@section('title', config('app.name'))
@section('content')
<main class="page-wrapper" style="background-color: #FCFBF7;">
    <section id="order">
        <div class="container">
            <h4 class="order-title">Оформи заказ</h4>
            <form action="" class="place-order">
                <div class="row">
                    <div class="col-12 col-lg-6">
                      <div class="pt-2">
                        <div class="order-input">
                          <label for="order-name">Имя / Фамилия</label>
                          <input type="text" name="order-name" id="order-name" class="form-control" required>
                      </div>
                      <div class="order-input">
                          <label for="order-tel">Номер телефона</label>
                          <div class="select-wrapper d-flex">
                              <select id="order-tel" class="form-select custom-select">
                                  <option selected>050</option>
                                  <option>051</option>
                                  <option>010</option>
                                </select>
                                <div class="custom-input">
                                  <input type="tel" name="order-tel" id="order-tel" class="form-control" required>
                                </div>
                          </div>
                      </div>
                      <div class="order-input">
                          <label for="order-email">Электронная почта</label>
                          <input type="email" name="order-email" id="order-email" class="form-control" required>
                      </div>
                      <div class="order-input">
                          <label for="order-city">Город</label>
                          <input type="text" name="order-city" id="order-city" class="form-control" required>
                      </div>
                      <div class="order-input">
                          <label for="details">Дополнительная информация</label>
                          <textarea name="details" class="form-control" id="details" placeholder="Если к заказу есть дополнительные примечание, введите его в это поле. "></textarea>
                      </div>

                      </div>
                    </div>
                    <div class="col-12 col-lg-6">
                      <div class="d-flex align-items-center justify-content-center flex-column">
                        <h4 class="purchase-title">Выберите способ оплаты</h4>
                          <div class="form-check custom-form_check">
                            <img src="assets/img/order/money.svg" alt="">
                              <label class="form-check-label" for="cash">
                                Оплата наличными
                            </label>
                            <input class="form-check-input" type="radio" name="purchase" id="cash" checked>
                          </div>
                          <div class="form-check custom-form_check">
                            <img src="assets/img/order/card.svg" alt="">
                              <label class="form-check-label" for="card">
                                Оплата картой
                            </label>
                            <input class="form-check-input" type="radio" name="purchase" id="card">
                          </div>
                      </div>
                      <div class="d-flex align-items-center justify-content-center flex-column">
                        <h4 class="purchase-title">Выберите способ получения товара</h4>
                          <div class="form-check custom-form_check">
                            <img src="assets/img/order/magazine.svg" alt="">
                              <label class="form-check-label" for="delivery-shop">
                                Заберите из магазина
                            </label>
                            <input class="form-check-input" type="radio" name="delivery" id="delivery-shop" checked>
                          </div>
                          <div class="form-check custom-form_check">
                            <img src="assets/img/order/car.svg" alt="">
                              <label class="form-check-label" for="delivery-home">
                                Доставка по адресу
                            </label>
                            <input class="form-check-input" type="radio" name="delivery" id="delivery-home">
                          </div>
                      </div>
                      <div class="shop-select_cover">
                        <h4 class="purchase-title">Магазин в котором вы заберете товар</h4>
                        <select class="form-select mb-1" aria-label=".form-select-lg example">
                          <option selected>Выберите магазин</option>
                          <option value="1">One</option>
                          <option value="2">Two</option>
                          <option value="3">Three</option>
                        </select>
                        <div class="terms-cover">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                              Согласен с условиями
                            </label>
                          </div>
                        </div>
                        <div class="order-btn_container d-flex align-items-center justify-content-end">
                          <a href="#" class="empty-btn">Отмена</a>
                          <button type="submit" class="success-btn">Продолжить</button>
                        </div>
                      </div>

                    </div>
                </div>
            </form>
        </div>
    </section>

    </main>
@endsection
