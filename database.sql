-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 17 Eyl 2019, 10:35:21
-- Sunucu sürümü: 10.1.34-MariaDB
-- PHP Sürümü: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `dayininciftligi_web`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

CREATE TABLE `ayarlar` (
  `ayar_id` int(1) NOT NULL,
  `ayar_sitefavicon` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_sitelogo` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_siteadresi` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `meta_description` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `meta_keywords` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `meta_author` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `meta_owner` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `meta_copyright` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_recaptcha` varchar(250) COLLATE utf8_turkish_ci DEFAULT '0',
  `ayar_analytics` varchar(50) COLLATE utf8_turkish_ci DEFAULT '0',
  `ayar_smtphost` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_smtpkullanici` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_smtpparola` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_smtpport` varchar(4) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_footeryazi` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `giris_baslik` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `giris_metin` text COLLATE utf8_turkish_ci NOT NULL,
  `giris_butonyazi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `giris_butonurl` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`ayar_id`, `ayar_sitefavicon`, `ayar_sitelogo`, `ayar_siteadresi`, `meta_title`, `meta_description`, `meta_keywords`, `meta_author`, `meta_owner`, `meta_copyright`, `ayar_recaptcha`, `ayar_analytics`, `ayar_smtphost`, `ayar_smtpkullanici`, `ayar_smtpparola`, `ayar_smtpport`, `ayar_footeryazi`, `giris_baslik`, `giris_metin`, `giris_butonyazi`, `giris_butonurl`) VALUES
(1, 'img/favicon.png', 'img/logo.png', 'http://localhost/dayininciftligi-php/', 'Dayının Çiftliği | Günlük Süt - Yumurta - Kurbanlık - Adaklık', 'Dayının Çiftliği İstanbul Şile\'de kurbanlık, adaklık, süt, yumurta ve bahçe mahsülleri üretimi yapan bir aile işletmesidir.', 'kurbanlık, adaklık, süt, yumurta', '', '', '', '6LfcECAUAAAAAPiRhbvWlOqh1lW8jxwGuxYsU8Ov', '', 'mail.siteadiniz.com', 'eposta@siteadiniz.com', 'parolanız', '25', '2019 - dayininciftligi.com', 'Hoş Geldiniz', 'Merhabalar, sitemizi kullanarak hakkımızda detaylı bilgiye ulaşabilir, bizimle irtibata geçebilir veya kendi ürettiğimiz doğal ürünlerden sipariş verebilirsiniz.', 'İLETİŞİME GEÇİN', 'index.php#iletisim');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bolumler`
--

CREATE TABLE `bolumler` (
  `bolum_id` int(2) NOT NULL,
  `bolum_adi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `bolum_baslik` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `bolum_altbaslik` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `bolum_sira` int(2) NOT NULL DEFAULT '0',
  `bolum_durum` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `bolumler`
--

