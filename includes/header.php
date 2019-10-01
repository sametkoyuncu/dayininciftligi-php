<?php
// 4.7.19 - Samet Koyuncu
?>
<?php 
    include "admin/baglan.php"; 
    setlocale(LC_TIME, "turkish"); //başka bir dil içinse burada belirteceksin.
    setlocale(LC_ALL,'turkish'); //başka bir dil içinse burada belirteceksin.
?>
<?php include "admin/includes/alerts.php";  ?>
<?php
$ayarlarsorgu=$db->prepare("SELECT * FROM ayarlar WHERE ayar_id=:id");
$ayarlarsorgu->execute(array(
    'id' => 1
    ));
$ayarcek=$ayarlarsorgu->fetch(PDO::FETCH_ASSOC);

//index.php için sorgu
$bolumlersorgu=$db->prepare("SELECT * FROM bolumler WHERE bolum_durum=:id ORDER BY bolum_sira");
$bolumlersorgu->execute(array(
   'id' => 1
    ));

//iletişim bilgileri
$iletisimsorgu=$db->prepare("SELECT * FROM iletisim WHERE iletisim_id=:id");
$iletisimsorgu->execute(array(
    'id' => 1
    ));
$iletisimcek=$iletisimsorgu->fetch(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="tr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- meta tags -->
    <meta name="title" content="<?php echo $ayarcek['meta_title']; ?>" />
    <meta name="description" content="<?php echo $ayarcek['meta_description']; ?>">
    <meta name="keywords" content="<?php echo $ayarcek['meta_keywords']; ?>" />
    <meta name="author" content="<?php echo $ayarcek['meta_author']; ?>" />
    <meta name="owner" content="<?php echo $ayarcek['meta_owner']; ?>" />
    <meta name="copyright" content="<?php echo $ayarcek['meta_copyright']; ?>" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="admin/<?php echo $ayarcek['ayar_sitefavicon']; ?>">
    <link rel="apple-touch-icon" href="admin/<?php echo $ayarcek['ayar_sitefavicon']; ?>">
    <title><?php echo $ayarcek['meta_title']; ?></title>

    <!-- galeri css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/gallery-grid.css">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/vendors/animate-css/animate.css">

    <!-- emoji css -->
    <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
    

    <!-- main css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/css/mystyle.css">

    <style>
    html {
        scroll-behavior: smooth;
    }
    </style>

</head>
<body>