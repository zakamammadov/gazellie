@extends('frontend.layouts.master')
@section('title', config('app.name'))
@section('content')
<main style="background-color: #FCFBF7;">
    <!-- cart secion starts -->
    <section class="cart-section">
      <div class="container">
        <h4 class="cart-title">Корзина</h4>
        @include('frontend.layouts.partials.alert')

        <!-- basket items starts-->
        <div class="basket-items">

            @if (count(Cart::content())>0)
            @foreach(Cart::content() as $productCartItem)

          <div class="basket-item">
            <div class="row">
              <div class="col-2 col-lg-1">
                <div class="basket-item_pic">
                  <img src="{{asset('uploads/products/'.$productCartItem->options->image)}}" alt="Gazelli product">
                </div>
              </div>
              <div class="col-10 col-lg-11 pt-4">
                <div class="row">
                  <div class="col-12 col-md-6">
                              <a href="{{ route('product', [$productCartItem->options->slug]) }}"


                    style="text-decoration: none">

                    <p class="basket-item_descr">{{ $productCartItem->name }}</p>

                </a>
                    {{-- <div class="basket-item_measure">Обьемы: 250 мл, 500 мл</div> --}}
                  </div>
                  <div class="col-12 col-md-2">
                    <strong class="basket-item_code">{{ $productCartItem->name }}</strong>
                  </div>
                  <div class="col-12 col-md-4">
                    <div class="container-margin d-flex justify-content-between">
                      <div class="basket-item_quantity">
                        <div class="d-flex align-items-center flex-direction-row">
                          <button type="button" class="count-down urun-adet-azalt" data-id="{{ $productCartItem->rowId }}" data-adet="{{ $productCartItem->qty-1 }}">-</button>
                          <div class="basket-quantity">
                            <input type="text" min="1" value="{{ $productCartItem->qty }}" readonly>
                          </div>
                          <button type="button" class="count-up urun-adet-artir" data-id="{{ $productCartItem->rowId }}" data-adet="{{ $productCartItem->qty+1 }}">+</button>
                          {{-- <td>
                            <a href="#" class="btn btn-xs btn-default urun-adet-azalt" data-id="{{ $productCartItem->rowId }}" data-adet="{{ $productCartItem->qty-1 }}">-</a>
                            <span style="padding: 10px 20px">{{ $productCartItem->qty }}</span>
                            <a href="#" class="btn btn-xs btn-default urun-adet-artir" data-id="{{ $productCartItem->rowId }}" data-adet="{{ $productCartItem->qty+1 }}">+</a>
                        </td> --}}
                        </div>
                      </div>
                      <div class="basket-item_price">
                        @if (auth()->check())

                        <h6 class="price">{{ $productCartItem->subtotal }}<sup>₼</sup></h6>
@endif
                        <form action="{{ route('cart.destroy', $productCartItem->rowId) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        <button type="submit" class="del-btn">
                          <span class="d-block me-1">delete</span>
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                        </button>

                        </form>

{{--
                        <form action="{{ route('cart.remove_all') }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input type="submit" class="btn btn-info pull-left" value="Cart remove">
                        </form> --}}


                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endforeach
@endif

        </div>
        <!-- basket items ends-->
        <div class="buyer-card_container">
            @if (auth()->check())

          <div class="row">
            <div class="col-12 col-sm-6">
              <div class="buyer-card d-flex align-items-center justify-content-end">
                {{-- <span>Карта покупателя</span>
                <div class="card-input-cover">
                  <input type="text" placeholder="xxxxxxx">
                </div> --}}
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <div class="total-price text-center">
                Итого: <span>{{Cart::subtotal()}}<sup>₼</sup></span>
              </div>
            </div>
          </div>
          @endif

          @if (auth()->check())


          <div class="buyer-card_btns d-flex justify-content-between">
            <a href="product.html" class="empty-btn">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z"/></svg>Вернуться назад</a>
            <a href="order.html" class="success-btn"> Оформить заказ</a>
          </div>
@else
<div class="buyer-card_btns d-flex justify-content-between">
    <a href="product.html" class="empty-btn">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z"/></svg>Вернуться назад</a>
    <a href="{{route('user.log_reg_form')}}" class="success-btn">Войти</a>
  </div>


@endif

        </div>
      </div>
    </section>
    <!-- cart section ends -->


    </main>

@endsection

@section('script')
    <script>
                    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
        $(function () {

            $('.urun-adet-artir, .urun-adet-azalt').on('click', function () {
                var id = $(this).attr('data-id');
                var adet = $(this).attr('data-adet');
                $.ajax({
                    type: 'PATCH',
                    url: '{{ url('cart/edit') }}/' + id,
                    data: {adet: adet},
                    success: function (result) {
                        window.location.href = '{{ route('cart') }}';
                    }
                });
            });
        });
    </script>
@endsection
