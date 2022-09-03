<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap 5 Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container-fluid p-5 bg-primary text-white text-center">
        <h1>Upload File with Laravel 9 + MySQL</h1>
    </div>
    <div class="container mt-5">
        <div class="row">
            <form action="{{ url('/' . $act) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" class="form-control" name="id"
                    value="{{ isset($data->id) ? $data->id : '' }}">
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" placeholder="Enter name" name="name"
                        value="{{ isset($data->name) ? $data->name : '' }}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <input type="text" class="form-control" placeholder="Enter Description" name="description"
                        value="{{ isset($data->description) ? $data->description : '' }}">
                </div>
                <div class="mb-3">
                    <label for="file" class="form-label">Upload File:</label>
                    <input type="file" class="form-control" placeholder="Upload file" name="file">
                    <input type="hidden" class="form-control" name="file_old"
                        value="{{ isset($data->file) ? $data->file : '' }}">
                </div>
                <a href="{{ url('/') }}">
                    <button type="button" class="btn btn-danger">Cancel</button>
                </a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>



</body>

</html>
