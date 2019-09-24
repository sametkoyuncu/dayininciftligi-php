<?php
    include 'baglan.php'; 
####################################################################################
############					   genel ayarlar						############
####################################################################################
	#
	#genel ayarlar - güncelleme
	#site favicon değiştirme - if yapısı
	#site logo değiştirme - else yapısı
	#
	if (isset($_POST['genelayarguncelle'])) {
		echo "genel ayar içi";
        if ($_FILES['site_favicon']["size"] > 0) {
			echo "if içi";
			$yukleme_dizini = 'assets/images/icon';
			@$tmp_name = $_FILES['site_favicon']["tmp_name"];
			@$name = $_FILES['site_favicon']["name"];
			$rastgelesayi1=rand(20000, 32000);
			$rastgelesayi2=rand(20000, 32000);
			$rastgelesayi3=rand(20000, 32000);
			$rastgelesayi4=rand(20000, 32000);
			$rastgelead=$rastgelesayi1.$rastgelesayi2.$rastgelesayi3.$rastgelesayi4;
			$refgorselyolu=substr($yukleme_dizini, 0)."/".$rastgelead.$name;
			@move_uploaded_file($tmp_name, "$yukleme_dizini/$rastgelead$name");

			$genelayarguncelle=$db->prepare("UPDATE ayarlar SET
				ayar_sitefavicon=:favicon
				WHERE ayar_id=:id");
			$guncelle=$genelayarguncelle->execute(array(
				'favicon' => $refgorselyolu,
				'id' => $_POST['ayar_id']
				));
			if ($guncelle) {
				$gorselsil_adres=$_POST["site_favicon_eski"];
				unlink("$gorselsil_adres");

				header("Location:site-genel-ayarlar.php?durum=true");
			} else {
				header("Location:site-genel-ayarlar.php?durum=false");
			}

		} else {
			echo "else içi";
			$yukleme_dizini = 'assets/images/icon';
			@$tmp_name = $_FILES['site_logo']["tmp_name"];
			@$name = $_FILES['site_logo']["name"];
			$rastgelesayi1=rand(20000, 32000);
			$rastgelesayi2=rand(20000, 32000);
			$rastgelesayi3=rand(20000, 32000);
			$rastgelesayi4=rand(20000, 32000);
			$rastgelead=$rastgelesayi1.$rastgelesayi2.$rastgelesayi3.$rastgelesayi4;
			$refgorselyolu=substr($yukleme_dizini, 0)."/".$rastgelead.$name;
			@move_uploaded_file($tmp_name, "$yukleme_dizini/$rastgelead$name");

			$genelayarguncelle=$db->prepare("UPDATE ayarlar SET
				ayar_sitelogo=:logo
				WHERE ayar_id=:id");
			$guncelle=$genelayarguncelle->execute(array(
				'logo' => $refgorselyolu,
				'id' => $_POST['ayar_id']
				));
			if ($guncelle) {

				$gorselsil_adres=$_POST["site_logo_eski"];
				unlink($gorselsil_adres);

				header("Location:site-genel-ayarlar.php?durum=true");
			} else {
				header("Location:site-genel-ayarlar.php?durum=false");
			}
		}	
	}
	#
	### genel ayarlar - sosyal medya hesapları
	#yeni hesap ekleme
	#
	if (isset($_POST['sosyalmedyaekle'])) {

		$sosyalmedyaekle=$db->prepare("INSERT INTO sosyal_medya SET
			sosyal_medya_adi=:adi,
			sosyal_medya_url=:sm_url,
			sosyal_medya_ikon=:ikon");
		$ekle=$sosyalmedyaekle->execute(array(
			'adi' => $_POST['sosyal_medya_adi'],
			'sm_url' => $_POST['sosyal_medya_url'],
			'ikon' => $_POST['sosyal_medya_ikon']
			));
		if ($ekle) {
			header("Location:site-genel-ayarlar.php?durum=true");
		} else {
			header("Location:site-genel-ayarlar.php?durum=false");
		}
	}

	#
	#sosyal medya hesabı güncelle
	#
	if (isset($_POST['sosyalmedyaguncelle'])) {
		
		$sosyalmedyaguncelle=$db->prepare("UPDATE sosyal_medya SET
			sosyal_medya_adi=:adi,
			sosyal_medya_url=:sm_url,
			sosyal_medya_ikon=:ikon
			WHERE sosyal_medya_id=:id");
		$guncelle=$sosyalmedyaguncelle->execute(array(
			'adi' => $_POST['sosyal_medya_adi'],
			'sm_url' => $_POST['sosyal_medya_url'],
			'ikon' => $_POST['sosyal_medya_ikon'],
			'id' => $_POST['sosyal_medya_id']
			));
		$smid=$_POST['sosyal_medya_id'];
		if($guncelle) {
			header("Location:sosyal-medya-duzenle.php?durum=true&sosyal_medya_id=$smid");
		} else {
			header("Location:sosyal-medya-duzenle.php?durum=false&sosyal_medya_id=$smid");
		}
	}

	#
	#sosyal medya hesabı sil
	#
	if(isset($_GET['sosyalmedyasil'])) {
		if ($_GET['sosyalmedyasil']=="true") {
			$sosyalmedyasil=$db->prepare("DELETE FROM sosyal_medya WHERE sosyal_medya_id=:id");
			$sil=$sosyalmedyasil->execute(array(
				'id' => $_GET['sosyal_medya_id']
				));
			if ($sil) {
				header("Location:site-genel-ayarlar.php?durum=true");
			} else {
				header("Location:site-genel-ayarlar.php?durum=false");
			}
		}	
	}

	#
	#meta etikelerini güncelle
	#
	if (isset($_POST['metaguncelle'])) {
		
		$metaguncelle=$db->prepare("UPDATE ayarlar SET
			meta_title=:mtitle,
			meta_description=:mdescription,
			meta_keywords=:mkeywords,
			meta_author=:mauthor,
			meta_owner=:mowner,
			meta_copyright=:mcopyright
			WHERE ayar_id=:id");
		$guncelle=$metaguncelle->execute(array(
			'mtitle' => $_POST['meta_title'],
			'mdescription' => $_POST['meta_description'],
			'mkeywords' => $_POST['meta_keywords'],
			'mauthor' => $_POST['meta_author'],
			'mowner' => $_POST['meta_owner'],
			'mcopyright' => $_POST['meta_copyright'],
			'id' => $_POST['ayar_id']
			));
		if ($guncelle) {
			header("Location:site-genel-ayarlar.php?durum=true#metaetiketleri");
		} else {
			header("Location:site-genel-ayarlar.php?durum=false#metaetiketleri");
		}
	}
?>