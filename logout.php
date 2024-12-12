<?php
session_start();
session_unset();
session_destroy();
header("Location: index.php"); // Redirect to the home page after logging out
exit();
?>
