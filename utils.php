<?php
    require_once "constants.php";

    function get_uploaded_files() {
        return array_diff(scandir(UPLOAD_DIR), array(".", "..", ".gitkeep"));
    }
    
    function get_file_type($file_path) {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $file_type = finfo_file($finfo, $file_path);
        finfo_close($finfo);
        return $file_type;
    }
?>