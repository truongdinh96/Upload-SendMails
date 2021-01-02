<!DOCTYPE html>
<html>
<head>
    <title>File Upload</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


</head>
<body>

<div class="container mt-4">

    <h2 class="text-center">File Upload</h2>

    <form method="POST" enctype="multipart/form-data" id="upload-file" action="{{ url('store') }}" >
        @csrf
        <div class="row">

            <div class="col-md-12">
                <div class="form-group">
                    <label for="title">Title</label><input id="title" type="text" name="title" value="{{ old('title') }}" required>
                    <label for="description">Description</label><input id="description" type="text" name="description" value="{{ old('description') }}" required>
                    <input type="file" name="file" placeholder="Choose file" id="file">
                    @error('file')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-12">
                <button type="submit" class="btn btn-primary" id="submit">Submit</button>
            </div>
        </div>
    </form>
</div>

</div>
</body>
</html>
