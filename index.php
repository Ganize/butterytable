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
                    ?>
                        <li data-target="#demo" data-slide-to="<?= $i; ?>" class="<? $actives; ?> "></li>
                    <?php $i++;
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
                    ?>
                        <div class="carousel-item <?= $actives; ?>">
                            <img src="images/<?= $row['gallery_path'] ?>" width="100%" height="670px">
                        </div>

                    <?php $i++;
                    } ?>
                </div>
            </div>
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
<div class="butterytable">
    <h2>Buttery Table</h2>
    <hr style="width: 20%; border-color: #C18281;" />
    <div class="quotes">
        <p>Hand-baked cake perfection and meticulously coated with buttercream and fondant alike</p>
        <p>We serve customsied cakes and desserts that are lower in sugar</p>
    </div>
    <a href="#" class="btn-quotes button">get a quotes</a>
</div>
<div class="posts">
    <h2>Posts</h2>
    <hr style="width: 8%; border-color: #C18281;" />

    <div class="container post-container">
        <div class="row">
            <div class="col post-col">
                <div class="post-grid">
                    <div>
                      <img src="images/cake1.jpg">
                    </div>
                    <div>
                        <h2>test</h2>
                        <hr class="bline"></hr>
                     </div>
                </div>
            </div>
           
            <div class="col post-col">
                <div class="post-grid">
                    <div>
                        <img src="images/cake2.jpg">
                    </div>
                    <div>
                        <h2>test</h2>
                        <hr class="bline"></hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>


<!--Footer-->
<?php include('templates/footer.php'); ?>
