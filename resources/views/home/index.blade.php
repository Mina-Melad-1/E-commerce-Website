    <!DOCTYPE html>
    <html>

    <head>
        @include('home.css')
    </head>

    <body class="{{ Cookie::get('theme', 'light') === 'dark' ? 'dark-mode' : '' }}">
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->
        <!-- slider section -->
        @include('home.slider')
        <!-- end slider section -->
    </div>
    <!-- end hero area -->

    <!-- shop section -->
    @include('home.product')
    <!-- end shop section -->

    <!-- contact section -->




@include('home.footer')
<script src="{{ asset('js/theme-switcher.js') }}"></script>
    </body>
    </html>