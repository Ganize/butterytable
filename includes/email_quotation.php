<?php

require 'db_conn.inc.php';

$sql =  "SELECT * FROM bt_quotation";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
	header("Location: contact-us.php?error=sqlerror");
	exit();
} else {
	mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($result)) //Fectching the data from result
    {	
        $quotation_id = $row["id"];
    }
    
    $enquiry_subject = $quotation_id;
    mysqli_stmt_close($stmt);
    mysqli_close($conn);	
}
