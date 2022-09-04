<?php include 'inc/init.php';
if(!isset($_SESSION['login'])) {
    header('location:index.php');
    exit;
}
template_header(['title'=>'dashboard']); 
/**
 * pengelompokan halaman
 */
if (isset($_SESSION['login'])) {
    include 'partial/sidebar.php';
}
?>
<div class="w3-main">

<?php
if (isset($_GET['halaman'])) {
    $halaman = $_GET['halaman'];
    switch ($halaman) {
        case 'input-data':
        include 'pages/input-data.php';
            break;
        case 'edit-data':
        include 'pages/edit-data.php';
            break;
        case 'data':
        include 'pages/data.php';
            break;
        case 'export':
        include 'pages/export-data.php';
             break;
        default:
        include 'pages/dashboard.php';
            break;
    }
} else {
    include 'pages/dashboard.php';
}
echo '</div>';
echo '</div>';
template_footer();
?>