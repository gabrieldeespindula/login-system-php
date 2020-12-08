<?php
// connecting
require_once 'dbconnect.php';

// sessions
session_start();


// send button
if(isset($_POST['button-login'])):
    $errors = array();
    $login = mysqli_escape_string($connect, $_POST['login']);
    $password = md5(mysqli_escape_string($connect, $_POST['password']));
    
    if (empty($login) or empty($password)):
        $errors[] = "<li> The login / password field needs to be filled. </li>";
    else:
        $sql = "SELECT login FROM user WHERE login = '$login'";
        $result = mysqli_query($connect, $sql);

        if(mysqli_num_rows($result) > 0):
            $sql = "SELECT * FROM user WHERE login = '$login' AND password = '$password'";
            $result = mysqli_query($connect, $sql);

            if(mysqli_num_rows($result) == 1):
                $data = mysqli_fetch_array($result);
                $_SESSION['logged'] = true;
                $_SESSION['id_user'] = $data['id'];
                header('location: home.php');
            else:
                $errors[] = "<li> Login and password don´t match. </li>";
            endif;
        else:
            $errors[] = "<li> User not found.</li>";
        endif;
    endif;

endif;

?>

<html>
<head>
    <title>Login</title>
    <meta charset="utf-8">

</head>

<body>
    <h1> Login </h1>

    <?php
    if(!empty($errors)):
        foreach($errors as $error):
            echo $error;
        endforeach;
    endif;
    ?>

    <hr>

    <form action="" method="POST">
    Login: <input type="text" name="login"><br>
    Password: <input type="password" name="password"><br>
    <button type="submit" name="button-login"> Log In </button>
    </form>

</body>
</html>