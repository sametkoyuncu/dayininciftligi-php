<!-- navbar menü -->
<?php include "includes/header.php"; ?>
<?php include "includes/header-area.php"; ?>
<?php include "includes/page-title-area.php"; ?>
<?php 
    $bolumsorgu=$db->prepare("SELECT * FROM bolumler WHERE bolum_adi=:adi");
    $bolumsorgu->execute(array(
        'adi' => 'giris'
        ));
    $bolumcek=$bolumsorgu->fetch(PDO::FETCH_ASSOC);

    $girissorgu=$db->prepare("SELECT * FROM giris WHERE giris_id=:id");
    $girissorgu->execute(array(
        'id' => 1
        ));
    $giriscek=$girissorgu->fetch(PDO::FETCH_ASSOC);
?>
        <div class="main-content-inner">
             
            <!-- Textual inputs start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Giriş Bölümü Ayarları</h4>
                        <p class="text-muted font-14 mb-4">Bu sayfada, site açıldığında ilk gözüken kısım olan 'giriş ekranını' düzenleyebilirsiniz.</p>
                        <hr>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Bölüm Sırası</label>
                                <input class="form-control" type="text" value="<?php echo $bolumcek['bolum_sira']; ?>" id="example-text-input">
                                    <div class="valid-feedback">
                                       İyi gözüküyor!
                                    </div>
                            </div>  
                            <div class="col-md-6 mb-3">
                                <label class="col-form-label">Bölüm Görünürlüğü</label>
                                <select class="custom-select">
                                    <?php 
                                    if($bolumcek['bolum_durum']=='1') { ?>
                                    <option value="1">Göster</option>
                                    <option value="0">Gizle</option>
                                    <?php } else { ?> 
                                    <option value="0">Gizle</option>
                                    <option value="1">Göster</option>
                                    <?php } ?>
                                </select>
                            </div>                   
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Başlık</label>
                                <input class="form-control" type="text" value="<?php echo $giriscek['giris_baslik']; ?>" id="example-text-input">
                                    <div class="valid-feedback">
                                       İyi gözüküyor!
                                    </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Buton Yazısı</label>
                                <input class="form-control" type="text" value="<?php echo $giriscek['giris_buton_yazi']; ?>" id="example-text-input">
                                    <div class="valid-feedback">
                                       İyi gözüküyor!
                                    </div>
                            </div>  
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Buton Bağlantısı</label>
                                <input class="form-control" type="text" value="<?php echo $giriscek['giris_buton_baglanti']; ?>" id="example-text-input">
                                    <div class="valid-feedback">
                                       İyi gözüküyor!
                                    </div>
                            </div>                   
                        </div>
                        <div class="form-row mb-3">
                            <label for="example-text-input" class="col-form-label">Metin</label>
                            <!--<input class="form-control" type="text" value="<?php #echo $giriscek['giris_yazi']; ?>" id="example-text-input">-->
                            <textarea class="form-control" aria-label="With textarea"><?php echo $giriscek['giris_yazi']; ?></textarea>
                        </div>
                        <div class="form-row">
                            <label for="example-text-input" class="col-form-label">Arkaplan Görseli</label>
                            <img src="<?php echo $giriscek['giris_arkaplan']; ?>" alt="">
                        </div>
                        <hr>
                        <div class="col-auto text-right">
                            <button type="submit" class="btn btn-rounded btn-primary">Kaydet</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Textual inputs end -->
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