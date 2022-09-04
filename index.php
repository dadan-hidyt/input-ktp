<?php include 'inc/init.php';
if(isset($_SESSION['login']) && $_SESSION['login'] == true) {
    header('location:admin_dashboard.php');
    exit;
}
template_header(['title'=>'login']); 
//its oky if submit post login
if (isset($_POST['login']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = strip_tags($_POST['username']);
    $password = $_POST['password'];
    
    try {
        user_login_check($username,$password);
        header('location:admin_dashboard.php');
    } catch (Exception $e) {
        $_SESSION['error'] = $e->getMessage();
        header("location:login_gagal.php");
    }
}
?>
<!-- START halaman login -->
<div class="wrapper-main">
    <div class="container">
        <form method='POST' action="" class="form">
            <div class="form-head">
                <h3>Login Admin</h3>
            </div>
            <input type="text" class="w3-input w3-border w3-round" name='username' placeholder="Username">
            <input type="password" class="w3-input w3-border w3-round" name='password' placeholder="Password">
            <button name='login' style="width: 80%;" type="submit" class="w3-button w3-warning w3-round">Login</button>
        </form>
    </div>
</div>
<!-- END halaman login -->
<?php template_footer(); ?>