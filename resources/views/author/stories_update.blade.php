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
                                    <h4 class="card-title">Update Story</h4>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <form action="../author/updateStory" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="storyId" value="">
                                    <div class="form-group">
                                        <label for="title">Story Title:</label>
                                        <input type="text" name="title" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description:</label>
                                        <textarea name="description" class="form-control" required rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="coverImage">Cover Image:</label>
                                        <input type="file" class="form-control" name="coverImageFile">
                                    </div>
                                    <div class="form-group">
                                        <label for="category">Category:</label>
                                        <select name="category" class="form-control" required>
                                            <option selected value=''>--- Choose category ---</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="author">Stage name:</label>
                                        <select name="author" class="form-control" required>
                                            <option selected value=''>--- Choose Stage name ---</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Status:</label>
                                        <input type="checkbox" name="status"> Display
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <button type="reset" class="btn btn-danger">Reset</button>
                                    <a href="../author/form-update-story/create-chapter" class="btn btn-warning text-white">Create chapter</a>
                                </form>
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
                window.location.href = '../author/form-update-story/' + storyId + '/deleteStory/' + chapterId;
            }
        }
    </script>
</body>
</html>