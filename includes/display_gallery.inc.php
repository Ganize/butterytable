<?php
require 'includes/db_conn.inc.php';
$count = 0;
$row_num = 0;
$sql = "SELECT * FROM bt_cakegallery";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ..gallery.php?error=sqlerror");
    exit();
} else {
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (!$row = mysqli_fetch_assoc($result)) //Fectching the data from result
    {
        echo "<p>No item in the gallery</p>";
    } else {
        while ($row = mysqli_fetch_assoc($result)) {

            if ($count == 0) {
                echo '<div class="row-'.$row_num.' gallery-row">';
            }
            echo '<div><img class="borderimg" src="http://localhost/butterytable/images/' . $row["gallery_path"] . '" width="400" height="400">';
            echo '<div class="galleryname">'.$row["gallery_name"].'</div>';
            echo '<span class="fa fa-star checked"></span>';
            echo '</div>';

            if ($count == 3) {
                echo '</div>';
                $count = 0;
                $row_num = $row_num + 1;
            } else {
                $count = $count + 1;
            }

        }
    }
}
