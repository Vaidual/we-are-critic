<?php
session_start();


unset($_SESSION['user_id']);
unset($_SESSION['username']);
unset($_SESSION['admin'] );

define('URL', 'http://localhost/we-are-critic/');
header('Location: '.URL.'index.php');