<?php
// 4.7.19 - Samet Koyuncu
?>
<?php 
    include "baglan.php"; 
    setlocale(LC_TIME, "turkish"); //başka bir dil içinse burada belirteceksin.
    setlocale(LC_ALL,'turkish'); //başka bir dil içinse burada belirteceksin.
?>
<?php
$ayarlarsorgu=$db->prepare("SELECT * FROM ayarlar WHERE ayar_id=:id");
$ayarlarsorgu->execute(array(
    'id' => 1
    ));
$ayarcek=$ayarlarsorgu->fetch(PDO::FETCH_ASSOC);

//index.php için sorgu
$bolumlersorgu=$db->prepare("SELECT * FROM bolumler WHERE bolum_durum=:id");
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
    <meta name="title" content="Dayının Çiftliği" />
    <meta name="description" content="Dayının Çiftliği İstanbul Şile'de kurbanlık, adaklık, süt, yumurta ve bahçe mahsülleri üretimi yapan bir aile işletmesidir.">
    <meta name="keywords" content="kurbanlık, adaklık, süt, yumurta" />
    <!--<meta name="author" content="SİTE YÖNETİCİSİ VE YAZARI" />-->
    <!--<meta name="owner" content="SİTE SAHİBİ" />-->
    <meta name="copyright" content="(c) 2018" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $ayarcek['ayar_sitefavicon']; ?>">
    <link rel="apple-touch-icon" href="<?php echo $ayarcek['ayar_sitefavicon']; ?>">
    <title><?php echo $ayarcek['meta_title']; ?></title>

    <!-- galeri css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
    <link rel="stylesheet" href="css/gallery-grid.css">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="vendors/animate-css/animate.css">

    <!-- emoji css -->
    <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
    

    <!-- main css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/mystyle.css">

    <style>
    html {
        scroll-behavior: smooth;
    }
    </style>

</head>
<body>