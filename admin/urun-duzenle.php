<?php include "includes/header.php"; ?>
<?php include "includes/header-area.php"; ?>
<?php include "includes/page-title-area.php"; ?>
<?php include "includes/alerts.php"; ?>
<?php 
$urun_id = $_GET['urun_id'];
$urunsorgu=$db->prepare("SELECT * FROM urunler WHERE urun_id=:id");
$urunsorgu->execute(array(
    'id' => $urun_id
    ));
$uruncek=$urunsorgu->fetch(PDO::FETCH_ASSOC);

?>
            <div class="main-content-inner">
             
                <!-- row area start -- mt-5 üstte alan olduğu için gerekli -->
                <div class="row mt-5">
                    <!-- Input Sizes start -->
                    <div class="col-10 mx-auto">
                                <div class="card">
                                    <div class="modal-header bg-mor">
                                        <h4 class="header-title bej-yazi">Ürün Düzenle > <?php echo $uruncek['urun_adi']; ?></h4>
                                    </div>
                                    <form action="islem.php" method="POST"  enctype="multipart/form-data">
                                        <input type="hidden" name="urun_id" value="<?php echo $urun_id; ?>">
                                        <div class="card-body">
                                            <div class="col-md-12 mb-3">
                                                <label for="validationCustom01">Ürün Adı</label>
                                                <input class="form-control" name="urun_adi" type="text" value="<?php echo $uruncek['urun_adi']; ?>" id="example-text-input">
                                                    <div class="valid-feedback">
                                                    İyi gözüküyor!
                                                    </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="validationCustom01">Ürün Sırası</label>
                                                <input class="form-control" name="urun_sira" type="text" value="<?php echo $uruncek['urun_sira']; ?>" id="example-text-input">
                                                    <div class="valid-feedback">
                                                    İyi gözüküyor!
                                                    </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label class="col-form-label">Ürün Görünürlüğü</label>
                                                <select class="custom-select" name="urun_durum">
                                                <?php 
                                                    if($uruncek['urun_durum']=='1') { ?>
                                                    <option value="1">Göster</option>
                                                    <option value="0">Gizle</option>
                                                    <?php } else { ?> 
                                                    <option value="0">Gizle</option>
                                                    <option value="1">Göster</option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="validationCustom01">Ürün Görseli</label>
                                                <div class="input-group mb-1">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text bg-mor">Yeni Yükle</span>
                                                    </div>
                                                    <div class="custom-file">
                                                        <input type="file" name="urun_gorsel" class="custom-file-input" id="inputGroupFile01">
                                                        <label class="custom-file-label" for="inputGroupFile01">Değişirmek için bir görsel seçiniz..</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 text-left">
                                                    <img src="../<?php echo $uruncek['urun_gorsel']; ?>" alt="<?php echo $uruncek['urun_alt']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="validationCustom01">Görsel -ALT- Metni</label>
                                                <input class="form-control" name="urun_alt" type="text" value="<?php echo $uruncek['urun_alt']; ?>" id="example-text-input">
                                                    <div class="valid-feedback">
                                                    İyi gözüküyor!
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer bg-acik-gri">
                                            <button onClick="window.location.href='urunler.php?pg=7#urunler'" type="button" class="btn btn-geri btn-rounded"><i class="ti-arrow-left"></i>&nbsp; Geri Dön</button>
                                            <button onClick="window.location.href='islem.php?urunsil=true&urun_id=<?php echo $urun_id; ?>'" type="button" class="btn btn-kirmizi btn-rounded"><i class="ti ti-close"></i>&nbsp; Ürünü Sil</button>
                                            <button type="submit" name="urunguncelle" class="btn btn-kaydet btn-rounded"><i class="ti-check"></i>&nbsp; Kaydet</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- Input Sizes end -->
                </div>
                <!-- row area end-->
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
