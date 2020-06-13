<?php
	if (isset($_POST['btn-quotation'])) {
		//require will emit a fatal error ( E_COMPILE_ERROR ) and halt the script
		require 'db_conn.inc.php';

		$quotation_name = $_POST['quotation-name'];
		$quotation_email = $_POST['quotation-email'];
		$quotation_contact = $_POST['quotation-contact'];
		$quotation_size = $_POST['quotation-size'];
		$quotation_date_of_delivery = $_POST['quotation-date'];

		$quotation_category = "";
		$quotation_menu = "";
		$quotation_flavour = "";

		$quotation_design = $_POST['quotation-design'];
		$quotation_collection = $_POST['quotation-collection'];
		$quotation_comments = $_POST['quotation-comments'];

	

		$quotation_wishlist = "";


		if(empty($quotation_name) || empty($quotation_email) || empty($quotation_contact) || empty($quotation_size)  || empty($quotation_design) ||  empty($quotation_collection) ) //Error when Empty Field
		{

			header("Location: ../contact-us.php?error=emptyfield1");
			exit();
		}
		else if(!filter_var($quotation_email, FILTER_VALIDATE_EMAIL)) //Error when not email
		{
			header("Location: ../contact-us.php?error=invalidemail");
			exit();
		}
		else if(!is_numeric($quotation_contact)) //Error when not email
		{
			header("Location: ../contact-us.php?error=invalidcontact");
			exit();
		}
		else
		{
			if(!empty($_POST['quotation-option']))
			{
				if($_POST['quotation-option'] == "wishlist")
				{
					if( empty($_POST['quotation-wishlist']))
					{
						header("Location: ../contact-us.php?error=emptyfield2");
						exit();
					}
					else
					{
						$quotation_wishlist = $_POST['quotation-wishlist'];
					}

					$sql = "INSERT INTO bt_quotation (quotation_name, quotation_email, quotation_contact, quotation_size, quotation_wishlist, quotation_design, quotation_collection, quotation_comments, quotation_date_of_delivery, quotation_datetime ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
						echo "helo1";
				}
				else
				{
					if( empty($_POST['quotation-category']) || empty($_POST['quotation-menu']) || empty($_POST['quotation-flavour']) )
					{
						header("Location: ../contact-us.php?error=emptyfield3");
						exit();
					}
					else
					{
						$quotation_category = $_POST['quotation-category'];
						$quotation_menu = $_POST['quotation-menu'];
						$quotation_flavour = $_POST['quotation-flavour'];
					}
						echo "helo2";

					$sql = "INSERT INTO bt_quotation (quotation_name, quotation_email, quotation_contact, quotation_size, quotation_category, quotation_menu, quotation_flavour, quotation_design, quotation_collection, quotation_comments, quotation_date_of_delivery, quotation_datetime ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)" ;
				}
				
			}
			else
			{
				if( empty($_POST['quotation-category']) || empty($_POST['quotation-menu']) || empty($_POST['quotation-flavour']) )
				{
					header("Location: ../contact-us.php?error=emptyfield3");
					exit();
				}
				else
				{
					$quotation_category = $_POST['quotation-category'];
					$quotation_menu = $_POST['quotation-menu'];
					$quotation_flavour = $_POST['quotation-flavour'];
				}
				echo "helo3";
				$sql = "INSERT INTO bt_quotation (quotation_name, quotation_email, quotation_contact, quotation_size, quotation_category, quotation_menu, quotation_flavour, quotation_design, quotation_collection, quotation_comments, quotation_date_of_delivery, quotation_datetime ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
			}

			$stmt = mysqli_stmt_init($conn);

			if(!mysqli_stmt_prepare($stmt, $sql))
			{
					header("Location: ../contact-us.php?error=sqlerror");

				exit();
			}
			else
			{	
				date_default_timezone_set('Asia/Singapore');
				$date = date('Y-m-d H:i:s');

				$date_delivery = date('Y-m-d H:i:s', strtotime($quotation_date_of_delivery));

				if($_POST['quotation-option'] == "wishlist" && !empty($_POST['quotation-option']))
				{
					mysqli_stmt_bind_param($stmt, "ssiissssss", $quotation_name, $quotation_email, $quotation_contact, $quotation_size,$quotation_wishlist, $quotation_design, $quotation_collection, $quotation_comments, $date_delivery, $date); //Prepare statement
				}
				else
				{
					mysqli_stmt_bind_param($stmt, "ssiissssssss", $quotation_name, $quotation_email, $quotation_contact, $quotation_size, $quotation_category,$quotation_menu, $quotation_flavour, $quotation_design, $quotation_collection, $quotation_comments, $date_delivery, $date); //Prepare statement
				}
				mysqli_stmt_execute($stmt);
				
				mysqli_stmt_close($stmt);
				mysqli_close($conn);
				header("Location: ../contact-us.php?result=success");
				exit();
			}
		}
	}
	else
	{
		header("Location: ../index.php");
		exit();
	}
?>