INSERT INTO `bolumler` (`bolum_id`, `bolum_adi`, `bolum_baslik`, `bolum_altbaslik`, `bolum_sira`, `bolum_durum`) VALUES
(1, 'giris', 'Anasayfa', '', 1, 1),
(2, 'urunler', 'Ürünlerimiz', '', 2, 1),
(3, 'galeri', 'Galeri', 'Dayının Çiftliğinden Görseller', 3, 1),
(4, 'blog', 'Blog', 'Son Yazılarımız', 4, 1),
(5, 'iletisim', 'İletişim', '', 5, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `deneme`
--

CREATE TABLE `deneme` (
  `deneme_id` int(11) NOT NULL,
  `deneme_adi` varchar(25) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `deneme`
--

INSERT INTO `deneme` (`deneme_id`, `deneme_adi`) VALUES
(1, 'deneme bir'),
(2, 'deneme iki');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `galeri`
--

CREATE TABLE `galeri` (
  `gorsel_id` int(11) NOT NULL,
  `gorsel_alt` varchar(255) COLLATE utf8_turkish_ci NOT NULL DEFAULT 'Dayının Çiftliğinden Görseller',
  `gorsel_adresi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `gorsel_durum` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `galeri`
--

INSERT INTO `galeri` (`gorsel_id`, `gorsel_alt`, `gorsel_adresi`, `gorsel_durum`) VALUES
(1, 'Dayının Çiftliğinden Görseller', 'img/galeri/1.jpg', 1),
(2, 'Dayının Çiftliğinden Görseller', 'img/galeri/2.jpg', 1),
(3, 'Dayının Çiftliğinden Görseller', 'img/galeri/3.jpg', 1),
(4, 'Dayının Çiftliğinden Görseller', 'img/galeri/4.jpg', 1),
(5, 'Dayının Çiftliğinden Görseller', 'img/galeri/5.jpg', 1),
(6, 'Dayının Çiftliğinden Görseller', 'img/galeri/6.jpg', 1),
(7, 'Dayının Çiftliğinden Görseller', 'img/galeri/7.jpg', 1),
(8, 'Dayının Çiftliğinden Görseller', 'img/galeri/8.jpg', 1),
(9, 'Dayının Çiftliğinden Görseller', 'img/galeri/9.jpg', 1),
(10, 'Dayının Çiftliğinden Görseller', 'img/galeri/10.jpg', 1),
(11, 'Dayının Çiftliğinden Görseller', 'img/galeri/11.jpg', 1),
(12, 'Dayının Çiftliğinden Görseller', 'img/galeri/12.jpg', 1),
(13, 'Dayının Çiftliğinden Görseller', 'img/galeri/13.jpg', 1),
(14, 'Dayının Çiftliğinden Görseller', 'img/galeri/14.jpg', 1),
(15, 'Dayının Çiftliğinden Görseller', 'img/galeri/15.jpg', 1),
(16, 'Dayının Çiftliğinden Görseller', 'img/galeri/16.jpg', 1),
(17, 'Dayının Çiftliğinden Görseller', 'img/galeri/17.jpg', 1),
(18, 'Dayının Çiftliğinden Görseller', 'img/galeri/18.jpg', 1),
(19, 'Dayının Çiftliğinden Görseller', 'img/galeri/19.jpg', 1),
(20, 'Dayının Çiftliğinden Görseller', 'img/galeri/20.jpg', 1),
(21, 'Dayının Çiftliğinden Görseller', 'img/galeri/21.jpg', 1),
(22, 'Dayının Çiftliğinden Görseller', 'img/galeri/22.jpg', 1),
(23, 'Dayının Çiftliğinden Görseller', 'img/galeri/23.jpg', 1),
(24, 'Dayının Çiftliğinden Görseller', 'img/galeri/24.jpg', 1),
(25, 'Dayının Çiftliğinden Görseller', 'img/galeri/25.jpg', 1),
(26, 'Dayının Çiftliğinden Görseller', 'img/galeri/26.jpg', 1),
(27, 'Dayının Çiftliğinden Görseller', 'img/galeri/27.jpg', 1),
(28, 'Dayının Çiftliğinden Görseller', 'img/galeri/28.jpg', 1),
(29, 'Dayının Çiftliğinden Görseller', 'img/galeri/29.jpg', 1),
(30, 'Dayının Çiftliğinden Görseller', 'img/galeri/30.jpg', 1),
(31, 'Dayının Çiftliğinden Görseller', 'img/galeri/31.jpg', 1),
(32, 'Dayının Çiftliğinden Görseller', 'img/galeri/32.jpg', 1),
(33, 'Dayının Çiftliğinden Görseller', 'img/galeri/33.jpg', 1),
(34, 'Dayının Çiftliğinden Görseller', 'img/galeri/34.jpg', 1),
(35, 'Dayının Çiftliğinden Görseller', 'img/galeri/35.jpg', 1),
(36, 'Dayının Çiftliğinden Görseller', 'img/galeri/36.jpg', 1),
(37, 'Dayının Çiftliğinden Görseller', 'img/galeri/37.jpg', 1),
(38, 'Dayının Çiftliğinden Görseller', 'img/galeri/38.jpg', 1),
(39, 'Dayının Çiftliğinden Görseller', 'img/galeri/39.jpg', 1),
(40, 'Dayının Çiftliğinden Görseller', 'img/galeri/40.jpg', 1),
(41, 'Dayının Çiftliğinden Görseller', 'img/galeri/41.jpg', 1),
(42, 'Dayının Çiftliğinden Görseller', 'img/galeri/42.jpg', 1),
(43, 'Dayının Çiftliğinden Görseller', 'img/galeri/43.jpg', 1),
(44, 'Dayının Çiftliğinden Görseller', 'img/galeri/44.jpg', 1),
(45, 'Dayının Çiftliğinden Görseller', 'img/galeri/45.jpg', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iletisim`
--

CREATE TABLE `iletisim` (
  `iletisim_id` int(2) NOT NULL,
  `iletisim_adres` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `iletisim_adres_url` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `iletisim_telefon` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `iletisim_eposta` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `iletisim_facebook` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `iletisim_instagram` varchar(50) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci COMMENT='Site iletişim bilgileri';

--
-- Tablo döküm verisi `iletisim`
--

INSERT INTO `iletisim` (`iletisim_id`, `iletisim_adres`, `iletisim_adres_url`, `iletisim_telefon`, `iletisim_eposta`, `iletisim_facebook`, `iletisim_instagram`) VALUES
(1, 'Çayırbaşı Köyü, Şile / İSTANBUL', 'https://goo.gl/maps/kS3tz3MJMsGnDjVW9', '+90 (533) 931 8226', 'dayininciftligisile@gmail.com', 'dayininciftligi', 'dayininciftligi');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategoriler`
--

CREATE TABLE `kategoriler` (
  `kategori_id` int(3) NOT NULL,
  `kategori_ust_id` int(3) NOT NULL DEFAULT '0',
  `kategori_adi` varchar(32) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kategoriler`
--

INSERT INTO `kategoriler` (`kategori_id`, `kategori_ust_id`, `kategori_adi`) VALUES
(1, 5, 'Büyükbaş Hayvancılık'),
(2, 5, 'Küçükbaş Hayvancılık'),
(3, 5, 'Kümes Hayvanları'),
(4, 0, 'Tarım'),
(5, 0, 'Hayvancılık'),
(6, 0, 'Etkinlik');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `navbar`
--

CREATE TABLE `navbar` (
  `nav_id` int(11) NOT NULL,
  `nav_adi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `nav_url` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `nav_durum` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `navbar`
--

INSERT INTO `navbar` (`nav_id`, `nav_adi`, `nav_url`, `nav_durum`) VALUES
(1, 'Anasayfa', 'index.php#giris', 1),
(2, 'Ürünlerimiz', 'index.php#urunler', 1),
(3, 'Galeri', 'index.php#galeri', 1),
(4, 'Blog', 'index.php#blog', 1),
(5, 'İletişim', 'index.php#iletisim', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sayfalar`
--

CREATE TABLE `sayfalar` (
  `sayfa_id` int(3) NOT NULL,
  `sayfa_adi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `sayfa_baslik` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `sayfa_durum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

CREATE TABLE `urunler` (
  `urun_id` int(11) NOT NULL,
  `urun_alt` varchar(255) COLLATE utf8_turkish_ci NOT NULL DEFAULT 'Dayının Çiftliği Ürünler',
  `urun_adresi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `urun_durum` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `urunler`
--

INSERT INTO `urunler` (`urun_id`, `urun_alt`, `urun_adresi`, `urun_durum`) VALUES
(1, 'Dayının Çiftliği Ürünler', 'img/logo/1.png', 1),
(2, 'Dayının Çiftliği Ürünler', 'img/logo/2.png', 1),
(3, 'Dayının Çiftliği Ürünler', 'img/logo/3.png', 1),
(4, 'Dayının Çiftliği Ürünler', 'img/logo/4.png', 1),
(5, 'Dayının Çiftliği Ürünler', 'img/logo/5.png', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yazilar`
--

CREATE TABLE `yazilar` (
  `yazi_id` int(11) NOT NULL,
  `yazi_tarih` date NOT NULL,
  `yazi_sira` int(11) NOT NULL DEFAULT '0',
  `yazi_kapak_kucuk` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `yazi_kapak` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `yazi_gorsel` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `yazi_baslik` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `yazi_metin` text COLLATE utf8_turkish_ci NOT NULL,
  `yazi_ozet` text COLLATE utf8_turkish_ci NOT NULL,
  `yazi_yazar` varchar(32) COLLATE utf8_turkish_ci NOT NULL,
  `yazi_durum` int(1) NOT NULL DEFAULT '1',
  `yazi_kategori` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `yazi_anahtarkelime` text COLLATE utf8_turkish_ci NOT NULL,
  `yazi_yorum_sayisi` int(11) NOT NULL DEFAULT '0',
  `yazi_begeni_sayisi` int(11) NOT NULL DEFAULT '0',
  `yazi_adresi` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yazilar`
--

INSERT INTO `yazilar` (`yazi_id`, `yazi_tarih`, `yazi_sira`, `yazi_kapak_kucuk`, `yazi_kapak`, `yazi_gorsel`, `yazi_baslik`, `yazi_metin`, `yazi_ozet`, `yazi_yazar`, `yazi_durum`, `yazi_kategori`, `yazi_anahtarkelime`, `yazi_yorum_sayisi`, `yazi_begeni_sayisi`, `yazi_adresi`) VALUES
(1, '2019-07-09', 0, 'img/blog/kucuk-kapak/buzagi-blog-gorsel.jpg', 'img/blog/buyuk-kapak/pasa-kapak1.jpg', 'img/blog/yazi-gorsel/pasa-kapak.jpg', 'Şile Buzağı Güzellik Yarışması', '<p>Nurcan KIRCALI/İSTANBUL,(DHA)</p>\r\n                            <p class=\"excert\">\r\n                                    Şile\'de düzenlenen buzağı güzellik yarışması renkli görüntülere sahne oldu.\r\n                            </p>\r\n                            <p>\r\n                                    Şile İlçe Tarım ve Orman Müdürlüğü tarafından buzağı güzellik yarışması düzenlendi. Teke Mahallesi\'nde düzenlenen yarışmada, ilçenin farklı köylerinden getirilen 24 buzağı yer aldı. Buzağılar erkek ve dişi olarak 2 kategoride yarıştı. Sahipleri buzağıları sırasıyla jürinin karşısına çıkardı. Jürinin değerlendirmesi sonucu dişi buzağı kategorisinde birinciliği Fazlı Abay\'ın buzağısı kazandı.\r\n                            </p>\r\n                            <p>\r\n                                    Erkek buzağı kategorisinde ise <b style=\"color: #94fc13;\">Mehmet Koyuncu</b>\'nun buzağısı ise birinci oldu. Yarışmada birinci olan buzağıların sahiplerine 500\'er kilo yem verildi. Yarışmayla ilgili konuşan  Şile Belediye Başkanı İlhan Ocaklı yarışmanın ilk defa yapıldığını fakat geleneksel hale getirmeyi planladıklarını söyledi.  Ocaklı, \"Bizler belediye olarak ilçemizde tarımın ve hayvancılığın desteklenmesi anlamında önemli projelerin olduğunu düşünüyor, bu yarışmayı da hayvan yetiştiricilerini teşvik etmek anlamında bir başlangıç olarak görüyoruz\" diye konuştu.\r\n                            </p>\r\n                            <div class=\"\">\r\n                                <iframe width=\"100%\" height=\"480\" src=\"https://www.youtube.com/embed/0LxWYfyg5YM\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>\r\n                            </div>\r\n                            <p>\r\n\r\n                            </p>', 'Şile İlçe Tarım ve Orman Müdürlüğü tarafından buzağı güzellik yarışması düzenlendi. Teke Mahallesi\'nde düzenlenen yarışmada, ilçenin farklı köylerinden getirilen 24 buzağı yer aldı.', 'Dayının Çiftliği', 1, '6', 'Şile buzağu güzellik yarışması, buzağı, şilei yarışma', 3, 5, 'single-post.php'),
(2, '2019-07-11', 0, 'img/blog/kucuk-kapak/blog-kucukkapak2.jpg', 'img/blog/buyuk-kapak/blog-kapak2.jpg', 'img/blog/yazi-gorsel/2.jpg', 'Damızlık Koyun Seçimi', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ante elit, accumsan vel ultrices ut, mattis at lacus. Phasellus scelerisque ornare risus, in volutpat leo aliquet non. Praesent in lacinia sem. Mauris ultricies orci ipsum, ac consectetur erat sagittis id. Morbi accumsan lobortis lectus. Integer at libero aliquet, posuere massa quis, varius nisi. Nullam feugiat turpis vitae ligula cursus molestie. Suspendisse a quam fermentum, bibendum purus vitae, consequat sapien. Aenean luctus eleifend ex congue elementum.\r\n\r\nDuis placerat ex metus, in mollis nunc convallis ac. Donec lorem massa, euismod eu pharetra sit amet, auctor sit amet risus. Aliquam erat volutpat. Mauris vitae massa vel velit pretium egestas. Nunc dictum diam in dapibus vulputate. Quisque eu tincidunt risus, id faucibus mauris. Cras eleifend massa imperdiet mattis venenatis. Mauris tempor tempor mollis. Vestibulum est metus, rhoncus vel laoreet et, gravida ut ex. Mauris auctor dolor pharetra quam elementum, ac fringilla enim mollis. Nulla at bibendum dolor. Proin iaculis consectetur turpis, vel aliquam purus blandit blandit.\r\n\r\nMorbi facilisis turpis lorem, eu porttitor sem vehicula ut. Phasellus blandit nibh nec neque suscipit facilisis. Nullam ut eros augue. Interdum et malesuada fames ac ante ipsum primis in faucibus. Phasellus leo risus, fringilla ut gravida non, congue nec nisl. Ut maximus ut orci et vehicula. Nunc maximus porta libero, vel porta ligula venenatis ut. Etiam faucibus, quam vel scelerisque gravida, diam odio semper enim, ut accumsan tellus mauris quis eros. Donec aliquam mi ex, ac suscipit magna dapibus vitae. Morbi sodales bibendum neque in interdum. Pellentesque imperdiet euismod lacus et cursus. Vestibulum aliquet velit risus, consequat egestas ipsum fermentum vitae. In sodales neque neque, sit amet rhoncus nisl lacinia sed. Aliquam tempor dui vel dui pellentesque gravida. Aenean rutrum nec metus eget egestas.\r\n\r\nMorbi a consectetur dui, nec hendrerit quam. Quisque porta turpis id fermentum luctus. Sed tempor, eros non molestie scelerisque, metus lorem gravida mi, eu molestie ligula diam sed odio. Sed finibus enim sed urna iaculis rutrum. Maecenas lacinia eu eros in varius. Duis quis consequat magna. In sodales justo eget neque varius, sit amet pellentesque enim venenatis. Fusce aliquam, mi at vulputate mollis, ligula dolor commodo sem, sed hendrerit ex felis dictum velit. In ornare dignissim ex, sed hendrerit ex mattis id. Donec metus metus, vulputate sed elementum id, bibendum a turpis. Curabitur libero magna, eleifend dapibus dictum id, iaculis ac ante. Phasellus diam enim, pretium ornare ligula non, tempor molestie nibh. Integer pretium fringilla scelerisque.\r\n\r\nQuisque ac turpis eu velit feugiat accumsan. Vivamus ut augue ac odio porta placerat facilisis dignissim neque. Aenean at felis ac nulla finibus lobortis ac id lectus. Proin mollis turpis sed est imperdiet ullamcorper. Cras rutrum sagittis erat in ultrices. Vivamus eget egestas tellus. Donec scelerisque erat non pellentesque tristique. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus accumsan eros vel tellus facilisis, sit amet cursus massa hendrerit.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ante elit, accumsan vel ultrices ut, mattis at lacus. Phasellus scelerisque ornare risus, in volutpat leo aliquet non. Praesent in lacinia sem.', 'Dayının Çiftliği', 1, '2', 'Koyun, Küçükbaş, Damızlık, Damızlık Seçimi', 15, 27, 'single-post2.php');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ayarlar`
--
ALTER TABLE `ayarlar`
  ADD PRIMARY KEY (`ayar_id`);

--
-- Tablo için indeksler `bolumler`
--
ALTER TABLE `bolumler`
  ADD PRIMARY KEY (`bolum_id`);

--
-- Tablo için indeksler `deneme`
--
ALTER TABLE `deneme`
  ADD PRIMARY KEY (`deneme_id`);

--
-- Tablo için indeksler `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`gorsel_id`);

--
-- Tablo için indeksler `iletisim`
--
ALTER TABLE `iletisim`
  ADD PRIMARY KEY (`iletisim_id`);

--
-- Tablo için indeksler `kategoriler`
--
ALTER TABLE `kategoriler`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Tablo için indeksler `navbar`
--
ALTER TABLE `navbar`
  ADD PRIMARY KEY (`nav_id`);

--
-- Tablo için indeksler `sayfalar`
--
ALTER TABLE `sayfalar`
  ADD PRIMARY KEY (`sayfa_id`);

--
-- Tablo için indeksler `urunler`
--
ALTER TABLE `urunler`
  ADD PRIMARY KEY (`urun_id`);

--
-- Tablo için indeksler `yazilar`
--
ALTER TABLE `yazilar`
  ADD PRIMARY KEY (`yazi_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ayarlar`
--
ALTER TABLE `ayarlar`
  MODIFY `ayar_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `bolumler`
--
ALTER TABLE `bolumler`
  MODIFY `bolum_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `deneme`
--
ALTER TABLE `deneme`
  MODIFY `deneme_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `galeri`
--
ALTER TABLE `galeri`
  MODIFY `gorsel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Tablo için AUTO_INCREMENT değeri `iletisim`
--
ALTER TABLE `iletisim`
  MODIFY `iletisim_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `kategoriler`
--
ALTER TABLE `kategoriler`
  MODIFY `kategori_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `navbar`
--
ALTER TABLE `navbar`
  MODIFY `nav_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `sayfalar`
--
ALTER TABLE `sayfalar`
  MODIFY `sayfa_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `urunler`
--
ALTER TABLE `urunler`
  MODIFY `urun_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `yazilar`
--
ALTER TABLE `yazilar`
  MODIFY `yazi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
