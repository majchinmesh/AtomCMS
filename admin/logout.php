<?php

// starting a session
session_start();

// deleting the user from the session
unset($_SESSION['username']);

// to delete all the keys from the session
//session_destroy();

header('Location: login.php'); // redirect to login

?>