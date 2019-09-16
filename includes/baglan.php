<?php
//8.7.19 - samet koyuncu
	$dns="mysql:host=localhost;dbname=dayininciftligi_web";
	$kullanici_adi='root';
    $parola='';
    //$kont=1; hata yok mesajı için değişken tanımlaması
    try {
        $db= new PDO($dns,$kullanici_adi,$parola);
        #Türçe karakter
        $db->exec("SET NAMES 'utf8'; SET CHARSET 'utf8'");
    }
    #hata yakalama
    
    catch (PDOExpception $e) {
        echo $e->getMessage();
        //$kont=0;
    }
    /*
    if($kont==1){
        echo "hata yok";
    }elseif ($kont==0) {
        echo "hata var";
    }
    */
?>