<!-- Header-->
<?php include('templates/header.php'); ?>
<link rel="stylesheet" href="css/contact.css" type="text/css">
<link rel="stylesheet" href="css/quotation.css" type="text/css">
<link rel="stylesheet" href="css/enquiry.css" type="text/css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- <?php if (isset($_SESSION['userId'])) : ?>
    <div>
        <?php
            echo $_SESSION['userUid'];
            echo $_SESSION['userEmail'];
        ?>
    </div>

<?php endif; ?> -->

<div>
    <div class="container">
        <input type="button" class="button" id="btnEnquiry" value="Enquiry" />
        <input type="button" class="button" id="btnQuotation" value="Quotation" />
        <?php if (($_GET["pages"]) == "quotation") : ?>
            <?php include 'contact_forms/quotation_form.php'; ?>
        <?php elseif (empty($_GET["gId"])) : ?>
            <?php include 'contact_forms/enquiry_form.php'; ?>
        <?php else : ?>
            <?php include 'contact_forms/quotation_form.php'; ?>
        <?php endif; ?>
    </div>
</div>
<!--Footer-->
<?php include('templates/footer.php'); ?>