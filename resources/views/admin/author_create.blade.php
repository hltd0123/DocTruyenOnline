<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bookstore</title>
    @include('layouts.linkcss')
    @include('layouts.linkjs')
</head>
<body>
    <div id="loading">
        <div id="loading-center"></div>
    </div>
    <div class="wrapper">
        @include('admin.navadmin')
        <div id="content-page" class="content-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="iq-card">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title">Add Author</h4>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <form action="saveAuthor" method="post">
                                    <div class="form-group">
                                        <label>Author Name:</label>
                                        <input type="text" class="form-control" name="userName" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Email:</label>
                                        <input type="text" class="form-control" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Password:</label>
                                        <input type="text" class="form-control" name="password" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="role" value="1" hidden>
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