<?php
class Film extends Page {
    function __construct(){
        parent::__construct();
    }

    function getMain() : string {
        include_once './db/db.php';
  
        $id =  $_GET["id"];
        $table = "Film";
        $params = array("film_id" => $id);

        $selectedFilm = selectOne($table, $params);
        $genres = selectAll("Film_Genre", ["film_id" => $id]);

        return 
        '
        <main>
        <section class="film_header">
            <div class="title_short-info">
                <h1 class="film-title">'.$selectedFilm["title"].'</h1>
                <div class="short-info">
                    <ul>
                        <li>'.$selectedFilm["release_date"].'</li>
                        <li>'.$selectedFilm["age_rating"].'</li>
                        <li>'.$selectedFilm["duration"].'</li>
                    </ul>
                </div>
            </div>
            <div class="rating-zone">
                <div class="rating_container">
                    <div class="category-name">Overall rating</div>
                    <a href="#" class="overall-rating">
                        <div class="star-icon_container">
                            <img src="./img/star-icon.svg" alt="Star">
                        </div>
                        <div class="overall-rating_info">
                            <div class="overall-score">
                                <span class="score">7.7</span>
                                <span class="max-score">/10</span>
                            </div>
                            <div class="votes-number">1300</div>
                        </div>
                    </a>
        
                </div>
                <div class="rating_container">
                    <div class="category-name">Your rating</div>
                    <a href="#" class="your-rating">
                        <div class="star-icon_container">
                            <img src="./img/blue-star-icon.svg" alt="Star">
                        </div>
                        <div class="your-rating_info">
                            <div class="your-score">
                                <span class="score">8</span>
                                <span class="max-score">/10</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </section>
        <section class="film_content">
            <div class="content-zone">
        
                <div class="film-cover">
                    <img  src="'.$selectedFilm["cover"].'" alt="Doctor Strange">
                </div>
        
                <div class="film-trailer">
                    <iframe width="700" height="420" src="'.$selectedFilm["trailer"].'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>                
                    </iframe>   
                </div>
            </div>
        </section>
        <section class="film_genres">
            <div class="genres-container">
                '.$this->getGenresHTML($genres).'
            </div>
            <div class="description-container">
                <p class="film-description">
                '.$selectedFilm["description"].'
                </p>
            </div>
            <div class="directors-container">
                <span class="info-name">Director</span>
                <a href="#" class="info-name_value director">
                '.$selectedFilm["director"].'
                </a>
            </div>
            <div class="taglines-container">
                <a class="info-name" href="#">Taglines</a>
                <span href="#" class="info-name_value tagine">
                '.$selectedFilm["tagline"].'
                </span>
            </div>
        </section>
        
        </main>
        ';
                
    }

    function getGenresHTML($genres) : string{
        include_once './db/db.php';

        $genres_html = "";

        foreach ($genres as $genre) {
            
            $genres_html .= '
            <a href="#" class="film_genre">
                '.$genre["genre_name"].'
            </a>
            ';
            
        }

        return $genres_html;
    }
}
