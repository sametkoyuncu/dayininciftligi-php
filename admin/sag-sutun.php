<!-- navbar menü -->
<?php include "includes/header.php"; ?>
<?php include "includes/header-area.php"; ?>
<?php include "includes/page-title-area.php"; ?>
<?php include "includes/alerts.php"; ?>
<?php
$b1sorgu = $db->prepare("SELECT * FROM alt_kisim WHERE altkisim_id=:id");
$b1sorgu->execute(array(
    'id' => 1
));
$b1cek = $b1sorgu->fetch(PDO::FETCH_ASSOC);

$b4sorgu = $db->prepare("SELECT * FROM alt_kisim WHERE altkisim_id=:id");
$b4sorgu->execute(array(
    'id' => 2
));
$b4cek = $b4sorgu->fetch(PDO::FETCH_ASSOC);
?>
<div class="main-content-inner">

    <!-- 1. bölüm start -->
    <div class="col-12 mt-5" id="bir">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">1. Bölüm - Hakkımızda Özet</h4>
                <p class="text-muted font-14 mb-4">Bu kısımda sitenin alt kısmında bulunan 1. (en soldaki) bölümü düzenleyebilirsiniz.</p>
                <hr>
                <form action="islem.php" method="POST">
                <input type="hidden" name="altkisim_id" value="1">
                <div class="form-row">
                    <div class="col-md-4 text-center">
                        <img src="assets/images/footer/1.png" class="rounded" alt="">
                    </div>
                    <div class="col-md-8">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Başlık</label>
                            <input class="form-control" type="text" name="altkisim_1" value="<?php echo $b1cek['altkisim_1']; ?>" id="example-text-input">
                            <div class="valid-feedback">
                                İyi gözüküyor!
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Metin</label>
                            <textarea class="form-control" name="altkisim_2" aria-label="With textarea"><?php echo $b1cek['altkisim_2']; ?></textarea>
                            <div class="valid-feedback">
                                İyi gözüküyor!
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Görsel Adresi</label>
                            <input class="form-control" type="text" name="altkisim_3" value="<?php echo $b1cek['altkisim_3']; ?>" id="example-text-input">
                            <div class="valid-feedback">
                                İyi gözüküyor!
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="col-auto text-right">
                    <button type="submit" name="altkisimguncelle" class="btn btn-rounded btn-kaydet">Kaydet</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- 1. bölüm end -->
    <!-- 4. bölüm start -->
    <div class="col-12 mt-5" id="iki">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">4. Bölüm - Abone Kayıt</h4>
                <p class="text-muted font-14 mb-4">Bu kısımda sitenin alt kısmında bulunan 4. (en sağdaki) bölümü düzenleyebilirsiniz.</p>
                <hr>
                <form action="islem.php" method="POST">
                    <input type="hidden" name="altkisim_id" value="2">
                    <div class="form-row">
                        <div class="col-md-4 text-center">
                            <img src="assets/images/footer/4.png" class="rounded" alt="">
                        </div>
                        <div class="col-md-8">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Başlık</label>
                                <input class="form-control" type="text" name="altkisim_1" value="<?php echo $b4cek['altkisim_1']; ?>" id="example-text-input">
                                <div class="valid-feedback">
                                    İyi gözüküyor!
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Metin</label>
                                <textarea class="form-control" name="altkisim_2" aria-label="With textarea"><?php echo $b4cek['altkisim_2']; ?></textarea>
                                <div class="valid-feedback">
                                    İyi gözüküyor!
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Giriş Alanı Metni</label>
                                <input class="form-control" type="text" name="altkisim_3" value="<?php echo $b4cek['altkisim_3']; ?>" id="example-text-input">
                                <div class="valid-feedback">
                                    İyi gözüküyor!
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="col-auto text-right">
                        <button type="submit" name="altkisimguncelle" class="btn btn-rounded btn-kaydet">Kaydet</button>
                    </div>
                </form>
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