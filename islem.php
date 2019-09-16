<?php 
	include 'baglan.php'; 

    date_default_timezone_set('Europe/Istanbul');
    setlocale(LC_TIME,"Turkish");

	####################################################################################
	############					   site mesaj ayarı						############
	####################################################################################
	#
	#mesaj ayarı - mesaj ekle
	#
	if (isset($_POST['mesajekle'])) {

		$mesajekle=$db->prepare("INSERT INTO mesajlar SET
			mesaj_gonderen=:gonderen,
			mesaj_konu=:konu,
			mesaj_eposta=:eposta,
			mesaj_icerik=:icerik
			");
		$ekle=$mesajekle->execute(array(
			'gonderen' => $_POST['name'],
			'konu' => $_POST['subject'],
			'eposta' => $_POST['email'],
			'icerik' => $_POST['message']
			));
		
		if ($ekle) {
			header("Location:../index.html#iletisim");
		} else {
			header("Location:../index.html#iletisim?durum?=false");
		}
    }
    
    #
	#mesaj ayarı - mesaj sil
	#
	if(isset($_GET['mesajsil'])) {
		if ($_GET['mesajsil']=="true") {
			$mesajsil=$db->prepare("DELETE FROM mesajlar WHERE mesaj_id=:id");
			$sil=$mesajsil->execute(array(
				'id' => $_GET['mesaj_id']
				));
                if ($sil) {
                    header("Location:ev-kayit/production/mesajlar.php?durum=true");
                } else {
                    header("Location:ev-kayit/production/mesajlar.php?durum=false");
                }
		}	
    }
    
    ####################################################################################
	############					   site abone ayarı						############
	####################################################################################
	#
	#abone ayarı - abone ekle
	#
	if (isset($_POST['aboneekle'])) {

		$aboneekle=$db->prepare("INSERT INTO aboneler SET
			abone_eposta=:eposta
			");
		$ekle=$aboneekle->execute(array(
			'eposta' => $_POST['email']
			));
		
		if ($ekle) {
			header("Location:../index.html#footer");
		} else {
			header("Location:../index.html#footer?durum?=false");
		}
    }

?>

