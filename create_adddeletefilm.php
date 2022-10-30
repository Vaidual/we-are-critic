<?php
function autoload($class){
    include "classes/" . $class . ".php";

}
session_start();
spl_autoload_register("autoload");
include_once "./controller/add_film.php";
$page = new AddDeleteFilm();
$page->getPage();