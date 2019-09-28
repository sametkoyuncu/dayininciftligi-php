<!-- navbar menü -->
<?php include "includes/header.php"; ?>
<?php include "includes/header-area.php"; ?>
<?php include "includes/page-title-area.php"; ?>
<?php 
    $bolumsorgu=$db->prepare("SELECT * FROM bolumler WHERE bolum_adi=:adi");
    $bolumsorgu->execute(array(
        'adi' => 'urunler'
        ));
    $bolumcek=$bolumsorgu->fetch(PDO::FETCH_ASSOC);

    $urunsorgu=$db->prepare("SELECT * FROM urunler WHERE sorgu_id=:id ORDER BY urun_sira");
    $urunsorgu->execute(array(
        'id' => 1
        ));
?>
<!-- basic modal start -->
<!-- yeni sosyal medya hesabı ekleyin -->
<div class="modal fade" id="yeniurunekle">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-mor">
                <h5 class="modal-title">Yeni Hesap Ekleyin</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form action="islem.php" method="POST">
                <div class="modal-body">
                    <div class="form-row mb-3 mx-2">
                        <label for="example-text-input" class="col-form-label">Hesap Adı</label>
                        <input class="form-control" name="sosyal_medya_adi" type="text" value="" placeholder="Twitter, İnstagram, vs.."id="example-text-input">
                    </div>
                    <div class="form-row mb-3 mx-2">
                        <label for="example-text-input" class="col-form-label">Hesap Bağlantısı</label>
                        <input class="form-control" name="sosyal_medya_url" type="text" value="" placeholder="http://siteadi.com/kullaniciadi" id="example-text-input">
                    </div>
                    <div class="form-row mb-3 mx-2">
                        <label for="example-text-input" class="col-form-label">Hesap İkonu&nbsp;&nbsp;(<a class="mb-3" href="https://themify.me/themify-icons" target="_blank">İkonlara bakmak için tıklayınız</a>)</label>
                        <input class="form-control" name="sosyal_medya_ikon" type="text" value="" placeholder="ti ti-ikon-bu" id="example-text-input">
                    </div>
                    <div class="form-row mb-1 ml-3">
                    
                    </div>                        
                </div>
                <div class="modal-footer bg-acik-gri">
                    <button type="button" class="btn btn-geri btn-rounded" data-dismiss="modal"><i class="ti-arrow-left"></i>&nbsp; Geri Dön</button>
                    <button type="submit" name="sosyalmedyaekle" class="btn btn-kaydet btn-rounded"><i class="ti-check"></i>&nbsp; Kaydet</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- basic modal end -->


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
                 <!-- Textual inputs start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Ürünler Bölümü Ayarları</h4>
                        <p class="text-muted font-14 mb-4">Bu kısımda, anasayfada gözüken 'ürünler bölümünü' düzenleyebilirsiniz.</p>
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
                        <hr>
                        <div class="col-auto text-right">
                            <button type="submit" class="btn btn-rounded btn-kaydet">Kaydet</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Textual inputs end -->
                <!-- Progress Table start -->
                <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h4 class="header-title">Kayıtlı Ürünler</h4>
                                    </div>
                                    <div class="col text-right">
                                    <button type="button" class="btn btn-rounded btn-yeniekle btn-xs" data-toggle="modal" data-target="#yeniurunekle"><i class="ti-plus"></i> &nbsp;Yeni Ekle</button>
                                    </div>
                                </div>
                                <p class="text-muted font-14 mb-4">Bu sayfada, sitede bulunan ürünler bölümünü düzenleyebilirsiniz. İster yeni ürün ekleyin, ister bazı bilgileri değiştirin, isterseniz ürün silin, isterseniz de bu bölümü gizleyin.</p>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table table-hover progress-table text-center">
                                            <thead class="text-uppercase bg-mor">
                                                <tr>
                                                    <th scope="col">Sırası</th>
                                                    <th class="text-left" scope="col">Adı</th>
                                                    <th scope="col">Görsel</th>
                                                    <th scope="col">Durum</th>
                                                    <th scope="col">Ayarlar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $sayac=1; ?>
                                                <?php while ($uruncek=$urunsorgu->fetch(PDO::FETCH_ASSOC)) { ?>
                                                <tr>
                                                    <th scope="row"><?php echo $uruncek['urun_sira']; ?></th>
                                                    <td class="text-left"><?php echo $uruncek['urun_adi']; ?></td>
                                                    <td><img src="../<?php echo $uruncek['urun_adresi']; ?>" alt="<?php echo $uruncek['urun_alt']; ?>"></td>
                                                    <td>
                                                    <?php 
                                                        if($uruncek['urun_durum']=='1'){?>
                                                        <span class="status-p bg-yesil">Görünür</span>
                                                        <?php }else{?>
                                                        <span class="status-p bg-kirmizi">Gizli</span>
                                                        <?php }
                                                    ?>
                                                        
                                                    </td>
                                                    <td>
                                                        <ul class="d-flex justify-content-center">
                                                            <li class="mr-3"><a href="#" class="text-secondary" title="Düzenle"><i class="fa fa-edit"></i></a></li>
                                                            <li><a href="#" class="text-danger" title="Sil"><i class="ti-trash"></i></a></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <?php $sayac++; ?>
                                                <?php } ?> <!-- while end -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Progress Table end -->
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