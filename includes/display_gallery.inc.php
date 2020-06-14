<?php
require 'db_conn.inc.php';
$count = 0;
$row_num = 0;
$test = 0;


$start_limit = 0;

if(!empty($_POST["start_limit"]))
{
    $start_limit = $_POST["start_limit"];
 
}

$sql = "SELECT * FROM bt_cakegallery LIMIT ?, 3";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ..gallery.php?error=sqlerror");
    exit();
} else {
    mysqli_stmt_bind_param($stmt, "i", $start_limit);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    while ($row = mysqli_fetch_assoc($result)) {
        $test = 1;
        if (mysqli_num_rows($result) == 0) {
            echo "<p style='text-align:center;'>No item in the gallery</p>";
        } else {
            if ($count == 0) {
                echo '<div class="row-' . $row_num . ' gallery-row gallerycontainer">';
            }
            echo '<div><a href="' . $row["insta_url"] . '" ><img id="borderimg" src="https://butterytablebakery.com/images/' . $row["gallery_path"] . '" width="400" height="400">';
            echo '</a><div>';
            echo '<span class="galleryname">' . $row["gallery_name"] . '</span>';
            echo '<br />';
            if (isset($_SESSION['userUid'])) {
                $sql1 =  "SELECT * FROM bt_wishlist WHERE user_id = ?  && gallery_id = ?";
                $stmt1 = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt1, $sql1)) {
                    //header("Location: contact-us.php?error=sqlerror");
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt1, "ii", $_SESSION['userUid'], $row["gallery_id"]); //Prepare statement
                    mysqli_stmt_execute($stmt1);
                    mysqli_stmt_store_result($stmt1);

                    $resultCheck = mysqli_stmt_num_rows($stmt1); //Check if there is any row
                    if ($resultCheck > 0) {
                        echo '<span class="fa fa-heart checked" name="' . $row["gallery_id"] . '" id="menu_' . $row["gallery_id"] . '" ></span> ';
                    } else {
                        echo '<span class="fa fa-heart" name="' . $row["gallery_id"] . '" id="menu_' . $row["gallery_id"] . '" ></span> ';
                    }
                }
            }
            echo '</div>';
            echo '</div>';

            if ($count == 2) {
                echo '</div>';
                $count = 0;
                $row_num = $row_num + 1;
            
            } else {
                $count = $count + 1;

            }
        }


    }    
}
