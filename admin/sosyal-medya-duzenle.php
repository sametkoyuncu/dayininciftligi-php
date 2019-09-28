<?php include "includes/header.php"; ?>
<?php include "includes/header-area.php"; ?>
<?php include "includes/page-title-area.php"; ?>
<?php 
$sosyalmedyasorgu=$db->prepare("SELECT * FROM sosyal_medya WHERE sosyal_medya_id=:id");
$sosyalmedyasorgu->execute(array(
  'id' => $_GET['sosyal_medya_id']
  ));
$sosyalmedyacek=$sosyalmedyasorgu->fetch(PDO::FETCH_ASSOC);
$sm_id=$sosyalmedyacek['sosyal_medya_id'];
?>
<!-- sweet alert start-->
<script src="assets/js/sweetalert.min.js"></script>
<?php 
    if(isset($_GET['durum'])){
        if($_GET['durum']=='true'){?>
           <script>
                swal("İşlem Başarılı", {
                    icon: "success",
                    buttons: false,
                    timer: 3000,
                });
            </script>
            <style>
                .swal-overlay {
                    background-color: rgba(148,252,19, 0.45);
                }
            </style>
            <?php
        }else{?>
           <script>
                swal("İşlem Başarısız, Lütfen Tekrar Deneyiniz", {
                    icon: "warning",
                    buttons: false,
                    timer: 3000,
                });
            </script>
            <style>
                .swal-overlay {
                    background-color: rgba(255,0,0, 0.45);
                }
            </style>
            <?php
        }
    }
?>
<!-- sweet alert end -->
            <div class="main-content-inner">
             
                <!-- row area start -- mt-5 üstte alan olduğu için gerekli -->
                <div class="row mt-5">
                    <!-- Input Sizes start -->
                    <div class="col-10 mx-auto">
                                <div class="card">
                                    <div class="modal-header bg-mor">
                                        <h4 class="header-title bej-yazi"><?php echo $sosyalmedyacek['sosyal_medya_adi']; ?> Hesabını Düzenle</h4>
                                    </div>
                                    <form action="islem.php" method="POST">
                                    <input type="hidden" name="sosyal_medya_id" value="<?php echo $sm_id; ?>">
                                    <div class="card-body">
                                        <div class="col-md-12 mb-3">
                                            <label for="validationCustom01">Hesap Adı</label>
                                            <input class="form-control" name="sosyal_medya_adi" type="text" value="<?php echo $sosyalmedyacek['sosyal_medya_adi']; ?>" id="example-text-input">
                                                <div class="valid-feedback">
                                                İyi gözüküyor!
                                                </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="validationCustom01">Hesap Bağlantısı</label>
                                            <input class="form-control" name="sosyal_medya_url" type="text" value="<?php echo $sosyalmedyacek['sosyal_medya_url']; ?>" id="example-text-input">
                                                <div class="valid-feedback">
                                                İyi gözüküyor!
                                                </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="validationCustom01">Hesap İkonu</label>
                                            <input class="form-control" name="sosyal_medya_ikon" type="text" value="<?php echo $sosyalmedyacek['sosyal_medya_ikon']; ?>" id="example-text-input">
                                                <div class="valid-feedback">
                                                İyi gözüküyor!
                                                </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer bg-acik-gri">
                                        <button onClick="window.location.href='site-genel-ayarlar.php?pg=3#sosyalmedya'" type="button" class="btn btn-geri btn-rounded"><i class="ti-arrow-left"></i>&nbsp; Geri Dön</button>
                                        <button onClick="window.location.href='islem.php?sosyalmedyasil=true&sosyal_medya_id=<?php echo $sm_id; ?>'" type="button" class="btn btn-kirmizi btn-rounded"><i class="ti ti-close"></i>&nbsp; Hesabı Sil</button>
                                        <button type="submit" name="sosyalmedyaguncelle" class="btn btn-kaydet btn-rounded"><i class="ti-check"></i>&nbsp; Kaydet</button>
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
