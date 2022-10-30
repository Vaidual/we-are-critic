<?php
abstract class Page 
{
    private string $pageContent;

    function __construct(){
        $this->CountUser();
        $ds = DIRECTORY_SEPARATOR;
        $base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;
        $file = "{$base_dir}controller\\visits-count.php"; 
        include_once($file); 
        //include_once "./controller/visits_count.php";
        $this->pageContent = $this->getHead() . $this->getBody();
    }

    public static function getHead() : string{
        return '<head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="./slick/slick-theme.css"/>
        <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script type="text/javascript" src="./slick/slick.min.js"></script>
        <script type="text/javascript" src="./js/slider.js"></script>
        <script defer type="text/javascript" src="./js/script.js"></script>
        <script defer type="text/javascript" src="./js/lightbox.min.js"></script>
        <link rel="stylesheet" href="css/lightbox.min.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="https://kit.fontawesome.com/64d58efce2.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="css/login.css"/>
        <title>WeAreCritic</title>
    </head>';
    }

    public static function getHeader() : string {
        $part1 = '
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
                        <input name="keyword" id="search-result" class="header-search-bar" type="text" placeholder="Search here...">
                        <a class="search__btn" type="submit">
                            <img id="search__image" src="./img/search_icon.png" alt="Search">
                        </a>
                    </form>
                </div>
        ';
        $part2 = '
            </nav>
        </header>
        ';
        $partNotLoged = '
        <div class="login__btns">
            <a class="sign_in__btn" href="./create_login.php">Sign in</a>
        </div>
        ';
        if(isset($_SESSION['user_id']))
        $partLoged1 = '
        <button class="user-menu-btn" onclick="ToggleUserMenu()">
            <img src="./img/account-icon.svg" class="account-image"></img>
            <div class="user-menu">
                <a href="#" class="user-menu__profile-link">
                    <div class="user-menu__tab-name">'.$_SESSION['username'].'</div>
                </a>
                <div class="user-menu__border"></div>
        ';
        $partLoged2 = '
                <a href="./controller/logout.php" class="user-menu__logout-link">
                    <div class="user-menu__tab-name">Logout</div>
                </a>
            </div>
        </button>
        ';
        $partAdmin = '
        <a href="create_adddeletefilm.php" class="user-menu__films-menu-link">
            <div class="user-menu__tab-name">Films preferences</div>
        </a>
        <div class="user-menu__border"></div>
        ';
        if(isset($_SESSION['user_id'])){
            if ($_SESSION['admin'] == 1){
                return $part1.$partLoged1.$partAdmin.$partLoged2.$part2;
            }
            else {
                return $part1.$partLoged1.$partLoged2.$part2;
            }
        }
        else
            return $part1.$partNotLoged.$part2;
    }

    function getBody() : string{
        return '<body>'.$this->getHeader().$this->getMain().$this->getFooter().'</body>';
    }

    abstract function getMain() : string;

    public static function getFooter() : string{
        return 
        '<footer>
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
                <span>Today hosts: '.$_POST["hosts"].'</span>
                <span>Today views: '.$_POST["views"].'</span>
                <span>Total views: '.$_POST["total"].'</span>
            </nav>
        </footer>';
    }

    function getPage(){
        $file = 'index.txt';
        $current = "<!doctype html><html lang = 'en'>".$this->pageContent."</html>";
        file_put_contents($file, $current);
        echo "<!doctype html><html lang = 'en'>".$this->pageContent."</html>";
    }

    function CountUser(){
        if(!isset($_SESSION['counted'])){ 

            if(isset($_SERVER['HTTP_USER_AGENT']))
                $agent = $_SERVER['HTTP_USER_AGENT'];
            else
                $agent = 'unknown';
            if(isset($_SERVER['REQUEST_URI']))
                $uri = $_SERVER['REQUEST_URI'];
            else
                $uri = 'unknown';
            if(isset($_SERVER['PHP_AUTH_USER']))
                $user = $_SERVER['PHP_AUTH_USER'];
            else
                $user= 'unknown';
            if(isset($_SERVER['REMOTE_ADDR']))
                $ip = $_SERVER['REMOTE_ADDR'];
            else
                $ip = 'unknown';
                
            if(isset($_SERVER['HTTP_REFERER']))
                $ref = $_SERVER['HTTP_REFERER'];
            else
                $ref = 'unknown';
            $dtime = date('r');
            $entry_line = "$dtime - IP: $ip | Agent: $agent | URL: $uri | Referrer: $ref | Username: $user \n\n";
            $fp = fopen("logs/logs.txt", "a");
            fputs($fp, $entry_line);
            fclose($fp);
            $_SESSION['counted'] = '1';
        }
    }
}