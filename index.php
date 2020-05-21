<!-- Header-->
<?php include('templates/header.php');?>


<?php
include 'db_connection.php';
=======


<a href="https://www.facebook.com/butterytable/"><i class="fa fa-facebook-square"></i></a>
<a href="https://www.instagram.com/butterytablebakery/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
>>>>>>> 393f4add8c66fa930cd30cb74c799fd00f97068b

$conn = OpenCon();

echo "Connected Successfully";

CloseCon($conn);

?>


<form action="insert.php" method="post">
    <p>
        <label for="firstName">First Name:</label>
        <input type="text" name="first_name" id="firstName">
    </p>
    <p>
        <label for="lastName">Last Name:</label>
        <input type="text" name="last_name" id="lastName">
    </p>
    <p>
        <label for="emailAddress">Email Address:</label>
        <input type="text" name="email" id="emailAddress">
    </p>
    <input type="submit" value="Submit">
</form>
<!--Footer-->
<?php include('templates/footer.php');?>

