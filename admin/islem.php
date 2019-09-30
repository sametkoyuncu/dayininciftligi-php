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
			bolum_durum=:durum,
			bolum_altbaslik=:altbaslik,
			bolum_buton_yazi=:buton_yazi,
			bolum_buton_url=:buton_url
			WHERE bolum_id=:id");
		$guncelle=$bolumguncelle->execute(array(
			'sira' => $_POST['bolum_sira'],
			'durum' => $_POST['bolum_durum'],
			'altbaslik' => $_POST['bolum_altbaslik'],
			'buton_yazi' => $_POST['bolum_buton_yazi'],
			'buton_url' => $_POST['bolum_buton_url'],
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
####################################################################################
############					   galeri ayarları						############
####################################################################################
	#
	#fotoğraf ekle
	#
	if (isset($_POST['fotoekle'])) {

		$yukleme_dizini = '../assets/img/galeri';
			@$tmp_name = $_FILES['gorsel']["tmp_name"];
			@$name = $_FILES['gorsel']["name"];
			$rastgelesayi1=rand(20000, 32000);
			$rastgelesayi2=rand(20000, 32000);
			$rastgelesayi3=rand(20000, 32000);
			$rastgelesayi4=rand(20000, 32000);
			$rastgelead=$rastgelesayi1.$rastgelesayi2.$rastgelesayi3.$rastgelesayi4;
			$refgorselyolu=substr($yukleme_dizini, 3)."/".$rastgelead.$name;
			@move_uploaded_file($tmp_name, "$yukleme_dizini/$rastgelead$name");

		$gorselekle=$db->prepare("INSERT INTO galeri SET
			gorsel_url=:gorsel,
			gorsel_alt=:alt,
			gorsel_durum=:durum");
		$ekle=$gorselekle->execute(array(
			'gorsel' => $refgorselyolu,
			'alt' => $_POST['gorsel_alt'],
			'durum' => $_POST['gorsel_durum']
			));
		if ($ekle) {
			header("Location:galeri.php?pg=8&durum=true#fotograflar");
		} else {
			header("Location:galeri.php?pg=8&durum=false#fotograflar");
		}
	}
	#
	#fotoğraf güncelleme
	#
	if (isset($_POST['fotoguncelle'])) {

        if ($_FILES['gorsel']["size"] > 0) {

			$yukleme_dizini = '../assets/img/galeri';
			@$tmp_name = $_FILES['gorsel']["tmp_name"];
			@$name = $_FILES['gorsel']["name"];
			$rastgelesayi1=rand(20000, 32000);
			$rastgelesayi2=rand(20000, 32000);
			$rastgelesayi3=rand(20000, 32000);
			$rastgelesayi4=rand(20000, 32000);
			$rastgelead=$rastgelesayi1.$rastgelesayi2.$rastgelesayi3.$rastgelesayi4;
			$refgorselyolu=substr($yukleme_dizini, 3)."/".$rastgelead.$name;
			@move_uploaded_file($tmp_name, "$yukleme_dizini/$rastgelead$name");

			$gorsel_id = $_POST['gorsel_id'];

			$gorselguncelle=$db->prepare("UPDATE galeri SET
				gorsel_url=:gorsel,
				gorsel_alt=:alt,
				gorsel_durum=:durum
				WHERE gorsel_id=:id");
			$guncelle=$gorselguncelle->execute(array(
				'gorsel' => $refgorselyolu,
				'alt' => $_POST['gorsel_alt'],
				'durum' => $_POST['gorsel_durum'],
				'id' => $gorsel_id
				));
			if ($guncelle) {
				$gorselsil_adres=$_POST["gorsel_eski"];
				unlink("$gorselsil_adres");

				header("Location:galeri.php?pg=8&durum=true&gorsel_id=$gorsel_id");
			} else {
				header("Location:galeri.php?pg=8&durum=false&gorsel_id=$gorsel_id");
			}

		} else {
			$gorsel_id = $_POST['gorsel_id'];

			$gorselguncelle=$db->prepare("UPDATE galeri SET
				gorsel_alt=:alt,
				gorsel_durum=:durum
				WHERE gorsel_id=:id");
			$guncelle=$gorselguncelle->execute(array(
				'alt' => $_POST['gorsel_alt'],
				'durum' => $_POST['gorsel_durum'],
				'id' => $gorsel_id
				));
			if ($guncelle) {
				header("Location:galeri-fotograf-duzenle.php?pg=8&durum=true&gorsel_id=$gorsel_id");
			} else {
				header("Location:galeri-fotograf-duzenle.php?pg=8&durum=false&gorsel_id=$gorsel_id");
			}
		}	
	}
	#
	#fotoğraf sil
	#
	if(isset($_GET['fotosil'])) {
		if ($_GET['fotosil']=="true") {
			$fotosil=$db->prepare("DELETE FROM galeri WHERE gorsel_id=:id");
			$sil=$fotosil->execute(array(
				'id' => $_GET['gorsel_id']
				));
			if ($sil) {
				header("Location:galeri.php?pg=8&durum=true#fotograflar");
			} else {
				header("Location:galeri.php?pg=8&durum=false#fotograflar");
			}
		}	
	}

####################################################################################
############					   ürün ayarları						############
####################################################################################
	#
	#ürün ekle
	#
	if (isset($_POST['urunekle'])) {

		$yukleme_dizini = '../assets/img/logo';
			@$tmp_name = $_FILES['urun_gorsel']["tmp_name"];
			@$name = $_FILES['urun_gorsel']["name"];
			$rastgelesayi1=rand(20000, 32000);
			$rastgelesayi2=rand(20000, 32000);
			$rastgelesayi3=rand(20000, 32000);
			$rastgelesayi4=rand(20000, 32000);
			$rastgelead=$rastgelesayi1.$rastgelesayi2.$rastgelesayi3.$rastgelesayi4;
			$refgorselyolu=substr($yukleme_dizini, 3)."/".$rastgelead.$name;
			@move_uploaded_file($tmp_name, "$yukleme_dizini/$rastgelead$name");

		$urunekle=$db->prepare("INSERT INTO urunler SET
			urun_adi=:adi,
			urun_gorsel=:gorsel,
			urun_alt=:alt,
			urun_sira=:sira,
			urun_durum=:durum");
		$ekle=$urunekle->execute(array(
			'adi' => $_POST['urun_adi'],
			'gorsel' => $refgorselyolu,
			'alt' => $_POST['urun_alt'],
			'sira' => $_POST['urun_sira'],
			'durum' => $_POST['urun_durum']
			));
		if ($ekle) {
			header("Location:urunler.php?pg=7&durum=true#urunler");
		} else {
			header("Location:urunler.php?pg=7&durum=false#urunler");
		}
	}
	#
	#ürün güncelleme
	#
	if (isset($_POST['urunguncelle'])) {

        if ($_FILES['urun_gorsel']["size"] > 0) {

			$yukleme_dizini = '../assets/img/logo';
			@$tmp_name = $_FILES['urun_gorsel']["tmp_name"];
			@$name = $_FILES['urun_gorsel']["name"];
			$rastgelesayi1=rand(20000, 32000);
			$rastgelesayi2=rand(20000, 32000);
			$rastgelesayi3=rand(20000, 32000);
			$rastgelesayi4=rand(20000, 32000);
			$rastgelead=$rastgelesayi1.$rastgelesayi2.$rastgelesayi3.$rastgelesayi4;
			$refgorselyolu=substr($yukleme_dizini, 3)."/".$rastgelead.$name;
			@move_uploaded_file($tmp_name, "$yukleme_dizini/$rastgelead$name");

			$urun_id = $_POST['urun_id'];

			$urunguncelle=$db->prepare("UPDATE urunler SET
				urun_adi=:adi,
				urun_gorsel=:gorsel,
				urun_alt=:alt,
				urun_sira=:sira,
				urun_durum=:durum
				WHERE urun_id=:id");
			$guncelle=$urunguncelle->execute(array(
				'adi' => $_POST['urun_adi'],
				'gorsel' => $refgorselyolu,
				'alt' => $_POST['urun_alt'],
				'sira' => $_POST['urun_sira'],
				'durum' => $_POST['urun_durum'],
				'id' => $urun_id
				));
			if ($guncelle) {
				$gorselsil_adres=$_POST["urun_gorsel_eski"];
				unlink("$gorselsil_adres");

				header("Location:urun-duzenle.php?pg=7&durum=true&urun_id=$urun_id");
			} else {
				header("Location:urun-duzenle.php?pg=7&durum=false&urun_id=$urun_id");
			}

		} else {
			$urun_id = $_POST['urun_id'];
			$urunguncelle=$db->prepare("UPDATE urunler SET
				urun_adi=:adi,
				urun_alt=:alt,
				urun_sira=:sira,
				urun_durum=:durum
				WHERE urun_id=:id");
			$guncelle=$urunguncelle->execute(array(
				'adi' => $_POST['urun_adi'],
				'alt' => $_POST['urun_alt'],
				'sira' => $_POST['urun_sira'],
				'durum' => $_POST['urun_durum'],
				'id' => $urun_id
				));
			if ($guncelle) {
				header("Location:urun-duzenle.php?pg=7&durum=true&urun_id=$urun_id");
			} else {
				header("Location:urun-duzenle.php?pg=7&durum=false&urun_id=$urun_id");
			}
		}	
	}
	#
	#ürün sil
	#
	if(isset($_GET['urunsil'])) {
		if ($_GET['urunsil']=="true") {
			$urunsil=$db->prepare("DELETE FROM urunler WHERE urun_id=:id");
			$sil=$urunsil->execute(array(
				'id' => $_GET['urun_id']
				));
			if ($sil) {
				header("Location:urunler.php?pg=7&durum=true#urunler");
			} else {
				header("Location:urunler.php?pg=7&durum=false#urunler");
			}
		}	
	}
####################################################################################
############					 iletişim bölümü ayarları				############
####################################################################################
	#
	#iletişim bölümü bilgi güncelleme
	#
	if (isset($_POST['iletisimguncelle'])) {
		
		$iletisimguncelle=$db->prepare("UPDATE iletisim SET
			iletisim_adres=:adres,
			iletisim_adres_url=:adres_url,
			iletisim_telefon=:telefon,
			iletisim_eposta=:eposta,
			iletisim_facebook=:facebook,
			iletisim_instagram=:instagram
			WHERE iletisim_id=:id");
		$guncelle=$iletisimguncelle->execute(array(
			'adres' => $_POST['iletisim_adres'],
			'adres_url' => $_POST['iletisim_adres_url'],
			'telefon' => $_POST['iletisim_telefon'],
			'eposta' => $_POST['iletisim_eposta'],
			'facebook' => $_POST['iletisim_facebook'],
			'instagram' => $_POST['iletisim_instagram'],
			'id' => $_POST['iletisim_id']
			));
		if($guncelle) {
			header("Location:iletisim.php?pg=10&durum=true#iletisim");
		} else {
			header("Location:iletisim.php?pg=10&durum=false#iletisim");
		}
	}
?>