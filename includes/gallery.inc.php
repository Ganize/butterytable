<?php

$uploads_dir = '../images';
if (isset($_POST['submit'])) {
    require 'db_conn.inc.php';

    $tmp_name = $_FILES["imagefile"]["tmp_name"];
    $gallery_path = basename($_FILES["imagefile"]["name"]);

    if (empty($tmp_name) || empty($gallery_path)) {
        header("Location: ../cakegallery/addgallery.php?error=emptyfield");
        exit();
    } else {
        $sql = "INSERT INTO bt_cakegallery (gallery_path) VALUES (?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../cakegallery/addgallery.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $gallery_path); //Prepare statement
            mysqli_stmt_execute($stmt);
            header("Location: ../cakegallery/addgallery.php?addedgallery=success");
            move_uploaded_file($tmp_name, "$uploads_dir/$gallery_path");
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else if(isset($_POST['update'])) {

}

else {
    header("Location: ../cakegallery/addgallery.php");
    exit();
}
?>