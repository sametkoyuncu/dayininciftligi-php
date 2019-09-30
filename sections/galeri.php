<?php
$bolumsorgu = $db->prepare("SELECT * FROM bolumler WHERE bolum_adi=:adi");
$bolumsorgu->execute(array(
    'adi' => 'galeri'
));
$bolumcek = $bolumsorgu->fetch(PDO::FETCH_ASSOC);

$galerisorgu = $db->prepare("SELECT * FROM galeri WHERE gorsel_durum=:durum LIMIT 0, 9");
$galerisorgu->execute(array(
    'durum' => 1
));
?>
<section class="galeri area-padding-top" id="galeri">
    <div class="container">
        <h1 class="text-center"><?php echo $bolumcek['bolum_baslik']; ?></h1>
        <p class="page-description text-center"><?php echo $bolumcek['bolum_altbaslik']; ?></p>

        <div class="tz-gallery">

            <div class="row">
                <?php while ($galericek = $galerisorgu->fetch(PDO::FETCH_ASSOC)) { ?>
                    <div class="col-sm-6 col-md-4">
                        <a class="lightbox" href="<?php echo $galericek['gorsel_url']; ?>">
                            <img src="<?php echo $galericek['gorsel_url']; ?>" alt="<?php echo $galericek['gorsel_alt']; ?>">
                        </a>
                    </div>
                <?php } ?>
                <div class="mx-auto">
                    <a type="" class="anasayfa-baglanti" href="<?php echo $bolumcek['bolum_buton_url']; ?>"><?php echo $bolumcek['bolum_buton_yazi']; ?></a>
                </div>
            </div>

        </div>

    </div>

</section>