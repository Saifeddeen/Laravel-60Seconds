<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">

    <title>60-seconds: Admin</title>
</head>

<body>
    <div class="container">
        <h3>Add New Clients and Features</h3>
        <br>
        <hr>
        <hr>
        <br>
        <h4><b><i>Add New Clients:</i></b><br><br></h4>
        <form method="POST" action="{{ route('admin.clients.create') }}" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6">
                <label for="name-1" class="form-lable">Name:</label>
                <input type="text" name="name" id="name-1" class="form-control"><br>
            </div>

            <div class="col-md-6">
                <label for="comment-1" class="form-lable">Comment:</label>
                <input type="text" name="comment" id="comment-1" class="form-control"><br>
            </div>

            <div class="col-md-6">
                <label for="rating-1" class="form-lable">Rate:</label>
                <input type="number" name="rating" id="rating-1" class="form-control"><br>
            </div>

            <div class="col-md-6">
                <label for="image-1" class="form-lable">Personal Image:</label>
                <input type="file" name="image" id="image-1" class="form-control"><br>
            </div>

            <input type="submit" value="Create" class="btn btn-primary"><br>
        </form>

        <br><hr><hr><br>

        <h4><b><i>Add New Features:</i></b><br><br></h4>
        <form method="POST" action="{{ route('admin.features.create') }}" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6">
                <label for="name-2" class="form-lable">Feature Name:</label>
                <input type="text" name="name" id="name-2" class="form-control"><br>
            </div>

            <div class="col-md-6">
                <label for="content-2" class="form-lable">Content:</label>
                <input type="text" name="content" id="content-2" class="form-control"><br>
            </div>

            <div class="col-md-6">
                <label for="image-2" class="form-lable">Icon:</label>
                <input type="file" name="icon" id="image-2" class="form-control"><br>
            </div>

            <input type="submit" value="Create" class="btn btn-primary"><br>

        </form>

        <br><hr><hr><br>

    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>