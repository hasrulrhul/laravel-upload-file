<!DOCTYPE html>
<html lang="en">

<head>
    <title>Example Upload File with Laravel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container-fluid p-5 bg-primary text-white text-center">
        <h1>Upload File with Laravel 9 + MySQL</h1>
    </div>
    <div class="container mt-2">
        <div class="container mt-3">
            <a href="{{ url('create') }}">
                <button type="button" class="btn btn-primary">Upload</button>
            </a>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>File</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($data) > 0)
                        @foreach ($data as $key => $v)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $v->name }}</td>
                                <td>{{ $v->description }}</td>
                                <td>
                                    <img src="{{ url('files/todo/' . $v->file) }}" width="70" height="50"
                                        alt></img>
                                </td>
                                <td>
                                    <a href="{{ url('/edit/' . $v->id) }}">edit</a>
                                    <a href="{{ url('/delete/' . $v->id) }}">delete</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5">Data not found</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>



</body>

</html>
