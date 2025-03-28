<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bookstore</title>

    <!-- Import CSS & JS -->
    @include('layouts.linkcss')
    @include('layouts.linkjs')
</head>

<body>
    <!-- Loader Start -->
    <div id="loading">
        <div id="loading-center"></div>
    </div>
    <div class="wrapper">
        <!-- Loader END -->

        <!-- Navigation -->
        @include('admin.navadmin')

        <!-- Page Content -->
        <div id="content-page" class="content-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="iq-card">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title">Update Author</h4>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <form action="../admin/saveStatusAuthor" method="post">
                                    <input type="hidden" name="acId" value="" id="acId">
                                    <div class="form-group">
                                        <label>Author Name:</label>
                                        <input type="text" class="form-control" name="userName" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Email:</label>
                                        <input type="text" class="form-control" name="email" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Password:</label>
                                        <input type="password" class="form-control" name="password" disabled>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="role" value="1">
                                    </div>
                                    <div class="form-group">
                                        <label>Status:</label>
                                        <input type="radio" name="status" value="1" checked> Display
                                        <input type="radio" name="status" value="0"> Hidden
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-danger">Reset</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
