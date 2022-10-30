<?php
function autoload($class){
    include "classes/" . $class . ".php";

}
session_start();
spl_autoload_register("autoload");
include_once "./controller/authorization.php";
$page = new Login('login');
$page->getPage();