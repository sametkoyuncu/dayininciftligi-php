<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>
<?php include "includes/hero-banner.php"; ?>
<?php
    $galerisorgu=$db->prepare("SELECT * FROM galeri WHERE gorsel_durum=:durum");
    $galerisorgu->execute(array(
        'durum' => 1
        ));
?>
    <!--================ Galeri Area ====================-->

    <section class="service-area area-padding-bottom" style="padding-top: 40px;" id="galeri">
     <div class="container">
         <!--
            <h1 class="text-center">Galeri</h1>    
            <p class="page-description text-center">Dayının Çiftliğinden Görseller</p>
         -->
         <h3 class="page-description text-center"></h3>
            
            <div class="tz-gallery">
        
                <div class="row">
                <?php while ($galericek=$galerisorgu->fetch(PDO::FETCH_ASSOC)) { ?>
                    <div class="col-sm-6 col-md-4">
                        <a class="lightbox" href="<?php echo $galericek['gorsel_adresi']; ?>">
                            <img src="<?php echo $galericek['gorsel_adresi']; ?>" alt="<?php echo $galericek['gorsel_alt']; ?>">
                        </a>
                    </div>
                <?php } ?>
                </div>
            </div>
        </div>            
    </section>
    <!--================Galeri Area End==================-->
<?php include "includes/footer.php"; ?>