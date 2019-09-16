<?php 
$yazisorgu=$db->prepare("SELECT * FROM yazilar WHERE yazi_durum=:durum");
$yazisorgu->execute(array(
    'durum' => 1
    ));
$kategoribilgisi=$db->prepare("SELECT * FROM kategoriler WHERE kategori_id=:id");
?>
<section class="latest-blog-area area-padding-top blog-area-background" id="blog">
        <div class="container">
                <h1 class="text-center">Blog</h1>
                <p class="page-description text-center">Son eklenen yazılarımız..</p>
            <div class="row" style="padding-top: 40px;">
            <?php while ($yazicek=$yazisorgu->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="col-md-4 ">
                    <div class="single-blog single-blog-background">
                        <div class="thumb">
                            <img class="img-fluid w-100" src="<?php echo $yazicek['yazi_kapak']; ?>" alt="">
                        </div>
                        <div class="single-blog-content">
                            <!-- üst kısımdakiler silindi -->
                            <!-- alt kısım kopyala-yapıştır -->
                            <div class="meta-bottom d-flex">
                                <p class="likes"><i class="ti-flag"></i>
                                <?php //yazi ablosundaki kategori id ye göre kategori tablosundan kategori adının çekilmesi
                                    $kategoribilgisi->execute(array(
                                    'id' => $yazicek['yazi_kategori']
                                    ));
                                    $kategoribilgisicek=$kategoribilgisi->fetch(PDO::FETCH_ASSOC);
                                    echo $kategoribilgisicek['kategori_adi'];
                                ?>
                                </p>
                                <p><i class="ti-time"></i> <?php echo iconv('latin5','utf-8',strftime(' %d %B %Y ',strtotime($yazicek['yazi_tarih']))); ?> </p>
                            </div>
                            <h4>
                                <a href="<?php echo $yazicek['yazi_adresi']; ?>"><?php echo $yazicek['yazi_baslik']; ?></a>
                                <!--<p><?php //echo substr($yazicek['yazi_metin'],0,100); ?></p>-->
                            </h4>
                            <div class="meta-bottom d-flex">
                                <p class="likes"><i class="ti-comments"></i> <?php echo $yazicek['yazi_yorum_sayisi']; ?></p>
                                <p><i class="ti-heart"></i> <?php echo $yazicek['yazi_begeni_sayisi']; ?> </p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <div class="container">
                    <div class="row">
                        <div class="mx-auto">
                            <a type="" class="anasayfa-baglanti" href="blog.php">Daha fazlası için tıklayınız --></a>
                        </div>  
                    </div>
                </div>
                
            </div> <!-- row end-->   
                  
        </div>
    </section>