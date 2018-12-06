<!-- Header -->
<?php include_once("header.php"); ?>
<!-- //Header -->


<!-- Form process -->
<?php include_once("account/accountprocess.php"); ?>
<!-- End process -->
		
		
		<?php
		if (!isset($_SESSION["current_user"]))
			include_once("account/log.php");
		else include_once("account/profile.php");
		?> 

<!-- Footer -->
<?php include_once("footer.php"); ?>
<!-- End Footer -->