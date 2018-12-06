<?php
session_start();
if (isset($_SESSION["loged"])) {
	unset($_SESSION["loged"]);
	unset($_SESSION["current_user"]);
}

header('Location: index.php');