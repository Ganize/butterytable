<!-- Header-->
<?php include('templates/header.php'); ?>

<<<<<<< HEAD
<?php if (isset($_SESSION['username'])):?>
    <div>
        <?php 
            echo $_SESSION['username'];
    
         ?>
    </div>
=======

<?php
include 'db_connection.php';
$conn = openCon();
if ($conn) {
    echo "Connected Successfully";
}

closeCon($conn);
>>>>>>> 9c85846fd1a991b882fe50960d797fa8d93c591b

<?php else :?>
    <div>
        Hello
    </div>
<?php endif ?>


<a href="https://www.facebook.com/butterytable/"><i class="fa fa-facebook-square"></i></a>
<a href="https://www.instagram.com/butterytablebakery/"><i class="fa fa-instagram" aria-hidden="true"></i></a>

<div class="form-container">
<<<<<<< HEAD
    <form action="includes/signup.inc.php" method="post">
=======
    <form action="/butterytable/create/insert.php" method="post">
>>>>>>> 9c85846fd1a991b882fe50960d797fa8d93c591b
        <div class="form-group">
            <label for="user_name">Username</label>
            <input type="text" name="user_name" id="user_name">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="text" name="password" id="password">
        </div>
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="text" name="email" id="email">
<<<<<<< HEAD
       </div>
        <button class="btn" type="submit" name="register_user" >Save</button>
        <button class="btn" type="submit" name="login" >Login</button>
=======
        </div>
        <button class="btn" type="submit" name="register_user">Save</button>
>>>>>>> 9c85846fd1a991b882fe50960d797fa8d93c591b
    </form>
</div>

<!--Footer-->
<?php include('templates/footer.php'); ?>