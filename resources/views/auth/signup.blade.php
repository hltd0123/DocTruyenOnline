<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Booksto - Sign Up</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('resources/images/favicon.ico') }}" />

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('resources/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/css/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/css/responsive.css') }}">

</head>
<body>
    <!-- Loader Start -->
    <div id="loading">
        <div id="loading-center"></div>
    </div>
    <!-- Loader END -->

    <!-- Sign Up Start -->
    <section class="sign-in-page">
        <div class="container p-0">
            <div class="row no-gutters height-self-center">
                <div class="col-sm-12 align-self-center page-content rounded">
                    <div class="row m-0">
                        <div class="col-sm-12 sign-in-page-data">
                            <div class="sign-in-from bg-primary rounded">
                                <h3 class="mb-0 text-center text-white">Sign Up</h3>
                                <p class="text-center text-white">Enter your email address and password to access admin panel.</p>
                                <form class="mt-4 form-text">
                                    <div class="form-group">
                                        <label for="fullName">Your Full Name</label>
                                        <input type="text" class="form-control mb-0" id="fullName" placeholder="Your Full Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input type="email" class="form-control mb-0" id="email" placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control mb-0" id="password" placeholder="Password">
                                    </div>
                                    <div class="d-inline-block w-100">
                                        <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">
                                            <input type="checkbox" class="custom-control-input" id="terms">
                                            <label class="custom-control-label" for="terms">I accept <a href="#" class="text-light">Terms and Conditions</a></label>
                                        </div>
                                    </div>
                                    <div class="sign-info text-center">
                                        <button type="submit" class="btn btn-white d-block w-100 mb-2">Sign Up</button>
                                        <span class="text-dark d-inline-block line-height-2">Already Have Account? <a href="sign-in.html" class="text-white">Log In</a></span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Sign Up END -->

    <!-- JavaScript Files -->
    <script src="{{ asset('resources/js/jquery.min.js') }}"></script>
    <script src="{{ asset('resources/js/popper.min.js') }}"></script>
    <script src="{{ asset('resources/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('resources/js/jquery.appear.js') }}"></script>
    <script src="{{ asset('resources/js/countdown.min.js') }}"></script>
    <script src="{{ asset('resources/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('resources/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('resources/js/wow.min.js') }}"></script>
    <script src="{{ asset('resources/js/lottie.js') }}"></script>
    <script src="{{ asset('resources/js/apexcharts.js') }}"></script>
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
