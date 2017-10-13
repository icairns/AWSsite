
<?php
include("../Template/CheckSession.php");

session_destroy();
header('Location: ../index.php');
exit;
?>