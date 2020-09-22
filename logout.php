<!DOCTYPE HTML>
<HTML>
<head>
</head>
<body>
<?php
session_start();
echo "<script>alert(Goodbye ".$_SESSION['username']."See you soon!);</script>";
session_destroy();
header("Location:index.php");
?>
</body>
</HTML>