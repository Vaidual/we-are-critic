<?php
class Films extends Page 
{
    function __construct(){
        parent::__construct();
    }
    function getMain() : string {
        include_once './db/db.php';
        $new_films_query = "select * from Film order by release_date desc limit";
        $most_rated_query = "select * from Film order by age_rating limit";

        return 
        '<main>
            <div class="blockquote-wrapper">
                <div class="blockquote">
                    <h1>The moment we cry in a film is not when things are sad but when they turn out to be more beautiful than we expected them to be</h1>
                    <h4>— &nbsp;Alain de Botton</h4>
                </div>
            </div>
            <section class="slider-section">
                <div class="header-container">
                    <div class="title-container">
                        <h2 class="title-text">New Titles</h2>
                    </div>
                </div>
                <div class="new-titles__slider">
                    '.$this->getSlider($new_films_query, 10).'
                </div>
                <div class="new-titles__buttons-container"></div>
            </section>
            <section class="slider-section">
                <div class="header-container">
                    <div class="title-container">
                        <h2 class="title-text">Most Rated</h2>
                    </div>
                </div>
                <div class="most-rated__slider">
                    '.$this->getSlider($most_rated_query, 6).'
                </div>
                <div class="most-rated__buttons-container"></div>
            </section>
        </main>';
          
    }

    function getSlider($query, $films_count) : string
    {
        $films = ExecuteQuery($query." ".$films_count);

        $items = "";
        foreach ($films as $film){
            $items .= 
            '<div class="item">
                <a class="poster-container" href="./create_film.php?id='.$film['film_id'].'">
                    <img class="poster-img" src="'.$film["cover"].'" alt="Doctor Strange cover">
                </a>
                <div class="raiting">
                    <span>
                        <img class="start-icon" src="./img/star-icon.svg" alt="star icon">
                        7.6
                    </span>
                </div>
                <a class="caption" href="./film.php?id='.$film['film_id'].'">'.$film['title'].'</a>
            </div>';
        }
        return $items;
    }
}
