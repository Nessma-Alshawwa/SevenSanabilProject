{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> --}}
<script src="{{ asset('dist/js/theme-change.js')}}"></script><!-- theme switch js (light and dark)-->
<script src="{{ asset('dist/js/owl.carousel.js')}}"></script>
<script src="{{ asset('dist/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{ asset('dist/js/owl.carousel.min.js')}}"></script>

<script src="{{ asset('dist/js/jquery-3.3.1.min.js')}}"></script> <!-- Common jquery plugin -->
<script src="{{ asset('dist/js/bootstrap.js')}}"></script> <!-- Common jquery plugin -->

<script src="{{ URL('dist/js/counter.js')}}"></script>
<script src="https://kit.fontawesome.com/6fb89949fb.js" crossorigin="anonymous"></script>
<!--/MENU-JS-->
<script>
  $('.carousel').carousel({
  interval: 1000
})
$('.carousel').on('slid.bs.carousel', function (e) {
  $('.carousel').carousel('2') // Will slide to the slide 2 as soon as the transition to slide 1 is finished
})
  $(window).on("scroll", function () {
    var scroll = $(window).scrollTop();

    if (scroll >= 80) {
      $("#site-header").addClass("nav-fixed");
    } else {
      $("#site-header").removeClass("nav-fixed");
    }
  });

  //Main navigation Active Class Add Remove
  $(".navbar-toggler").on("click", function () {
    $("header").toggleClass("active");
  });
  $(document).on("ready", function () {
    if ($(window).width() > 991) {
      $("header").removeClass("active");
    }
    $(window).on("resize", function () {
      if ($(window).width() > 991) {
        $("header").removeClass("active");
      }
    });
  });
</script>
<!--//MENU-JS-->

<!-- disable body scroll which navbar is in active -->
<script>
  $(function () {
    $('.navbar-toggler').click(function () {
      $('body').toggleClass('noscroll');
    })
  });
</script>
<!-- //disable body scroll which navbar is in active -->

<!--bootstrap-->
<script src="{{ URL('dist/js/bootstrap.min.js')}}"></script>
<!-- //bootstrap-->