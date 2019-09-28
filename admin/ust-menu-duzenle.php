<?php include "includes/header.php"; ?>
<?php include "includes/header-area.php"; ?>
<?php include "includes/page-title-area.php"; ?>
<?php include "includes/alerts.php"; ?>
<?php 
$navbarsorgu=$db->prepare("SELECT * FROM navbar WHERE nav_id=:id");
$navbarsorgu->execute(array(
    'id' => $_GET['nav_id']
    ));
$navbarcek=$navbarsorgu->fetch(PDO::FETCH_ASSOC);
$nav_id = $navbarcek['nav_id'];
?>
            <div class="main-content-inner">
             
                <!-- row area start -- mt-5 üstte alan olduğu için gerekli -->
                <div class="row mt-5">
                    <!-- Input Sizes start -->
                    <div class="col-10 mx-auto">
                                <div class="card">
                                    <div class="modal-header bg-mor">
                                        <h4 class="header-title bej-yazi">Üst Menüyü Düzenle > <?php echo $navbarcek['nav_adi']; ?></h4>
                                    </div>
                                    <form action="islem.php" method="POST">
                                    <input type="hidden" name="nav_id" value="<?php echo $nav_id; ?>">
                                    <div class="card-body">
                                        <div class="col-md-12 mb-3">
                                            <label for="validationCustom01">Menü Adı</label>
                                            <input class="form-control" name="nav_adi" type="text" value="<?php echo $navbarcek['nav_adi']; ?>" id="example-text-input">
                                                <div class="valid-feedback">
                                                İyi gözüküyor!
                                                </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="validationCustom01">Menü Bağlantısı</label>
                                            <input class="form-control" name="nav_url" type="text" value="<?php echo $navbarcek['nav_url']; ?>" id="example-text-input">
                                                <div class="valid-feedback">
                                                İyi gözüküyor!
                                                </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="validationCustom01">Menü Sırası</label>
                                            <input class="form-control" name="nav_sira" type="text" value="<?php echo $navbarcek['nav_sira']; ?>" id="example-text-input">
                                                <div class="valid-feedback">
                                                İyi gözüküyor!
                                                </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="col-form-label">Menü Görünürlüğü</label>
                                            <select class="custom-select" name="nav_durum">
                                            <?php 
                                                if($navbarcek['nav_durum']=='1') { ?>
                                                <option value="1">Göster</option>
                                                <option value="0">Gizle</option>
                                                <?php } else { ?> 
                                                <option value="0">Gizle</option>
                                                <option value="1">Göster</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer bg-acik-gri">
                                        <button onClick="window.location.href='ust-kisim.php?pg=5'" type="button" class="btn btn-geri btn-rounded"><i class="ti-arrow-left"></i>&nbsp; Geri Dön</button>
                                        <button onClick="window.location.href='islem.php?ustmenusil=true&nav_id=<?php echo $nav_id; ?>'" type="button" class="btn btn-kirmizi btn-rounded"><i class="ti ti-close"></i>&nbsp; Menüyü Sil</button>
                                        <button type="submit" name="ustmenuguncelle" class="btn btn-kaydet btn-rounded"><i class="ti-check"></i>&nbsp; Kaydet</button>
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
