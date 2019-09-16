<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>

<!-- bolumler tablosunda bolum durum değeri 1 olanları çekip gösteriyorz -->
<?php while ($bolumcek=$bolumlersorgu->fetch(PDO::FETCH_ASSOC)) { 
    $bolum="sections/".$bolumcek['bolum_adi'].".php";
    include ($bolum);
 } ?>



<?php include "includes/footer.php"; ?>