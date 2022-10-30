<?php
 include_once "./db/db.php";

function userAuth($inputUser){
    $_SESSION['user_id'] = $inputUser['user_id'];
    $_SESSION['username'] = $inputUser['username'];
    $_SESSION['admin'] = $inputUser['admin'];
    define('URL', 'http://localhost/we-are-critic/');
    header('Location: '.URL.'index.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn-reg'])){
    $admin = 0;
    $login = trim($_POST['username']);

    if (ValidateUserEmail($_POST['email']))
    {
        $email = trim($_POST['email']);
        $pass = password_hash($_POST['password'],PASSWORD_DEFAULT);
        $existance = selectOne('User',['email'=> $email]);
        if ($existance["email"] === $email){
            echo '<script>alert("A user with this email already exists")</script>';
        }
        else {
            $post = [
                'admin' => $admin,
                'username' => $login,
                'email' => $email,
                'password' => $pass
            ];
    
            insert('User',$post);
            $user = selectOne('User',["email" => $post["email"]]);
            userAuth($user);
    
        }

    }
    else
    {
        echo '<script>alert("Email is incorrect")</script>';
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn-login'])){


    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $existance = selectOne('User',['email' => $email]);
    if($existance && password_verify($password, $existance['password'])){
        userAuth($existance);
    }
}


function ValidateUserEmail(&$email) : bool
{
    $email = trim($_POST['email']);
    $regex_email = "/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i";

    if (preg_match($regex_email, $email)) 
    {
        return true;
    }
    return false;
}


