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
        <!-- Nav -->
        @include('admin.navadmin')
        <div id="content-page" class="content-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="iq-card">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title">Update Story</h4>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <form action="../admin/updateStory" method="post">
                                    <input type="hidden" name="storyId">
                                    <div class="form-group">
                                        <label for="title">Story Title:</label>
                                        <input type="text" name="title" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description:</label>
                                        <textarea name="description" class="form-control" rows="3" disabled></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="coverImage">Cover Image:</label>
                                        <input type="hidden" name="coverImage">
                                        <img class="m-4" src="../resources/image/" alt="Cover Image" width="100">
                                    </div>
                                    <div class="form-group">
                                        <label>Category:</label> <span id="categoryName"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Author:</label> <span id="authorName"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Status:</label>
                                        <input type="checkbox" name="status"> Display
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <button type="reset" class="btn btn-danger">Reset</button>
                                </form>
                                <div class="table-responsive">
                                    <h4 class="card-title mt-4">Chapter List</h4>
                                    <table class="data-tables table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Title</th>
                                                <th>Chapter number</th>
                                                <th>Content</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="chapterList">
                                            <!-- Data will be dynamically inserted here -->
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
        function confirmDeleteChapter(storyId, chapterId) {
            if (confirm("Are you sure you want to delete this chapter?")) {
                window.location.href = `../author/form-update-story/${storyId}/deleteStory/${chapterId}`;
            }
        }
    </script>
</body>
</html>
