<?php
class SearchResults extends Page 
{
    function __construct(){
        parent::__construct();
    }
    function getMain() : string {
        $items = '';
        $keyword = $_GET["keyword"];
        include_once "./db/db.php";
        $results = selectFilmsForSearch($keyword);
        for ($i = 0; $i < count($results); $i++) {
            $items .= '
            <div class="search-results__item">
                <a href="./create_film.php?id='.$results[$i]['film_id'].'">
                    <img class="poster-img" src="'.$results[$i]["cover"].'">
                </a>
                <div class="info-container">
                    <div class="title-rating-container">
                        <a href="./create_film.php?id='.$results[$i]['film_id'].'" class="title">'.$results[$i]["title"].'</a>
                        <div class="overall-rating">
                            <div class="star-icon_container">
                                <img class="star-icon" src="./img/star-icon.svg" alt="Star">
                            </div>
                            <div class="overall-score">
                                <span class="score">7.7</span>
                            </div>
                        </div>
                    </div>
                    <div class="release_date">'.explode("-", $results[$i]["release_date"], 2)[0].'</div>
                    <div class="writer">'.$results[$i]["director"].'</div>
                </div>';
                if(isset($_SESSION['user_id']) && $_SESSION['admin'] == 1)
                    $items .= '<button onclick="DeleteFilm(\'controller/delete_film.php?id='.$results[$i]["film_id"].'\', \''.$_GET["keyword"].'\')" class="btn-delete">Delete</button>';
                $items .= '</div>';
        }
        return 
        '<main>
            <link rel="stylesheet" href="css/search.css">
            <section class="search-results">
                <h2 class="section-name">Search results on "'.$_GET["keyword"].'"</h2>
                <div class="search-results-container">
                '.$items.'
                </div>
            </section>
        </main>';
                
    }

}
