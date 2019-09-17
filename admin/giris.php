<!-- navbar menü -->
<?php include "includes/header.php"; ?>
<?php include "includes/header-area.php"; ?>
<?php include "includes/page-title-area.php"; ?>
<?php 
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
                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Metin</label>
                            <!--<input class="form-control" type="text" value="<?php #echo $giriscek['giris_yazi']; ?>" id="example-text-input">-->
                            <textarea class="form-control" aria-label="With textarea"><?php echo $giriscek['giris_yazi']; ?></textarea>
                        </div>
                        <div class="form-group">
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