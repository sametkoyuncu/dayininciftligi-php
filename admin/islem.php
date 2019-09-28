<?php
	include 'baglan.php'; 
####################################################################################
############					   bolum ayarları						############
####################################################################################
	#
	#bölüm güncelle
	#
	#bölüm güncelleme çok sayıda sayfada olduğu için
	#sayfa_url ve sayfa_no ları alıp ona göre header da kullandık
	#
	if (isset($_POST['bolumguncelle'])) {
		$sayfa_url=$_POST['sayfa_url'];
		$sayfa_no=$_POST['sayfa_no'];
		$bolumguncelle=$db->prepare("UPDATE bolumler SET
			bolum_sira=:sira,
			bolum_durum=:durum
			WHERE bolum_id=:id");
		$guncelle=$bolumguncelle->execute(array(
			'sira' => $_POST['bolum_sira'],
			'durum' => $_POST['bolum_durum'],
			'id' => $_POST['bolum_id']
			));
		if($guncelle) {
			header("Location:$sayfa_url.php?pg=$sayfa_no&durum=true");
		} else {
			header("Location:$sayfa_url.php?pg=$sayfa_no&durum=false");
		}
	}
####################################################################################
############					   genel ayarlar						############
####################################################################################
	#
	#genel ayarlar - güncelleme
	#site favicon değiştirme - if yapısı
	#site logo değiştirme - else yapısı
	#
	if (isset($_POST['genelayarguncelle'])) {
        if ($_FILES['site_favicon']["size"] > 0) {
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

				header("Location:site-genel-ayarlar.php?pg=3&durum=true");
			} else {
				header("Location:site-genel-ayarlar.php?pg=3&durum=false");
			}

		} else {
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

				header("Location:site-genel-ayarlar.php?pg=3&durum=true");
			} else {
				header("Location:site-genel-ayarlar.php?pg=3&durum=false");
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
			header("Location:site-genel-ayarlar.php?pg=3&durum=true#sosyalmedya");
		} else {
			header("Location:site-genel-ayarlar.php?pg=3&durum=false#sosyalmedya");
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
			header("Location:sosyal-medya-duzenle.php?pg=3&durum=true&sosyal_medya_id=$smid");
		} else {
			header("Location:sosyal-medya-duzenle.php?pg=3&durum=false&sosyal_medya_id=$smid");
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
				header("Location:site-genel-ayarlar.php?pg=3&durum=true#sosyalmedya");
			} else {
				header("Location:site-genel-ayarlar.php?pg=3&durum=false#sosyalmedya");
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
			header("Location:site-genel-ayarlar.php?pg=3&durum=true#metaetiketleri");
		} else {
			header("Location:site-genel-ayarlar.php?pg=3&durum=false#metaetiketleri");
		}
	}
