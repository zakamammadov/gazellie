<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <div class="responsive-menu d-flex justify-content-between">
        <ul class="navbar-nav mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="">О НАС</a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                УХОД ЗА ЛИЦОМ
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
            </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    УХОД ЗА ТЕЛОМ
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#">ДЛЯ ВАНН</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#">ЭССЕНЦИИ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="">База знаниӢ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="">Контакты</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    RU
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">AZ</a></li>
                    <li><a class="dropdown-item" href="#">EN</a></li>
                </ul>
            </li>
        </ul>
        <div class="right-box d-flex">
            <div class="">
                <button type="button" class="search-btn border-0 outline-0" data-bs-toggle="modal" data-bs-target="#searchModal">
                   @php
      $route = Route::current()->getName();

      @endphp
<?php
    if ($route=="home") {?>
        <img src="{{asset('front')}}/img/index/glass-icon.svg" alt="glass icon" >
                    </button>
                    <a href="#" class="cart-icon">
                    <img src="{{asset('front')}}/img/index/cart-icon.svg" alt="cart icon">
                    </a>
  <?php  }else{?>
            <img src="{{asset('front')}}/img/about/glass-dark.svg" alt="glass icon" >
                        </button>
                        <a href="#" class="cart-icon">
                          <img src="{{asset('front')}}/img/about/cart-dark.svg" alt="cart icon">
                        </a>

 <?php }  ?>


            </div>
            @guest

                <a href="{{route('user.log_reg_form')}}" class="reg-btn">Войти</a>
                @endguest
                @auth

                {{-- <a href="#" class="reg-btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Выйти</a>
                <form id="logout-form" action="{{ route('user.logout') }}" method="post" style="display: none;">
                    {{ csrf_field() }}
                </form> --}}

                <ul class="navbar-nav mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                             {{ Auth::user()->name}} &nbsp;{{ Auth::user()->surname}}
                        </a>
                        <ul class="dropdown-menu">
                            {{-- <li><a class="dropdown-item" href="#">Заказы</a></li> --}}
                            <li><a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit()" href="#">Выйти</a>
                                <form id="logout-form" action="{{ route('user.logout') }}" method="post" style="display: none;">
                                    {{ csrf_field() }}
                                </form>

                            </li>
                        </ul>
                    </li>


                </ul>






                @endauth






            </div>

        </div>

    </div>




    </div>

</div>
