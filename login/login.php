<!-- Header-->

<?php include('../templates/header.php');?>


<?php if(isset($_GET['error'])): ?>
    <div>
        <?php if($_GET['error'] == "emptyfields"):?>
            <?php echo "Empty Fields"?>
        <?php endif;?>
    </div>
<?php endif; ?>
<div class="container">
    <div class="login-container">
        <form action="../includes/login.inc.php" method="post">
            <div class="form-group">
                <label for="user_name">Username</label>
                <input type="text" name="user_name" id="user_name">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" name="password" id="password">
            </div>
            <button class="btn" type="submit" name="login" >Login</button>
        </form>
    </div>
</div>

<!--Footer-->
<?php include('../templates/footer.php');?>