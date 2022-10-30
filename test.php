<!doctype html>
<html lang = 'en'>
    <?php include "view/head.php" ?>
    <body>
        <header class="header">
            <nav class="menu">
                <ul class="menu__list">
                    <li>
                        <a href="./index.php">Home</a>
                    </li>
                    <li>
                        <a href="#">Films</a>
                        <ul class="sub_films__menu">
                            <li><a href="#">New films</a></li>
                            <li><a href="#">Movies this year</a></li>
                            <li><a href="#">Movies of all time</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">News</a>
                    </li> 
                </ul>
                <div class="search">
                    <form method="POST" class="search-form">
                        <input name="keyword" id="search-result" class="header-search-bar" type="text" placeholder="Искать здесь...">
                        <a class="search__btn" type="submit">
                            <img id="search__image" src="./img/search_icon.png" alt="Поиск">
                        </a>
                    </form>
                </div>
        
        <div class="login__btns">
            <a class="sign_in__btn" href="./create_login.php">Sign in</a>
        </div>
        
            </nav>
        </header>
        <main>
            <div class="galery-container">
                <div class="film-title"></div>
                <div class="photos-container">
                    <div class="photo-row">
                        <a href="./img/Doctor_Strange_cover.jpg" data-lightbox="film-img"><div class="film-img" style="background-image: url(./img/Doctor_Strange_cover.jpg);"></div></a>
                        <a href="./img/Doctor_Strange_cover.jpg" data-lightbox="film-img"><div class="film-img" style="background-image: url(./img/Doctor_Strange_cover.jpg);"></div></a>
                        <a href="./img/Doctor_Strange_cover.jpg" data-lightbox="film-img"><div class="film-img" style="background-image: url(./img/Doctor_Strange_cover.jpg);"></div></a>
                        <a href="./img/Doctor_Strange_cover.jpg" data-lightbox="film-img"><div class="film-img" style="background-image: url(./img/Doctor_Strange_cover.jpg);"></div></a>
                        <a href="./img/Doctor_Strange_cover.jpg" data-lightbox="film-img"><div class="film-img" style="background-image: url(./img/Doctor_Strange_cover.jpg);"></div></a>
                    </div>
                    <div class="photo-row">
                        
                    </div>
                    <div class="photo-row">

                    </div>
                </div>
            </div>
        </main>
        <footer>
            <div class="socials">
                <a href="#"><img src="./img/icon_telegram.svg" alt="Telegram icon"></a>
                <a href="#"><img src="./img/icon_instagram.svg" alt="Instagram icon"></a>
                <a href="#"><img src="./img/icon_twitter.svg" alt="Twitter icon"></a>
            </div>
            <nav class="bottom_menu">
                <a href="#">Home</a>
                <a href="#">Contact</a>
                <a href="#">FAQ</a>
                <a href="#">About</a>
            </nav>
            <nav class="counter">
                <span>Today hosts: 2</span>
                <span>Today views: 5274</span>
                <span>Total views: 5479</span>
            </nav>
        </footer>
    </body>
</html>