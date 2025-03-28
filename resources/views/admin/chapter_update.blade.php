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
                    <div class="col-sm-12">
                        <div class="iq-card">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title">Story List</h4>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <div class="table-responsive">
                                    <table class="data-tables table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th style="width: 3%;">No</th>
                                                <th style="width: 12%;">Book Image</th>
                                                <th style="width: 15%;">Book Name</th>
                                                <th style="width: 15%;">Book Category</th>
                                                <th style="width: 15%;">Book Author</th>
                                                <th style="width: 18%;">Book Description</th>
                                                <th style="width: 7%;">Book Price</th>
                                                <th style="width: 7%;">Book PDF</th>
                                                <th style="width: 15%;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="story-list">
                                            <!-- Dynamic data will be loaded here -->
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
</body>
</html>
