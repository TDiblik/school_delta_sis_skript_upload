<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Basic prohlížeč fotek a videí</title>

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
    </style>
</head>
<body>
    <div class="main-container">
        <div class="main-container-inner">
            <?php
                require_once "utils.php";

                function does_not_exist() {
                    echo "<h1>Oops, při zdá se že soubor neexistuje</h1>";
                    echo "<a href=\"./index.php\" style=\"margin-left: auto;\">Zpět na seznam</a>";
                    die();
                }

                if (!isset($_GET) || !isset($_GET["file"])) {
                    does_not_exist();
                }

                $possible_file = basename($_GET["file"]);
                if (!in_array($possible_file, get_uploaded_files())) {
                    does_not_exist();
                }

                $file_path = UPLOAD_DIR . $possible_file;
                $file_type = get_file_type($file_path);
            ?>

            <?php if (strpos($file_type, "video") === 0) : ?>
                <video controls>
                    <source src="<?php echo $file_path; ?>" type="<?php echo $file_type; ?>">
                </video>
            <?php elseif (strpos($file_type, "image") === 0) : ?>
                <img src="<?php echo $file_path; ?>"  type="<?php echo $file_type; ?>" />
            <?php elseif (strpos($file_type, "audio") === 0) : ?>
                <audio controls>
                    <source src="<?php echo $file_path; ?>" type="<?php echo $file_type; ?>">
                </audio>
            <?php endif ?>
            <a href="./index.php" style="margin-left: auto;">Zpět na seznam</a>
        </div>
    </div>
</body>
</html>