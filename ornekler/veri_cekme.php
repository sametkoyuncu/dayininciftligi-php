<?php
include "baglan.php";
$kategorisorgu=$db->prepare("SELECT * FROM kategoriler WHERE kategori_ust_id=:id");
$kategorisorgu->execute(array(
    'id' => 0
    ));
while ($kategoricek=$kategorisorgu->fetch(PDO::FETCH_ASSOC)) {
    echo $kategoricek['kategori_adi'];
    echo "while içi";
}
echo "deneme";
?>