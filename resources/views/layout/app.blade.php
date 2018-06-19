
@include('header/head')
<body>
@include('header.header')

@include('slider.slider-bar')

@yield('content')
@include('footer.footer')



<script src="{{asset('frontend/js/jquery.js')}} "></script>
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('frontend/js/price-range.js')}}"></script>
<script src="{{asset('frontend/js/jquery.prettyPhoto.js')}}"></script>
<script src="{{asset('frontend/js/main.js')}}"></script>
</body>
</html>