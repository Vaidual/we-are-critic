<?php
class Login extends Page {
    private $login;
    function __construct($login){
    if ($login === 'login')
        $this->login = "login";
    else
        $this->login = "";
        parent::__construct();

    }
    
    function getMain() : string {
        if (($this->login) == "login")
        return
        '<main>
            <div id="container-login">
                <div id="title">
                    <i class="material-icons lock">lock</i> Login
                </div>

                <form action="./create_login.php" method="POST">
                    <div class="input">
                        <div class="input-addon">
                            <i class="material-icons">face</i>
                        </div>
                        <input id="email" name="email" placeholder="Email" type="email" required class="validate" autocomplete="off">
                    </div>

                    <div class="clearfix"></div>

                    <div class="input">
                        <div class="input-addon">
                            <i class="material-icons">vpn_key</i>
                        </div>
                        <input name="password" id="password" placeholder="Password" type="password" required class="validate" autocomplete="off">
                    </div>

                    <div class="remember-me">
                        <input type="checkbox">
                        <span style="color: #DDD">Remember Me</span>
                    </div>

                    <input name="btn-login" type="submit" value="Log In" />
                </form>

                <div class="forgot-password">
                    <a href="#">Forgot your password?</a>
                </div>

                <div class="register">
                    Don\'t have an account yet?
                    <a href="create_register.php"><button id="register-link">Register here</button></a>
                </div>
            </div>
        </main>';
        else
        return 
        '<main>
            <div id="container-register">
            <div id="title">
                <i class="material-icons lock">lock</i> Register
            </div>

            <form action="./create_register.php" method="POST">
                <div class="input">
                    <div class="input-addon">
                        <i class="material-icons">email</i>
                    </div>
                    <input id="email" name="email" placeholder="Email" type="email" required class="validate" autocomplete="off">
                </div>

                <div class="clearfix"></div>

                <div class="input">
                    <div class="input-addon">
                        <i class="material-icons">face</i>
                    </div>
                    <input id="username" name="username" placeholder="Username" type="text" required class="validate" autocomplete="off">
                </div>

                <div class="clearfix"></div>

                <div class="input">
                    <div class="input-addon">
                        <i class="material-icons">vpn_key</i>
                    </div>
                    <input id="password" name="password" placeholder="Password" type="password" required class="validate" autocomplete="off">
                </div>

                <div class="remember-me">

                </div>

                <input name="btn-reg" type="submit" value="Register" />
            </form>

            <div class="register">
                Do you already have an account?
                <a href="create_login.php"><button id="register-link">Log In here</button></a>
            </div>
        </div>
        </main>';
    }
}
