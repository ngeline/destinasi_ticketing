<?php
    // include('../../setting/connection.php');
    require_once('../../setting/connection.php');
    session_start();
    if(isset($_POST["loginpengunjung"])){
        $username = htmlspecialchars($_POST["username"]);
        $password = $_POST["password"];
        $check_user = mysqli_query($connection, "SELECT id, name, username, email, password, level FROM users WHERE username = '$username'");
        // var_dump(mysqli_num_rows($check_user));

        if(mysqli_num_rows($check_user) === 1) {
            $data = mysqli_fetch_assoc($check_user);
            if(password_verify($password, $data["password"]) && $data["level"] == "pengunjung"){
                $_SESSION["login"] = $data;
                $_SESSION["name"] = $data["name"];
                $_SESSION["username"] = $data["username"];
                $_SESSION["level"] = $data["level"];

                header('Location: '.$base_url.'/index.php');
            }else if(!password_verify($password, $data["password"])){
                $_SESSION['error']="Username atau Password Salah!"; 
                header('Location: '.$base_url.'/login.php');
                return false;
            }else{
                $_SESSION['error']="Username atau Password Salah!"; 
                header('Location: '.$base_url.'/login.php');
                return false;
            }
        }
        if(mysqli_num_rows($check_user) === 0){
            $_SESSION['error']="Akun tidak tersedia!"; 
            header('Location: '.$base_url.'/login.php');
            return false;
        }
        else{
            $_SESSION['error']="Akun tidak tersedia!"; 
            header($base_url.'/login.php');
            return false;
        }
    }
?>