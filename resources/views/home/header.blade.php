<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<header class="header_section">
    <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="index.html">
        <span>
            Giftos
        </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class=""></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item {{ Request::is('shop') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('shop') }}">Shop</a>
                </li>
                <li class="nav-item {{ Request::is('why') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('why') }}">Why Us</a>
                </li>
                <li class="nav-item {{ Request::is('contact') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('contact') }}">Contact Us</a>
                </li>
            </ul>
        
        <div class="user_option">

        @if (Route::has('login'))

            @auth


            <a href="{{url('myorders')}}">
                <i class="bi bi-bag-fill"></i>
                My Orders
                </a>


            <a href="{{url('mycart')}}">
                <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                [{{$count}}]
                </a>

                <form style="padding: 12px" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-danger" type="submit" style="padding: 5px; width:130px">
                        <i class="bi bi-box-arrow-left"></i> Logout
                    </button>
                </form>
                

            @else
            <a href="{{url('/login')}}">   <!--   edit here      -->
            <i class="fa fa-user" aria-hidden="true"></i>
            <span>
                Login
            </span>
            </a>

            <a href="{{url('/register')}}">   <!--   edit here      -->
                <i class="fa fa-vcard" aria-hidden="true"></i>  <!--   vcard      -->
                <span>
                    Register
                </span>
                </a>

                @endauth
            @endif
        </div>
        </div>
    </nav>
    </header>