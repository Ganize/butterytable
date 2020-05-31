<?php


if (isset($_POST['submit'])) {
    require 'db_conn.inc.php';

    $uploads_dir = '../images';
    $gallery_name = $_POST['gallery_name'];
    $gallery_description = $_POST['gallery_description'];
    $gallery_page = "";
    if(!empty($_POST['pages'])) {
        foreach($_POST['pages'] as $page) {
            if($gallery_page == "")
            {
                $gallery_page .= $page; 
            }
            else
            {
                $gallery_page .= ','.$page; 
            }
        }
    }

    $gallery_category = "";
    if(!empty($_POST['category'])) {
        foreach($_POST['category'] as $category) {
            if($gallery_category == "")
            {
                $gallery_category .= $category; 
            }
            else
            {
                $gallery_category .= ','.$category; 
            }
        }
    }

    $tmp_name = $_FILES["filePhoto"]["tmp_name"];
    $gallery_path = basename($_FILES["filePhoto"]["name"]);

    if (empty($tmp_name) || empty($gallery_path)) {
        header("Location: ../cakegallery/addgallery.php?error=emptyfield");
        exit();
    } else {
        $sql = "INSERT INTO bt_cakegallery (gallery_name, gallery_path, category, gallery_page, gallery_description) VALUES (?,?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../account/image-form.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "sssss", $gallery_name, $gallery_path, $gallery_category, $gallery_page, $gallery_description); //Prepare statement
            mysqli_stmt_execute($stmt);
            header("Location: ../account/update-images.php?addedgallery=success");
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