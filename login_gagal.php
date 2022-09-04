<?php
include 'inc/init.php';
if(isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    unset($_SESSION['error']);
    ?>
    <style>
        *{
            padding:0;
            margin:0;
        }
        .login-error-msg{
            width:500px;
            border-radius:10px;
            padding:10px;
            box-sizing:border-box;
            background:pink;
            border:3px solid maroon;
            margin:80px auto;
        }
        .login-error-msg p{
            font-weight:bold;
        }
        a{
            text-decoration:none;
        }
    </style>
    <div class="login-error-msg">
        <p><?= $error; ?></p>
        <a href="index.php">Kembali</a>
    </div>
    <?php
}
?>