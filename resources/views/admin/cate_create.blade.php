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
                                    <h4 class="card-title">Add Categories</h4>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <form action="saveCategory" method="post">
                                    <div class="form-group">
                                        <label>Category Name:</label>
                                        <input type="text" class="form-control" name="name" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Category Description:</label>
                                        <textarea class="form-control" name="description" required rows="4"></textarea>
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
