<!DOCTYPE html>
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
                                    <h4 class="card-title">Update Category</h4>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <form id="updateCategoryForm" action="/admin/updateCategory" method="post">
                                    <input type="hidden" id="categoryId" name="categoryId">
                                    <div class="form-group">
                                        <label>Category Name:</label>
                                        <input type="text" class="form-control" id="name" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label>Category Description:</label>
                                        <textarea class="form-control" rows="4" id="description" name="description"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Status:</label>
                                        <input type="radio" id="status1" name="status" value="1" checked> Display 
                                        <input type="radio" id="status0" name="status" value="0"> Hidden
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
    
    <script>
        document.getElementById('name').addEventListener('keydown', function(e) {
            e.preventDefault(); // Chặn người dùng nhập liệu
        });
    </script>
</body>
</html>
