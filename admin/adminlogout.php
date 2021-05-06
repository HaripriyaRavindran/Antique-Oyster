<?php

unset($_SESSION['ADMIN_LOGIN']);
unset($_SESSION['ADMIN_USERNAME']);
header('location:../index.php');
die();
?>