<?php
class Error404 extends Page {
    function __construct(){
        parent::__construct();
    }

    function getMain() : string {


        return 
        '
        <main>
            <link rel="stylesheet" href="css/error.css">
            <div class="container">
                <h2>404</h2>
                <h3>Oops, nothing here...</h3>
                <p>Please Check the URL</p>
                <p>Otherwise, <a href="index.php">Click here</a> to redirect to homepage.</p>
            </div>
        </main>
        ';
                
    }
}
