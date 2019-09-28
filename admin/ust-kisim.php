<!-- navbar menü -->
<?php include "includes/header.php"; ?>
<?php include "includes/header-area.php"; ?>
<?php include "includes/page-title-area.php"; ?>
<?php include "includes/alerts.php"; ?>
<?php 
    $navbarsorgu=$db->prepare("SELECT * FROM navbar WHERE sorgu_id=:id ORDER BY nav_sira");
    $navbarsorgu->execute(array(
        'id' => 1
        ));
?>
<!-- basic modal start -->
<!-- yeni sosyal medya hesabı ekleyin -->
<div class="modal fade" id="yeniustmenuekle">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-mor">
                <h5 class="modal-title">Yeni Üst Menü Ekleyin</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form action="islem.php" method="POST">
                <div class="modal-body">
                    <div class="form-row mb-3 mx-2">
                        <label for="example-text-input" class="col-form-label">Menü Adı</label>
                        <input class="form-control" name="nav_adi" type="text" value="" placeholder="Hakkımızda, Referanslar.."id="example-text-input">
                    </div>
                    <div class="form-row mb-3 mx-2">
                        <label for="example-text-input" class="col-form-label">Menü Bağlantısı</label>
                        <input class="form-control" name="nav_url" type="text" value="" placeholder="https://siteadı.com/menü-adresi.html" id="example-text-input">
                    </div>
                    <div class="form-row mb-3 mx-2">
                        <label for="example-text-input" class="col-form-label">Menü Sırası (Boş bırakabilirsiniz)</label>
                        <input class="form-control" name="nav_sira" type="text" value="" placeholder="1, 2, 3, vb. rakam giriniz veya boş bırakınız" id="example-text-input">
                    </div>
                    <div class="form-row mb-3 mx-2">
                        <label class="col-form-label">Menü Görünürlüğü</label>
                        <select class="custom-select" name="nav_durum">
                            <option value="1">Göster</option>
                            <option value="0">Gizle</option>
                        </select>
                    </div>                    
                </div>
                <div class="modal-footer bg-acik-gri">
                    <button type="button" class="btn btn-geri btn-rounded" data-dismiss="modal"><i class="ti-arrow-left"></i>&nbsp; Geri Dön</button>
                    <button type="submit" name="ustmenuekle" class="btn btn-kaydet btn-rounded"><i class="ti-check"></i>&nbsp; Kaydet</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- basic modal end -->

            <div class="main-content-inner">
             
                <!-- Progress Table start -->
                <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h4 class="header-title">Üst Kısım Menüleri</h4>
                                    </div>
                                    <div class="col text-right">
                                    <button type="button" class="btn btn-rounded btn-yeniekle btn-xs" data-toggle="modal" data-target="#yeniustmenuekle"><i class="ti-plus"></i> &nbsp;Yeni Ekle</button>
                                    </div>
                                </div>
                                <p class="text-muted font-14 mb-4">Bu sayfada, sitede üst kısımda bulunan menüleri düzenleyebilirsiniz. İster yeni menü ekleyin, ister bazı bilgileri değiştirin, isterseniz de menüyü silin.</p>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table table-hover progress-table text-center">
                                            <thead class="text-uppercase bg-mor">
                                                <tr>
                                                    <th scope="col">Sırası</th>
                                                    <th class="text-left" scope="col">Adı</th>
                                                    <th class="text-left" scope="col">Bağlantı Adresi</th>
                                                    <th scope="col">Durum</th>
                                                    <th scope="col">Ayarlar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $sayac=1; ?>
                                                <?php while ($navbarcek=$navbarsorgu->fetch(PDO::FETCH_ASSOC)) { ?>
                                                <tr>
                                                    <th scope="row"><?php echo $navbarcek['nav_sira']; ?></th>
                                                    <td class="text-left"><?php echo $navbarcek['nav_adi']; ?></td>
                                                    <td class="text-left"><a href="<?php echo $navbarcek['nav_url']; ?>"><?php echo $navbarcek['nav_url']; ?></a></td>
                                                    <td>
                                                    <?php 
                                                        if($navbarcek['nav_durum']=='1'){?>
                                                        <span class="status-p bg-yesil">Görünür</span>
                                                        <?php }else{?>
                                                        <span class="status-p bg-kirmizi">Gizli</span>
                                                        <?php }
                                                    ?>
                                                        
                                                    </td>
                                                    <td>
                                                        <ul class="d-flex justify-content-center">
                                                            <li class="mr-3"><a href="ust-menu-duzenle.php?pg=5&nav_id=<?php echo $navbarcek['nav_id']; ?>" class="text-secondary" title="Düzenle"><i class="ti-pencil"></i></a></li>
                                                            <li><a href="islem.php?ustmenusil=true&nav_id=<?php echo $navbarcek['nav_id']; ?>" class="text-danger" title="Sil"><i class="ti-trash"></i></a></li>
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