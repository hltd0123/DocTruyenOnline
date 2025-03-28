<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookstore</title>
    @include('layouts.linkcss')
    @include('layouts.linkjs')
</head>
<body>
    <div id="loading">
        <div id="loading-center"></div>
    </div>
    <div class="wrapper">
        @include('author.navuser')
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
                                    <div id="message-container"></div>
                                    <table class="data-tables table table-striped table-bordered" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th style="width: 3%;">No</th>
                                                <th style="width: 12%;">Story Image</th>
                                                <th style="width: 15%;">Story Name</th>
                                                <th style="width: 15%;">Category</th>
                                                <th style="width: 18%;">Description</th>
                                                <th style="width: 12%;">Status</th>
                                                <th style="width: 15%;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="story-list"></tbody>
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
        function confirmDelete(storyId) {
            if (confirm("Are you sure you want to delete this story?")) {
                window.location.href = '../author/deleteStory/' + storyId;
            }
        }
    </script>
</body>
</html>
