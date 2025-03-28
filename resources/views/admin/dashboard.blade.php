<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bookstore</title>
    
    <!-- Import CSS and JS -->
    @include('layouts.linkcss')
    @include('layouts.linkjs')
</head>
<body>
    <!-- Loader Start -->
    <div id="loading">
        <div id="loading-center"></div>
    </div>
    
    <div class="wrapper">
        <!-- Navigation -->
        @include('admin.navadmin')
        
        <!-- Page Content -->
        <div id="content-page" class="content-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                            <div class="iq-card-body">
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle iq-card-icon bg-primary">
                                        <i class="ri-user-line"></i>
                                    </div>
                                    <div class="text-left ml-3">
                                        <h2 class="mb-0"><span class="counter">111</span></h2>
                                        <h5>Users</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                            <div class="iq-card-body">
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle iq-card-icon bg-danger">
                                        <i class="ri-book-line"></i>
                                    </div>
                                    <div class="text-left ml-3">
                                        <h2 class="mb-0"><span class="counter">111</span></h2>
                                        <h5>Books</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                            <div class="iq-card-body">
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle iq-card-icon bg-warning">
                                        <i class="ri-pencil-line"></i>
                                    </div>
                                    <div class="text-left ml-3">
                                        <h2 class="mb-0"><span class="counter">111</span></h2>
                                        <h5>Authors</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
