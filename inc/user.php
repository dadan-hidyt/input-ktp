<?php

function user_login_check(string $username,string $password) 
{
    try {
        $check = connect()->prepare("SELECT * FROM admin WHERE username=:username AND password=:password");
        $check->bindValue(':username', $username);
        $check->bindValue(':password', $password);
        $check->execute();
    }catch(Exception $e) {
        echo $e->getMessage();
    }
    if ($check->rowCount() > 0) {
        $data = $check->fetch(PDO::FETCH_OBJ);
        $_SESSION['username'] = $data->username;
        $_SESSION['password'] = $data->password;
        $_SESSION['login'] = true;
    } else {
        throw new Exception('Login gagal username dan password salah!');
    }
}