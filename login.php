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
        <form action="/butterytable/includes/login.inc.php" method="post" id="login_form">
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

        <form action="/butterytable/includes/signup.inc.php" method="post" id="signup_form">
            <div class="form-group">
                <div>
                    <label for="user_email">Email :</label>
                </div>
                <div>
                    <input type="text" name="user_email" id="register_email" class="empty">
                     <div style="margin:0px;">
                        <span id="email_error" style="color:red;"></span>
                    </div>
                </div>
           </div>
            <div class="form-group">
                <div>
                    <label for="password">Password :</label>
                </div>
                <div>
                    <input type="password" name="password" id="new_password" class="empty">
                </div>
            </div>
            <div class="form-group">
                <div>
                    <label for="password-repeat">Confirm Password :</label>
                </div>
                <div>
                    <input type="password" name="password-repeat" id="repeat_password" class="empty">
                    <div style="margin:0px;">
                        <span class="pass-validation" color:red;"></span>
                    </div>
                </div>
            </div>
            <button class="button" type="submit" name="register_user">REGISTER</button>
        </form>
    </div>
</div>

<!--Footer-->
<?php include('templates/footer.php');?>