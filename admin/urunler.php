<!-- navbar menü -->
<?php include "includes/header.php"; ?>
<?php include "includes/header-area.php"; ?>
<?php include "includes/page-title-area.php"; ?>
<?php 
    $urunsorgu=$db->prepare("SELECT * FROM urunler WHERE sorgu_id=:id ORDER BY urun_sira");
    $urunsorgu->execute(array(
        'id' => 1
        ));
?>
            <div class="main-content-inner">
             
                <!-- Progress Table start -->
                <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Ürünler Bölümü</h4>
                                <p class="text-muted font-14 mb-4">Bu sayfada, sitede bulunan ürünler bölümünü düzenleyebilirsiniz. İster yeni ürün ekleyin, ister bazı bilgileri değiştirin, isterseniz ürün silin, isterseniz de bu bölümü gizleyin.</p>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table table-hover progress-table text-center">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">Sırası</th>
                                                    <th scope="col">Adı</th>
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
                                                    <td><?php echo $uruncek['urun_adi']; ?></td>
                                                    <td><img src="../<?php echo $uruncek['urun_adresi']; ?>" alt="<?php echo $uruncek['urun_alt']; ?>"></td>
                                                    <td>
                                                    <?php 
                                                        if($uruncek['urun_durum']=='1'){?>
                                                        <span class="status-p bg-success">Görünür</span>
                                                        <?php }else{?>
                                                        <span class="status-p bg-danger">Gizli</span>
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