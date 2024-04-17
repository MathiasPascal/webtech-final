<?php
session_start();

function checkLogin()
{
    if (!isset($_SESSION['bid'])) {
        header("Location: ../index.php");
        die();
    }
}


function isLoggedIn()
{
    return isset($_SESSION['bid']);
}
?>