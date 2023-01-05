<?php
    require_once('../../setting/connection.php');
    if(isset($_POST["register"])){
        $name     = htmlspecialchars($_POST["name"]);
        $username = htmlspecialchars($_POST["username"]);
        $email    = $_POST["email"];
        $password = $_POST["password"];
        $password = password_hash($password, PASSWORD_BCRYPT);

        $add_user = mysqli_query($connection, "INSERT INTO users (level, name, username, email, password) VALUES (
            'pengunjung',
            '$name',
            '$username',
            '$email',
            '$password'
        )");
        $check_user = mysqli_query($connection, "SELECT id, name, username, email, password, level FROM users WHERE username = '$username'");
        

        if(mysqli_num_rows($check_user) >= 1) {
            $data = mysqli_fetch_assoc($check_user);

            $_SESSION["login"] = $data;
            $_SESSION["name"] = $data["name"];
            $_SESSION["username"] = $data["username"];
            $_SESSION["level"] = $data["level"];

            header('Location: '.$base_url.'/index.php');
        }else{
            $_SESSION['error']="Akun tidak tersedia!"; 
            header($base_url.'login.php');
            return false;
        }
    }
?>