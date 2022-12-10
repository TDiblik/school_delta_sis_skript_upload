<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Uploader a basic prohlížeč</title>

    <style>
        .main-container {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
        }

        .main-container-inner {
            width: 80%;
            display: flex;
            flex-direction: column;
            margin-top: 20%;
        }

        .upload-form {
            border-bottom: 2px solid darkblue;
            padding-bottom: 10px;
            margin-bottom: 10px;
        }

        .submit-button-container {
            display: flex;
        }

        .submit-button-container > input[type="submit"] {
            margin-left: auto;
        }
        
    </style>
</head>
<body>
    <div class="main-container">
        <div class="main-container-inner">
            <form action="upload_api.php" method="post" enctype="multipart/form-data" class="upload-form">
                <div>
                    <label for="uploaded_file" class="form-label">Select file to upload:</label>
                    <?php require_once "constants.php" ?>
                    <input type="file" name="uploaded_file" id="uploaded_file" class="form-control" accept="<?php echo implode(", ", ALLOWED_FILE_TYPES) ?>">
                </div>
                <div class="submit-button-container">
                    <input type="submit" value="Upload file" name="submit" class="form-control mt-2">
                </div>
            </form>
            <div class="uploaded-files">
                <h3>Click to open uploaded files: </h3>
                <ul>
                    <?php
                        require_once "utils.php";

                        $files = get_uploaded_files();
                        foreach ($files as $file) {
                            echo "<li><a href=\"./show_file.php?file=$file\">$file</a></li>";
                        }
                    ?>
                <ul>
            </div>
        </div>
    </div>
</body>
</html>