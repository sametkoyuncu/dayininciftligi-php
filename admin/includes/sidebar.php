<?php 
/*
Sayfa id'leri
1 index          |  2 raporlar      |  3 genel bilgiler  |  4 meta            |  5 üst kısım      
6 giris          |  7 ürünler       |  8 galeri          |  9 blog            |  10 iletişim 
11 alt kısım     |  12
*/
?>
<div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="index.html"><img src="assets/images/icon/logo.png" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <!-- açık olan sayfanın satırına 'active' classı ekleme -->
                            <!-- page id ye göre class ekliyor -->
                            <li <?php if($page_id==1 || $page_id==2){ echo 'class="active"';} ?>>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>Kontrol Paneli</span></a>
                                <ul class="collapse">
                                    <li <?php if($page_id==1){ echo 'class="active"';} ?>><a href="index.php?pg=1">Anasayfa</a></li>
                                    <li <?php if($page_id==2){ echo 'class="active"';} ?>><a href="raporlar.php?pg=2">Raporlar</a></li>
                                </ul>
                            </li>
                            <hr style="border:0.5px solid darkslategrey">
                            <li <?php if($page_id==3 || $page_id==4){ echo 'class="active"';} ?>>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-id-badge"></i><span>Site Ayarları
                                    </span></a>
                                <ul class="collapse">
                                <li <?php if($page_id==3){ echo 'class="active"';} ?>><a href="site-genel-ayarlar.php?pg=3">Genel Ayarlar</a></li>   
                                <li <?php if($page_id==4){ echo 'class="active"';} ?>><a href="#">Pasif</a></li>
                                </ul>
                            </li>
                            <li <?php if($page_id>=5 && $page_id<=11){ echo 'class="active"';} ?>>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-grid2"></i><span>Anasayfa Bölümleri
                                    </span></a>
                                <ul class="collapse">
                                <li <?php if($page_id==5){ echo 'class="active"';} ?>><a href="ust-kisim.php?pg=5">Üst Kısım</a></li>
                                <li <?php if($page_id==6){ echo 'class="active"';} ?>><a href="giris.php?pg=6">Giriş</a></li>
                                <li <?php if($page_id==7){ echo 'class="active"';} ?>><a href="urunler.php?pg=7">Ürünler</a></li>
                                <li <?php if($page_id==8){ echo 'class="active"';} ?>><a href="galeri.php?pg=8">Galeri</a></li>
                                <li <?php if($page_id==9){ echo 'class="active"';} ?>><a href="blog.php?pg=9">Blog</a></li>
                                <li <?php if($page_id==10){ echo 'class="active"';} ?>><a href="iletisim.php?pg=10">İletişim</a></li>
                                <li <?php if($page_id==11){ echo 'class="active"';} ?>><a href="alt-kisim.php?pg=11">Alt Kısım</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-file"></i><span>Tekil Sayfalar
                                    </span></a>
                                <ul class="collapse">
                                <li class=""><a href="index.php">Çoklu Yazı Sayfası</a></li>   
                                <li class=""><a href="index.php">Tekil Yazı Sayfası</a></li>
                                <li class=""><a href="index.php">Sağ Sütun</a></li>
                                </ul>
                            </li>
                            <!--<li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Sayfalar
                                    </span></a>
                                <ul class="collapse">
                                <li class=""><a href="index.php">Tüm Sayfalar</a></li>
                                <li class=""><a href="index.php">Yeni Ekle</a></li>
                                </ul>
                            </li>-->
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-book"></i><span>Yazılar
                                    </span></a>
                                <ul class="collapse">
                                <li class=""><a href="index.php">Tüm Yazılar</a></li>
                                <li class=""><a href="index.php">Yeni Ekle</a></li>
                                <li class=""><a href="index.php">Kategoriler</a></li>
                                <li class=""><a href="index.php">Etiketler</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-comments-smiley"></i><span>Yorumlar
                                    </span></a>
                                <ul class="collapse">
                                <li class=""><a href="index.php">Onaylananlar</a></li>
                                <li class=""><a href="index.php">Onay Bekleyenler</a></li>
                                <li class=""><a href="index.php">Çöp</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-right"></i><span>Bileşenler
                                    </span></a>
                                <ul class="collapse">
                                <li class=""><a href="index.php">Tüm Bileşenler</a></li>
                                <li class=""><a href="index.php">Yeni Ekle</a></li>
                                </ul>
                            </li>
                            <hr style="border:0.5px solid darkslategrey">
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-email"></i><span>E-Postalar
                                    </span></a>
                                <ul class="collapse">
                                <li class=""><a href="index.php">Okunmamış</a></li>
                                <li class=""><a href="index.php">Arşiv</a></li>
                                <li class=""><a href="index.php">Çöp</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-user"></i><span>Aboneler
                                    </span></a>
                                <ul class="collapse">
                                <li class=""><a href="index.php">Tüm Aboneler</a></li>
                                <li class=""><a href="index.php">Yeni Ekle</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>