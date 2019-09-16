<?php 
$urunsorgu=$db->prepare("SELECT * FROM urunler WHERE urun_durum=:durum");
$urunsorgu->execute(array(
    'durum' => 1
    ));
?>
<section class="brands-area area-padding-top" id="urunler">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="owl-carousel brand-carousel">
                    <?php while ($uruncek=$urunsorgu->fetch(PDO::FETCH_ASSOC)) { ?>
                        <!-- single-brand -->
                        <div class="single-brand-item d-table">
                            <div class="d-table-cell">
                                <img src="<?php echo $uruncek['urun_adresi']; ?>" alt="<?php echo $uruncek['urun_alt']; ?>">
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>