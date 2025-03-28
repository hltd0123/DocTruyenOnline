<!doctype html>
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
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center"></div>
    </div>
    <div class="wrapper">
        <!-- loader END -->
        @include('author.navuser')
        
        <!-- Page Content  -->
        <div id="content-page" class="content-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="iq-card">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title">Add Story</h4>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <form action="saveStory.php" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Story Name:</label>
                                        <input type="text" class="form-control" name="title" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Category:</label>
                                        <select name="category" class="form-control" required>
                                            <option selected value=''>--- Choose category ---</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Stage name:</label>
                                        <select name="author" class="form-control" required>
                                            <option selected value=''>--- Choose Stage name ---</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Image:</label>
                                        <div class="custom-file">
                                            <input type="file" name="coverImageFile" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Description:</label>
                                        <textarea class="form-control" name="description" required rows="4"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Status:</label>
                                        <input type="checkbox" name="status"> Display
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