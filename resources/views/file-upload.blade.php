<!DOCTYPE html>
<html>
<head>
    <title>File Upload</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="{{'assets/css/style.css'}}" rel="stylesheet">

</head>
<body>

<div class="container mt-4">

    <h2 class="text-center">File Upload</h2>

    <form method="POST" enctype="multipart/form-data" id="upload-file" action="{{ url('store') }}"
          onsubmit="return validateFile()">
        @csrf
        <div class="row">

            <div class="col-md-12">
                <div class="form-group">
                    <label for="title">Title </label>
                    <input id="title" type="text" name="title" value="{{ old('title') }}" required>
                </div>
                <div class="form-group">
                    <label for="description">Description </label>
                    <input id="description" type="text" name="description" value="{{ old('description') }}" required>
                </div>
                <div class="form-group">
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

</body>
<script src="{{'assets/js/jquery.min.js'}}"></script>
<script>
    function validateFile() {
        let allowedExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
        let fileExtension = document.getElementById('file').value.split('.').pop().toLowerCase();
        let isValidFile = false;

        for (let index in allowedExtension) {

            if (fileExtension === allowedExtension[index]) {
                isValidFile = true;
                break;
            }
        }

        if (!isValidFile) {
            alert('Only images can be uploaded');
        }

        return isValidFile;
    }
</script>
</html>
