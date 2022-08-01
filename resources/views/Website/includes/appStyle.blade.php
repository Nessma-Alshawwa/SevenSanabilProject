{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> --}}
<link rel="stylesheet" href="{{ asset('dist/css/bootstrap.css') }}" />

<link rel="stylesheet" href="{{ asset('dist/css/style-starter.css') }}">
<link rel="stylesheet" href="{{ asset('dist/css/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{ asset('dist/css/owl.theme.default.min.css')}}">
<!-- Ionicons -->
    <link
      rel="stylesheet"
      href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"
    />
  

    <!-- Font Awesome -->
  {{-- <link rel="stylesheet" href="{{ URL('plugins/fontawesome-free/css/all.min.css') }}"> --}}
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <style>
.carousel-indicators {
  position: absolute;
  bottom: 10px;
  left: 50%;
  z-index: 15;
  width: 60%;
  padding-left: 0;
  margin-left: -30%;
  text-align: center;
  list-style: none;
}
.carousel-indicators li {
    display: inline-block;
    width: 10px;
    height: 10px;
    margin: 1px;
    text-indent: -999px;
    cursor: pointer;
    background-color: rgba(0, 0, 0, 0); // IE9
    border: 1px solid @carousel-indicator-border-color;
    border-radius: 10px;
  }

  .carousel-indicators .active {
    width: 12px;
    height: 12px;
    margin: 0;
    background-color: @carousel-indicator-active-bg;
  }
    /* .carousel .item {
  height: 300px;
}

.item img {
    position: absolute;
    top: 0;
    left: 0;
    min-height: 300px;
} */
  </style>
  