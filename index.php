<?php
function autoload($class){
    include "classes/" . $class . ".php";

}
session_start();
spl_autoload_register("autoload");
$page = new Films();
$page->getPage();