####################################################################################
############					   üst menü ayarları					############
####################################################################################
	#
	#üst menü ekleme
	#
	if (isset($_POST['ustmenuekle'])) {

		$ustmenuekle=$db->prepare("INSERT INTO navbar SET
			nav_adi=:adi,
			nav_url=:nav_url,
			nav_sira=:sira,
			nav_durum=:durum");
		$ekle=$ustmenuekle->execute(array(
			'adi' => $_POST['nav_adi'],
			'nav_url' => $_POST['nav_url'],
			'sira' => $_POST['nav_sira'],
			'durum' => $_POST['nav_durum']
			));
		if ($ekle) {
			header("Location:ust-kisim.php?pg=5&durum=true");
		} else {
			header("Location:ust-kisim.php?pg=5&durum=false");
		}
	}

	#
	#üst menü güncelle
	#
	if (isset($_POST['ustmenuguncelle'])) {
		
		$ustmenuguncelle=$db->prepare("UPDATE navbar SET
			nav_adi=:adi,
			nav_url=:nv_url,
			nav_sira=:sira,
			nav_durum=:durum
			WHERE nav_id=:id");
		$guncelle=$ustmenuguncelle->execute(array(
			'adi' => $_POST['nav_adi'],
			'nv_url' => $_POST['nav_url'],
			'sira' => $_POST['nav_sira'],
			'durum' => $_POST['nav_durum'],
			'id' => $_POST['nav_id']
			));
		$nvid=$_POST['nav_id'];
		if($guncelle) {
			header("Location:ust-menu-duzenle.php?pg=5&durum=true&nav_id=$nvid");
		} else {
			header("Location:ust-menu-duzenle.php?pg=5&durum=false&nav_id=$nvid");
		}
	}

	#
	#üst menü sil
	#
	if(isset($_GET['ustmenusil'])) {
		if ($_GET['ustmenusil']=="true") {
			$ustmenusil=$db->prepare("DELETE FROM navbar WHERE nav_id=:id");
			$sil=$ustmenusil->execute(array(
				'id' => $_GET['nav_id']
				));
			if ($sil) {
				header("Location:ust-kisim.php?pg=5&durum=true");
			} else {
				header("Location:ust-kisim.php?pg=5&durum=false");
			}
		}	
	}
####################################################################################
############					  giriş bölümü ayarları					############
####################################################################################
	#
	#giriş bölümü bilgi güncelleme
	#
	if (isset($_POST['girisguncelle'])) {
       if ($_FILES['giris_arkaplan']["size"] > 0) {
			$yukleme_dizini = '../assets/img/banner';
			@$tmp_name = $_FILES['giris_arkaplan']["tmp_name"];
			@$name = $_FILES['giris_arkaplan']["name"];
			$rastgelesayi1=rand(20000, 32000);
			$rastgelesayi2=rand(20000, 32000);
			$rastgelesayi3=rand(20000, 32000);
			$rastgelesayi4=rand(20000, 32000);
			$rastgelead=$rastgelesayi1.$rastgelesayi2.$rastgelesayi3.$rastgelesayi4;
			$refgorselyolu=substr($yukleme_dizini, 3)."/".$rastgelead.$name;
			#admin dizininde yüklenip asıl dizinde gösterildiği için ../ kısmını kestik
			@move_uploaded_file($tmp_name, "$yukleme_dizini/$rastgelead$name");

			$girisguncelle=$db->prepare("UPDATE giris SET
				giris_baslik=:baslik,
				giris_yazi=:yazi,
				giris_buton_yazi=:btn_yazi,
				giris_buton_url=:g_url,
				giris_arkaplan=:arkaplan
				WHERE giris_id=:id");
			$guncelle=$girisguncelle->execute(array(
				'baslik' => $_POST['giris_baslik'],
				'yazi' => $_POST['giris_yazi'],
				'btn_yazi' => $_POST['giris_buton_yazi'],
				'g_url' => $_POST['giris_buton_url'],
				'arkaplan' => $refgorselyolu,
				'id' => $_POST['giris_id']
				));
			if ($guncelle) {
				$gorselsil_adres=$_POST["giris_arkaplan_eski"];
				unlink("$gorselsil_adres");

				header("Location:giris.php?pg=6&durum=true");
			} else {
				header("Location:giris.php?pg=6&durum=false");
			}

		} else {
			$girisguncelle=$db->prepare("UPDATE giris SET
				giris_baslik=:baslik,
				giris_yazi=:yazi,
				giris_buton_yazi=:btn_yazi,
				giris_buton_url=:g_url
				WHERE giris_id=:id");
			$guncelle=$girisguncelle->execute(array(
				'baslik' => $_POST['giris_baslik'],
				'yazi' => $_POST['giris_yazi'],
				'btn_yazi' => $_POST['giris_buton_yazi'],
				'g_url' => $_POST['giris_buton_url'],
				'id' => $_POST['giris_id']
				));
			if($guncelle) {
				header("Location:giris.php?pg=6&durum=true");
			} else {
				header("Location:giris.php?pg=6&durum=false");
			}
		}	
	}
?>