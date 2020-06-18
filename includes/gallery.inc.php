<?php
if (isset($_POST['submit'])) {
    require 'db_conn.inc.php';

    $uploads_dir = 'https://butterytablebakery.com/images';
    $gallery_name = $_POST['gallery_name'];
    $gallery_description = $_POST['gallery_description'];
    $gallery_page = "";
    $quotation_category = $_POST['quotation-category'];
    $instalink = $_POST['instalink'];


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
    $gallery_id = $_GET["gallery_id"];

    if (empty($gallery_name) ||  empty($gallery_page) || empty($gallery_category)) {
        header("Location: ../account/image-form.php?gallery_id=".$gallery_id."&error=emptyfield");
        exit();
    } 

    else {
        if(empty($gallery_id))
        {
           $sql = "INSERT INTO bt_cakegallery (gallery_name, gallery_path, gallerycategory, insta_url, category, gallery_page, gallery_description) VALUES (?,?,?,?,?,?,?);";
        }
        else
        {
            if(empty($tmp_name))
            {
                $sql =  "UPDATE bt_cakegallery SET gallery_name = ?, gallerycategory = ?, insta_url = ?,  category = ?, gallery_page = ?, gallery_description = ? WHERE gallery_id =?;";
            }
            else
            {
                $sql =  "UPDATE bt_cakegallery SET gallery_name = ?, gallery_path = ?, gallerycategory = ?, insta_url = ?, category = ?, gallery_page = ?, gallery_description = ? WHERE gallery_id =?;";
            }
        }
   
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../account/image-form.php?error=sqlerror");
            exit();
        } else {
            if(empty($gallery_id))
            {
                mysqli_stmt_bind_param($stmt, "sssssss", $gallery_name, $gallery_path, $quotation_category, $instalink, $gallery_category, $gallery_page, $gallery_description); //Prepare statement
            }
            else
            {
                if(empty($tmp_name))
                {
                    mysqli_stmt_bind_param($stmt, "ssssssi", $gallery_name, $quotation_category, $instalink, $gallery_category, $gallery_page, $gallery_description, $gallery_id); //Prepare statement
                }
                else
                {
                    mysqli_stmt_bind_param($stmt, "sssssssi", $gallery_name, $gallery_path, $quotation_category, $instalink, $gallery_category, $gallery_page, $gallery_description, $gallery_id); //Prepare statement
                }

            }
            mysqli_stmt_execute($stmt);
            move_uploaded_file($tmp_name, "$uploads_dir/$gallery_path");
            header("Location: ../account/update-images.php?addedgallery=success");
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

else {
    header("Location: ../cakegallery/addgallery.php");
    exit();
}
?>