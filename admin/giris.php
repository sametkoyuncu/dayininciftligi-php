<!-- navbar menü -->
<?php include "includes/header.php"; ?>
<?php include "includes/header-area.php"; ?>
<?php include "includes/page-title-area.php"; ?>
<?php include "includes/alerts.php"; ?>
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
    $giris_arkaplan = $giriscek['giris_arkaplan'];
?>
        <div class="main-content-inner">
             
            <!-- Textual inputs start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Giriş Bölümü Ayarları</h4>
                        <p class="text-muted font-14 mb-4">Bu sayfada, site açıldığında ilk gözüken kısım olan 'giriş ekranını' düzenleyebilirsiniz.</p>
                        <hr>
                        <form action="islem.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="giris_arkaplan_eski" value="<?php echo $giris_arkaplan; ?>">
                            <input type="hidden" name="giris_id" value="<?php echo $giriscek['giris_id']; ?>">
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom01">Bölüm Sırası</label>
                                    <input class="form-control" type="text" value="<?php echo $bolumcek['bolum_sira']; ?>" id="example-text-input" disabled>
                                        <div class="valid-feedback">
                                        İyi gözüküyor!
                                        </div>
                                </div>  
                                <div class="col-md-6 mb-3">
                                    <label class="col-form-label">Bölüm Görünürlüğü</label>
                                    <select class="custom-select" disabled>
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
                                    <input class="form-control" type="text" name="giris_baslik" value="<?php echo $giriscek['giris_baslik']; ?>" id="example-text-input">
                                        <div class="valid-feedback">
                                        İyi gözüküyor!
                                        </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom01">Buton Yazısı</label>
                                    <input class="form-control" type="text" name="giris_buton_yazi" value="<?php echo $giriscek['giris_buton_yazi']; ?>" id="example-text-input">
                                        <div class="valid-feedback">
                                        İyi gözüküyor!
                                        </div>
                                </div>  
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom01">Buton Bağlantısı</label>
                                    <input class="form-control" type="text" name="giris_buton_url" value="<?php echo $giriscek['giris_buton_url']; ?>" id="example-text-input">
                                        <div class="valid-feedback">
                                        İyi gözüküyor!
                                        </div>
                                </div>                   
                            </div>
                            <div class="form-row mb-3">
                                <label for="example-text-input" class="col-form-label">Metin</label>
                                <!--<input class="form-control" type="text" value="<?php #echo $giriscek['giris_yazi']; ?>" id="example-text-input">-->
                                <textarea class="form-control" aria-label="With textarea"  name="giris_yazi"><?php echo $giriscek['giris_yazi']; ?></textarea>
                            </div>
                            <div class="form-row">
                                <label class="col-12" for="example-text-input" class="col-form-label">Arkaplan Görseli</label>
                                <div class="input-group mb-1">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-mor">Yeni Yükle</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="giris_arkaplan" class="custom-file-input" id="inputGroupFile01">
                                        <label class="custom-file-label" for="inputGroupFile01">Arkaplanı değişirmek için bir görsel seçiniz..</label>
                                    </div>
                                </div>
                                <!-- accordion style 4 start -->
                                <div class="col-12">
                                    <div id="accordion4" class="according accordion-s3 gradiant-bg">
                                        <div class="card-header">
                                            <a class="card-link" data-toggle="collapse" href="#accordion41">Mevcut Arkaplanı Görmek İçin Tıklayınız</a>
                                        </div>
                                        <div id="accordion41" class="collapse" data-parent="#accordion4">
                                            <div class="card-body">
                                                <img src="<?php echo $giris_arkaplan; ?>" class="text-center" alt="">
                                            </div>
                                        </div>
                                    </div>      
                                </div>
                                <!-- accordion style 4 end -->
                            </div>
                            <hr>
                            <div class="col-auto text-right">
                                <button type="submit" name="girisguncelle" class="btn btn-rounded btn-kaydet">Kaydet</button>
                            </div>
                        </form>
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