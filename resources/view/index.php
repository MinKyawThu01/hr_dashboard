<?php 
// var_dump($_SERVER);
if (!isset($_SESSION['authenticated_user'])) {
    echo "<script> location.href = '/login' </script>";
}
?>

<h1>This is index page.</h1>