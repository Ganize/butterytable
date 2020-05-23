<?php
include('../db_connection.php');

$uploads_dir = '../images';
// initialize variables
$gallery_name = "";
$gallery_path = "";
$category = "";

if (isset($_POST['submit'])) {
    $tmp_name = $_FILES["imagefile"]["tmp_name"];
    $gallery_name = basename($_FILES["imagefile"]["name"]);
    move_uploaded_file($tmp_name, "$uploads_dir/$gallery_name");
    echo "success";

    // mysqli_query(openCon(), "INSERT INTO user (user_name, password, email) VALUES ('$user_name', '$password', '$email')");
    // header("Location: /butterytable/index.php ");
}
?>