<?php
session_start();
include "database.php";
//include "header.php";

if (isset($_COOKIE["user_login"]) && isset($_COOKIE["user_password"])) {
        $_SESSION["name"]= $_COOKIE["user_login"];
	}  

if ($_SERVER['REQUEST_METHOD']=='POST') {
        
    if (!isset($_SESSION["name"])) 
    { 
        header('Location: logsign.php');
    } 
        
}

else
{

?>

<html>

<?php //include "header.php";
echo " WElcome " . $_SESSION["name"] . ".<br>";  ?>
<a href="cart.php">cart</a>
<a href="logout.php">LOGOUT</a>
<body>
<?php include "footer.php";?>
</body>
</html>
<?php
}
?>