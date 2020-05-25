<!-- Header-->

<?php include('../templates/header.php');?>

<div class="container">
    <div class="login-container">
        <form action="../includes/signup.inc.php" method="post">
            <div class="form-group">
                <label for="user_name">Username</label>
                <input type="text" name="user_name" id="user_name">
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="text" name="email" id="email">
           </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </div>
            <div class="form-group">
                <label for="password-repeat">Repeat Password</label>
                <input type="password" name="password-repeat" id="password">
            </div>
          
            <button class="btn" type="submit" name="register_user" >Register</button>
        </form>
    </div>
</div>
<!--Footer-->
<?php include('../templates/footer.php');?>