<!-- Header-->
<?php include('templates/header.php');?>
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

    while ($row = $result->fetch_assoc()) 
    {
        echo '<img src="../images/'.$row['gallery_path'].'" alt="" width="500" height="600">';
    }
}
?>

<link rel="stylesheet" href="css/gallery.css" type="text/css">

<?php include('templates/footer.php'); ?>