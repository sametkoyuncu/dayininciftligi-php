<!-- navbar menü -->
<?php include "includes/header.php"; ?>
<?php include "includes/header-area.php"; ?>
<?php include "includes/page-title-area.php"; ?>
<?php 
    $ayarsorgu=$db->prepare("SELECT * FROM ayarlar WHERE ayar_id=:id");
    $ayarsorgu->execute(array(
        'id' => 1
        ));
    $ayarcek=$ayarsorgu->fetch(PDO::FETCH_ASSOC);

    $iletisimsorgu=$db->prepare("SELECT * FROM iletisim WHERE iletisim_id=:id");
    $iletisimsorgu->execute(array(
        'id' => 1
        ));
    $iletisimcek=$iletisimsorgu->fetch(PDO::FETCH_ASSOC);
?>
        <div class="main-content-inner">
             
            <!-- 1. bölüm start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">1. Bölüm - Hakkımızda Özet</h4>
                        <p class="text-muted font-14 mb-4">Bu kısımda sitenin alt kısmında bulunan 1. (en soldaki) bölümü düzenleyebilirsiniz.</p>
                        <hr>
                        <div class="form-row">
                            <div class="col-md-4 text-center">
                                <img src="assets/images/footer/1.png" class="rounded" alt="">
                            </div>
                            <div class="col-md-8">
                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom01">Başlık</label>
                                    <input class="form-control" type="text" value="<?php echo $ayarcek['ayar_sitelogo']; ?>" id="example-text-input">
                                        <div class="valid-feedback">
                                        İyi gözüküyor!
                                        </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom01">Metin</label>
                                    <textarea class="form-control" aria-label="With textarea"></textarea>
                                        <div class="valid-feedback">
                                        İyi gözüküyor!
                                        </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom01">Görsel Adresi</label>
                                    <input class="form-control" type="text" value="<?php echo $ayarcek['ayar_sitelogo']; ?>" id="example-text-input">
                                        <div class="valid-feedback">
                                        İyi gözüküyor!
                                        </div>
                                </div>
                            </div>  
                        </div>
                        <hr>
                        <div class="col-auto text-right">
                            <button type="submit" class="btn btn-rounded btn-kaydet">Kaydet</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 1. bölüm end -->
            <!-- 4. bölüm start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">4. Bölüm - Abone Kayıt</h4>
                        <p class="text-muted font-14 mb-4">Bu kısımda sitenin alt kısmında bulunan 1. (en soldaki) bölümü düzenleyebilirsiniz.</p>
                        <hr>
                        <div class="form-row">
                            <div class="col-md-4 text-center">
                                <img src="assets/images/footer/4.png" class="rounded" alt="">
                            </div>
                            <div class="col-md-8">
                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom01">Başlık</label>
                                    <input class="form-control" type="text" value="<?php echo $ayarcek['ayar_sitelogo']; ?>" id="example-text-input">
                                        <div class="valid-feedback">
                                        İyi gözüküyor!
                                        </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom01">Metin</label>
                                    <textarea class="form-control" aria-label="With textarea"></textarea>
                                        <div class="valid-feedback">
                                        İyi gözüküyor!
                                        </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom01">Giriş Alanı Metni</label>
                                    <input class="form-control" type="text" value="<?php echo $ayarcek['ayar_sitelogo']; ?>" id="example-text-input">
                                        <div class="valid-feedback">
                                        İyi gözüküyor!
                                        </div>
                                </div>
                            </div>  
                        </div>
                        <hr>
                        <div class="col-auto text-right">
                            <button type="submit" class="btn btn-rounded btn-kaydet">Kaydet</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 1. bölüm end -->
          
            
            
            
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <?php include "includes/footer.php"; ?>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    <!-- offset area start -->
    <?php include "includes/offset-area.php"; ?>
    <!-- offset area end -->
    <?php include "includes/last-area.php"; ?>