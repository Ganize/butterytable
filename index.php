<!-- Header-->
<?php include('templates/header.php'); ?>
<link rel="stylesheet" href="css/index.css" type="text/css">
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
}
?>


<div class="container-fluid" style="background-color:#F7ECEC;">
    <div class="row justify-content-center mb-2">
        <div class="col-lg-10">
            <div id="demo" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ul class="carousel-indicators">
                    <?php
                    $i = 0;
                    foreach ($result as $row) {
                        $actives = '';
                        if ($i == 0) {
                            $actives = 'active';
                        }

                        if (!empty($row['category']) || !is_null($row['category'])) {
                            $stringresult = explode(",", $row['category']);
                            foreach ($stringresult as $j) {
                                if ($j == 'slideshow') {
                    ?>
                                    <li data-target="#demo" data-slide-to="" class="<? $actives; ?> "></li>
                    <?php
                                    $i++;
                                }
                            }
                        }
                    } ?>
                </ul>

                <!-- The slideshow -->
                <div class="carousel-inner">
                    <?php
                    $i = 0;
                    foreach ($result as $row) {
                        $actives = '';

                        if ($i == 0) {
                            $actives = 'active';
                        }

                        //If empty
                        if (!empty($row['category']) || !is_null($row['category'])) {
                            $stringresult = explode(",",  $row['category']);

                            foreach ($stringresult as $j) {
                                if ($j == 'slideshow') {
                    ?>
                                    <div class="carousel-item <?= $actives; ?>">
                                        <img class="caroimg" src="images/<?= $row['gallery_path'] ?>" width="70%">
                                    </div>
                    <?php
                                    $i++;
                                }
                            }
                        }
                    }

                    ?>
                </div>
            </div>
            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </div>
</div>
<div class="butterytable">
    <h2>Buttery Table</h2>
    <hr style="width: 20%; border-color: #C18281;" />
    <div class="quotes">
        <p>Hand-baked cake perfection and meticulously coated with buttercream and fondant alike</p>
        <p>We serve customised cakes and desserts that are lower in sugar</p>
    </div>
    <a style="text-decoration: none;" href="<?php echo $link; ?>contact-us.php?pages=quotation" class="btn-quotes button">get a quote</a>
</div>
<div class="posts">
    <?php

    $sql1 = "SELECT * FROM (
        SELECT * FROM bt_cakegallery ORDER BY gallery_id DESC LIMIT 2
    ) sub
    ORDER BY gallery_id DESC";
    $stmt1 = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt1, $sql1)) {
        header("Location: ../login/login.php?error=sqlerror");
        exit();
    } else {
        mysqli_stmt_execute($stmt1);
        $result1 = mysqli_stmt_get_result($stmt1);
    }
    ?>
    <h2>Latest Arrivals</h2>
    <hr style="width: 8%; border-color: #C18281;" />

    <?php
    foreach ($result1 as $row1) {
        if (!empty($row1['gallery_name'])) {
            echo '<h2>' . $row1['gallery_name'] . '</h2>';
            echo '<img style="width:400px; height:400px" src="images/' . $row1['gallery_path'] . '">';
        }
    } ?>

</div>

<!--Footer-->
<?php include('templates/footer.php'); ?>