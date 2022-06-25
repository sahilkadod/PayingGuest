<?php
session_Start();
session_destroy();
header("Location: index.php");
?>