<?PHP
    include_once $_SERVER['DOCUMENT_ROOT']."/we-are-critic/db/db.php";
    deleteOnce("Film", "film_id", $_GET["id"]);
    define('URL', 'http://localhost/we-are-critic/');
    header('Location: '.URL.'create_search_results.php?keyword=".$_GET["keyword"]."');