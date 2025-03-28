<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookstore - Update Chapter</title>
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
                                    <h4 class="card-title">Update Chapter</h4>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <form action="/author/updateChapter" method="post">
                                    <input type="hidden" class="form-control" name="storyId" value="">
                                    <input type="hidden" class="form-control" name="chapterId" value="">
                                    <div class="form-group">
                                        <label>Story Name:</label>
                                        <input type="text" class="form-control" name="chapterTitle" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Chapter Number:</label>
                                        <input type="text" class="form-control" name="chapterNumber" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Description:</label>
                                        <textarea class="form-control" name="content" required rows="4"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Status:</label>
                                        <input type="radio" name="status" value="1"> Display 
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
