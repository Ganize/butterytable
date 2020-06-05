<!-- Header-->

<?php include('templates/header.php');?>


<?php if(isset($_GET['error'])): ?>
    <div>
        <?php if($_GET['error'] == "emptyfields"):?>
            <?php echo "Empty Fields"?>
        <?php endif;?>
    </div>
<?php endif; ?>
<div class="container grid-login-container">
  
    <div class="login-container">
        <p>SIGN IN</p>
        <hr class="bline">
        <form action="/butterytable/includes/login.inc.php" method="post">
            <div class="form-group">
                <div>
                     <label for="user_email">Email :</label>
                </div>
                <div>
                    <input type="text" name="user_email" id="user_email">
                </div>
            </div>
            <div class="form-group">
                <div>
                    <label for="password">Password :</label>
                </div>
                <div>
                    <input type="text" name="password" id="password">
                </div>
            </div>
            <button class="button" type="submit" name="login" >SIGN IN</button>
        </form>
        <p>
            <a href="" style="color:#696969; text-decoration: underline;">Forgot password?</a>
        </p>
    </div>

    <div class="signup-container">
         <p>CREATE A NEW ACCOUNT</p>
        <hr class="bline">

        <form action="/butterytable/includes/signup.inc.php" method="post">
            <div class="form-group">
                <div>
                    <label for="user_email">Email :</label>
                </div>
                <div>
                    <input type="email" name="user_email" id="register_email">
                </div>
           </div>
            <div class="form-group">
                <div>
                    <label for="password">Password :</label>
                </div>
                <div>
                    <input type="password" name="password" id="new_password">
                </div>
            </div>
            <div class="form-group">
                <div>
                    <label for="password-repeat">Confirm Password :</label>
                </div>
                <div>
                    <input type="password" name="password-repeat" id="repeat_password">
                </div>
            </div>
            <button class="button" type="submit" name="register_user">REGISTER</button>
        </form>
    </div>
</div>

<!--Footer-->
<?php include('templates/footer.php');?>