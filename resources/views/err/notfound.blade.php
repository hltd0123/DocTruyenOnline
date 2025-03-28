<!DOCTYPE html>
<html lang="en">
<head>
   @include('layouts.linkcss')
</head>
<body>
    <!-- loader Start -->
    <div id="loading">
      <div id="loading-center"></div>
    </div>
    <!-- loader END -->

    <!-- Wrapper Start -->
    <div class="wrapper">
      <div class="container p-0">
          <div class="row no-gutters height-self-center">
              <div class="col-sm-12 text-center align-self-center">
                  <div class="iq-error position-relative">
                      <img src="resources/images/error/404.png" class="img-fluid iq-error-img" alt="">
                      <h2 class="mb-0 mt-4">Oops! Không tìm thấy trang này.</h2>
                      <p>Trang bạn đang yêu cầu không tồn tại.</p>
                      <a class="btn btn-primary mt-3" href="index.html">
                          <i class="ri-home-4-line"></i> Về Trang Chủ
                      </a>
                  </div>
              </div>
          </div>
      </div>
    </div>
    <!-- Wrapper END -->
    <script src="{{ asset('resources/js/jquery.min.js') }}"></script>
    <script src="{{ asset('resources/js/popper.min.js') }}"></script>
    <script src="{{ asset('resources/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('resources/js/jquery.appear.js') }}"></script>
    <script src="{{ asset('resources/js/countdown.min.js') }}"></script>
    <script src="{{ asset('resources/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('resources/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('resources/js/wow.min.js') }}"></script>
    <script src="{{ asset('resources/js/apexcharts.js') }}"></script>
    <script src="{{ asset('resources/js/lottie.js') }}"></script>
    <script src="{{ asset('resources/js/slick.min.js') }}"></script>
    <script src="{{ asset('resources/js/select2.min.js') }}"></script>
    <script src="{{ asset('resources/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('resources/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('resources/js/smooth-scrollbar.js') }}"></script>
    <script src="{{ asset('resources/js/style-customizer.js') }}"></script>
    <script src="{{ asset('resources/js/chart-custom.js') }}"></script>
    <script src="{{ asset('resources/js/custom.js') }}"></script>
</body>
</html>
