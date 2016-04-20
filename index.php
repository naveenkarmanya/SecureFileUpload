<?php
if (isset($_FILES['images'])) {
    $errors = array();
    $allowed_extension = array('png', 'jpg', 'jpeg', 'gif');
    $files = $_FILES['images'];
    print_r($files);
    for ($x = 0; $x < count($files['name']); $x++) {
    $file_name = $_FILES['images']['name'][$x];
    $file_set = strtolower(end(explode('.', $file_name)));
    $file_size = $_FILES['images']['size'][$x];
    $file_tmp_name = $_FILES['images']['tmp_name'][$x];

    if (in_array($file_set, $allowed_extension) == false)
            {
        $errors[] = "File Extension is Not Exist!";
    }
    if ($file_size > 2099752) {
        $errors []= "FIle size should be under 2MB";
    }
    if (empty($errors)) {
        if (move_uploaded_file($file_tmp_name, 'images/' . $file_name))
            ;
        echo "file Uploaded";
    }
    else {
        foreach ($errors as $error) {
            print_r($error);
        }
    }
}
}
?>

<html>
    <head>
        <title>Secure File Uploads</title>
    </head>
    <body>
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="images[]" multiple><br><br>
            <input type="submit" value="upload">
        </form>
    </body>
</html>