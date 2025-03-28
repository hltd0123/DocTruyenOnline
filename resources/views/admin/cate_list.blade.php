<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bookstore</title>
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
        @include('admin.navadmin')
        <!-- Page Content  -->
        <div id="content-page" class="content-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="iq-card">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title">Category List</h4>
                                </div>
                                <div class="iq-card-header-toolbar d-flex align-items-center">
                                    <a href="/admin/cate-create-form" class="btn btn-primary">Add New Category</a>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <div class="table-responsive">
                                    <table class="data-tables table table-striped table-bordered" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th style="width: 3%;">No</th>
                                                <th style="width: 15%;">Category Name</th>
                                                <th style="width: 28%;">Description</th>
                                                <th style="width: 12%;">Status</th>
                                                <th style="width: 5%;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="categoryTableBody">
                                            <!-- Categories will be inserted dynamically -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        function confirmDeleteCate(cateId) {
            if (confirm("Are you sure you want to delete this category?")) {
                window.location.href = '/admin/deleteCategory/' + cateId;
            }
        }
    </script>
</body>
</html>
