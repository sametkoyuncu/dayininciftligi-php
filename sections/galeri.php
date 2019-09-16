<?php 
$galerisorgu=$db->prepare("SELECT * FROM galeri WHERE gorsel_durum=:durum LIMIT 0, 9");
$galerisorgu->execute(array(
    'durum' => 1
    ));
?>
<section class="galeri area-padding-top" id="galeri">
     <div class="container">
            <h1 class="text-center">Galeri</h1>
                
            <p class="page-description text-center">Dayının Çiftliğinden Görseller</p>
            
            <div class="tz-gallery">
        
                <div class="row">
                    <?php while ($galericek=$galerisorgu->fetch(PDO::FETCH_ASSOC)) { ?>
                        <div class="col-sm-6 col-md-4">
                            <a class="lightbox" href="<?php echo $galericek['gorsel_adresi']; ?>">
                                <img src="<?php echo $galericek['gorsel_adresi']; ?>" alt="<?php echo $galericek['gorsel_alt']; ?>">
                            </a>
                        </div>
                    <?php } ?>
                    <div class="mx-auto">
                        <a type="" class="anasayfa-baglanti" href="galeri.php">Daha fazlası için tıklayınız --></a>
                    </div>
                </div>
        
            </div>
        
        </div>
                    
    </section>