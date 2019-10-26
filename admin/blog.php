<!-- navbar menü -->
<?php include "includes/header.php"; ?>
<?php include "includes/header-area.php"; ?>
<?php include "includes/page-title-area.php"; ?>
<?php include "includes/alerts.php"; ?>
<?php 
    $bolumsorgu=$db->prepare("SELECT * FROM bolumler WHERE bolum_adi=:adi");
    $bolumsorgu->execute(array(
        'adi' => 'blog'
        ));
    $bolumcek=$bolumsorgu->fetch(PDO::FETCH_ASSOC);
?>
        <div class="main-content-inner">
             
           <!-- Textual inputs start -->
           <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Blog Bölümü Ayarları</h4>
                        <p class="text-muted font-14 mb-4">Bu sayfada, anasayfada gözüken 'blog bölümünü' düzenleyebilirsiniz.</p>
                        <hr>
                        <form action="islem.php" method="POST">
                            <input type="hidden" name="bolum_id" value="<?php echo $bolumcek['bolum_id']; ?>">
                            <input type="hidden" name="sayfa_url" value="blog">
                            <input type="hidden" name="sayfa_no" value="9">
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom01">Alt Başlık</label>
                                    <input class="form-control" type="text" name="bolum_altbaslik" value="<?php echo $bolumcek['bolum_altbaslik']; ?>" id="example-text-input">
                                        <div class="valid-feedback">
                                        İyi gözüküyor!
                                        </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom01">Bölüm Sırası</label>
                                    <input class="form-control" type="text" name="bolum_sira" value="<?php echo $bolumcek['bolum_sira']; ?>" id="example-text-input">
                                        <div class="valid-feedback">
                                        İyi gözüküyor!
                                        </div>
                                </div>  
                                <div class="col-md-4 mb-3">
                                    <label class="col-form-label">Bölüm Görünürlüğü</label>
                                    <select class="custom-select" name="bolum_durum">
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
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom01">Bağlantı Metni</label>
                                    <input class="form-control" type="text"  name="bolum_buton_yazi" value="<?php echo $bolumcek['bolum_buton_yazi']; ?>" id="example-text-input">
                                        <div class="valid-feedback">
                                        İyi gözüküyor!
                                        </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom01">Bağlantı Adresi</label>
                                    <input class="form-control" type="text"  name="bolum_buton_url" value="<?php echo $bolumcek['bolum_buton_url']; ?>" disabled id="example-text-input">
                                        <div class="valid-feedback">
                                        İyi gözüküyor!
                                        </div>
                                </div>                   
                            </div>
                            <hr>
                            <div class="col-auto text-right">
                                <button type="submit" name="bolumguncelle" class="btn btn-rounded btn-kaydet">Kaydet</button>
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