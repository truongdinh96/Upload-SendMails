<!DOCTYPE html>
<html>
<head>
    <title>File Upload</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="{{'assets/css/style.css'}}" rel="stylesheet">

</head>
<body>
<div class="page-wrapper bg-dark p-t-100 p-b-50">
    <div class="wrapper wrapper--w900">
        <div class="card card-6">
            <div class="card-heading">
                <h2 class="title">Upload image file</h2>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" id="upload-file" action="{{ url('store') }}"
                      onsubmit="return validateFile()">
                    @csrf
                    <div class="form-row">
                        <div class="name">Full name</div>
                        <div class="value">
                            <input class="input--style-6" id="full_name" type="text" name="full_name">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">Email address</div>
                        <div class="value">
                            <div class="input-group">
                                <input class="input--style-6" id="email" type="email" name="email" placeholder="example@email.com">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">Message</div>
                        <div class="value">
                            <div class="input-group">
                                <textarea class="textarea--style-6" id="message" name="message" placeholder="Message sent to the employer"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="name">Upload File</div>
                        <div class="value">
                            <div class="input-group js-input-file">
                                <input class="input-file" type="file" name="file" id="file">
                                <label class="label--file" for="file">Choose file</label>
                                <span class="input-file__info">No file chosen</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn--radius-2 btn--blue-2" type="submit" id="submit">Send Email</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Jquery JS-->
<script src={{"assets/js/jquery.min.js"}}></script>
<!-- Main JS-->
<script src={{"assets/js/global.js"}}></script>
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

</body>
</html>
