<!-- Header-->
<?php include('templates/header.php'); ?>


<?php
include 'db_connection.php';
$conn = openCon();
if ($conn) {
    echo "Connected Successfully";
}

closeCon($conn);

?>


<a href="https://www.facebook.com/butterytable/"><i class="fa fa-facebook-square"></i></a>
<a href="https://www.instagram.com/butterytablebakery/"><i class="fa fa-instagram" aria-hidden="true"></i></a>

<div class="form-container">
    <form action="/butterytable/create/insert.php" method="post">
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
        </div>
        <button class="btn" type="submit" name="register_user">Save</button>
    </form>
</div>

<!--Footer-->
<?php include('templates/footer.php'); ?>