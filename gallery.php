<!-- Header-->
<?php include('templates/header.php'); ?>
<link rel="stylesheet" href="../css/gallery.css" type="text/css">

<h3>Gallery</h3>
<hr class="bline">
</hr>
<div class="iconphotos">
    <a href="http://www.instagram.com/butterytablebakery"><img src="../images/icon/instagram_gallery.png" width="35px" height="35px"></a>
    <a href="https://www.facebook.com/butterytable"><img src="../images/icon/facebook_gallery.png" width="35px" height="35px"></a>
    <a href="https://sg.carousell.com/butterytablebakery/"><img src="../images/icon/carousell.png" width="50px" height="50px"></a>
</div>

<table width="86" border="0" align="center">
    <?php
    require 'includes/db_conn.inc.php';
    $sql = "SELECT * FROM bt_cakegallery";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../login/login.php?error=sqlerror");
        exit();
    } else {
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $count = 0;
        while ($row = $result->fetch_assoc()) {
            if ($count % 4 == 0)
                echo '<tr>';
            echo "<td class='std_success_td'><img id='borderimg' src='../images/{$row['gallery_path']}' /></td>";
            if ($count % 4 == 3)
                echo '</tr>';
            $count++;
        }
    }
    ?>
</table>
<?php include('templates/footer.php'); ?>