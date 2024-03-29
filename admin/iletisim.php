<!-- navbar menü -->
<?php include "includes/header.php"; ?>
<?php include "includes/header-area.php"; ?>
<?php include "includes/page-title-area.php"; ?>
<?php include "includes/alerts.php"; ?>
<?php
$bolumsorgu = $db->prepare("SELECT * FROM bolumler WHERE bolum_adi=:adi");
$bolumsorgu->execute(array(
    'adi' => 'iletisim'
));
$bolumcek = $bolumsorgu->fetch(PDO::FETCH_ASSOC);

$iletisimsorgu = $db->prepare("SELECT * FROM iletisim WHERE iletisim_id=:id");
$iletisimsorgu->execute(array(
    'id' => 1
));
$iletisimcek = $iletisimsorgu->fetch(PDO::FETCH_ASSOC);

?>
<div class="main-content-inner">

    <!-- bölüm ayarı start -->
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Bölüm Ayarları</h4>
                <p class="text-muted font-14 mb-4">Bu kısımda, anasayfada gözüken 'ürünler bölümünü' düzenleyebilirsiniz.</p>
                <hr>
                <form action="islem.php" method="POST">
                    <input type="hidden" name="bolum_id" value="<?php echo $bolumcek['bolum_id']; ?>">
                    <input type="hidden" name="sayfa_url" value="iletisim">
                    <input type="hidden" name="sayfa_no" value="10">
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom01">Bölüm Sırası</label>
                            <input class="form-control" type="text" name="bolum_sira" value="<?php echo $bolumcek['bolum_sira']; ?>" id="example-text-input">
                            <div class="valid-feedback">
                                İyi gözüküyor!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="col-form-label">Bölüm Görünürlüğü</label>
                            <select class="custom-select" name="bolum_durum">
                                <?php
                                if ($bolumcek['bolum_durum'] == '1') { ?>
                                    <option value="1">Göster</option>
                                    <option value="0">Gizle</option>
                                <?php } else { ?>
                                    <option value="0">Gizle</option>
                                    <option value="1">Göster</option>
                                <?php } ?>
                            </select>
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
    <!-- bölüm ayarı end -->
    <!-- Textual inputs start -->
    <div class="col-12 mt-5" id="iletisim">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">İletişim Bilgileri</h4>
                <p class="text-muted font-14 mb-4">Bu kısımda iletişim bilgilerinizi düzenleyebilirsiniz.</p>
                <hr>
                <form action="islem.php" method="POST">
                    <input type="hidden" name="iletisim_id" value="<?php echo $iletisimcek['iletisim_id']; ?>">
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom01">Adres</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-mor" id="basic-addon1"><i class="ti-home"></i></span>
                                <input class="form-control" name="iletisim_adres" type="text" value="<?php echo $iletisimcek['iletisim_adres']; ?>" id="example-text-input">
                                <div class="valid-feedback">
                                    İyi gözüküyor!
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom01">Google Maps Bağlantısı</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-mor" id="basic-addon1"><i class="ti-location-pin"></i></span>
                                <input class="form-control" type="url" name="iletisim_adres_url" value="<?php echo $iletisimcek['iletisim_adres_url']; ?>" id="example-text-input">
                                <div class="valid-feedback">
                                    İyi gözüküyor!
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom01">Telefon Numarası</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-mor" id="basic-addon1"><i class="ti-mobile"></i></span>
                                <input class="form-control" type="text" name="iletisim_telefon" value="<?php echo $iletisimcek['iletisim_telefon']; ?>" id="example-text-input">
                                <div class="valid-feedback">
                                    İyi gözüküyor!
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom01">E-posta Adresi</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-mor" id="basic-addon1"><i class="ti-email"></i></span>
                                <input class="form-control" type="email" name="iletisim_eposta" value="<?php echo $iletisimcek['iletisim_eposta']; ?>" id="example-text-input">
                                <div class="valid-feedback">
                                    İyi gözüküyor!
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom01">Facebook Kullanıcı Adı</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-mor" id="basic-addon1"><i class="ti-facebook"></i></span>
                                <input class="form-control" type="text" name="iletisim_facebook" value="<?php echo $iletisimcek['iletisim_facebook']; ?>" id="example-text-input">
                                <div class="valid-feedback">
                                    İyi gözüküyor!
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom01">İnstagram Kullanıcı Adı</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-mor" id="basic-addon1"><i class="ti-instagram"></i></span>
                                <input class="form-control" type="text" name="iletisim_instagram" value="<?php echo $iletisimcek['iletisim_instagram']; ?>" id="example-text-input">
                                <div class="valid-feedback">
                                    İyi gözüküyor!
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="col-auto text-right">
                        <button type="submit" name="iletisimguncelle" class="btn btn-rounded btn-kaydet">Kaydet</button>
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