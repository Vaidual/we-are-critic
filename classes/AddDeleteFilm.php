<?php
class AddDeleteFilm extends Page {
    function __construct(){
        parent::__construct();
    }

    function getMain() : string {
             "./db/db.php";
        $genres = selectAll("Genre");
        $options_list = '';
        foreach ($genres as $genre) {
            $options_list .= '
            <option value="'.$genre['genre_name'].'">'.$genre['genre_name'].'</option>
            ';
        }
        return 
        
        '<main>
            <div class="add-container">
                <form method="POST" action="./create_adddeletefilm.php" enctype="multipart/form-data">
                    <div class="section-name">
                        <h2>Add Film</h2>
                    </div>
                    <div class="add-info-fields">
                        <div class="add-field-container">
                            <p class="add-field-text">Title</p>
                            <div>
                                <input class="add-field-input" type="text" name="title">
                            </div>
                        </div>
                    </div>
                    <div class="add-info-fields">
                        <div class="add-field-container genres-container">
                            <p class="add-field-text">Genres</p>
                            <select name="genres[]" multiple>'.$options_list.'
                            </select>
                        </div>
                    </div>
                    <div class="add-info-fields">
                        <div class="add-field-container">
                            <p class="add-field-text">Release Date</p>
                            <div>
                                <input type="date" name="release-date" value="2022-06-15" min="1980-01-01" max="2030-12-31">
                            </div>
                        </div>
                    </div>
                    <div class="add-info-fields">
                        <div class="add-field-container">
                            <p class="add-field-text">Duration</p>
                            <div>
                                <input class="add-field-input" type="text" name="duration">
                            </div>
                        </div>
                    </div>
                    <div class="add-info-fields">
                        <div class="add-field-container">
                            <p class="add-field-text">Tagline</p>
                            <div>
                                <input class="add-field-input" type="text" name="tagline">
                            </div>
                        </div>
                    </div>
                    <div class="add-info-fields">
                        <div class="add-field-container">
                            <p class="add-field-text">Director</p>
                            <div>
                                <input class="add-field-input" type="text" name="director">
                            </div>
                        </div>
                    </div>
                    <div class="add-info-fields">
                        <div class="add-field-container">
                            <p class="add-field-text">Age Rating</p>
                            <div>
                                <input class="add-field-input" type="text" name="age-rating">
                            </div>
                        </div>
                    </div>
                    <div class="add-info-fields">
                        <div class="add-field-container">
                            <p class="add-field-text">Cover</p>
                            <p>
                                <input class="film-cover-input" type="file" accept="image/jpeg, image/png"/ name="cover">
                            </p>
                        </div>
                    </div>
                    <div class="add-info-fields">
                        <div class="add-field-container">
                            <p class="add-field-text">Description</p>
                            <div>
                                <textarea class="textarea-description" name="description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="add-info-fields">
                        <div class="add-field-container">
                            <p class="add-field-text">Trailer(Link)</p>
                            <div>
                                <input class="add-field-input" type="text" name="trailer">
                            </div>
                        </div>
                    </div>
                    <div class="add-film-container">
                        <div class="add-button-container">
                            <input name="add-film-button" class="add-film-button" type="submit" value="Submit"></input>
                        </div>
                    </div>
                </form>
            </div>

        </main>';    
    }
}
