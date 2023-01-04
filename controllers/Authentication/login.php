<?php
    if(isset($_POST["login"])){
        $username = htmlspecialchars($_POST["username"]);
        $password = $_POST["password"];
        $check_user = mysqli_query($connection, "SELECT id, name, username, email, password, level FROM users WHERE username = '$username'");

        if(mysqli_num_rows($check_user) === 1) {
            $data = mysqli_fetch_assoc($check_user);

            if(password_verify($password, $data["password"]) && $data["level"] == "admin"){
                $_SESSION["login"] = $data;
                $_SESSION["name"] = $data["name"];
                $_SESSION["username"] = $data["username"];
                $_SESSION["level"] = $data["level"];

                header('Location: '.$base_url.'/admin/dashboard.php?dashboard');
            }
            else if(!password_verify($password, $data["password"])){
                $_SESSION['error']="Username atau Password Salah!"; 
                header($base_url.'login.php');
                return false;
            }
        }else{
            $_SESSION['error']="Akun tidak tersedia!"; 
            header($base_url.'login.php');
            return false;
        }
    }
?>