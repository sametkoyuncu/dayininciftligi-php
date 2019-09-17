<!-- navbar menü -->
<?php include "includes/header.php"; ?>
<?php include "includes/header-area.php"; ?>
<?php include "includes/page-title-area.php"; ?>
<?php 
    $navbarsorgu=$db->prepare("SELECT * FROM navbar WHERE sorgu_id=:id ORDER BY nav_sira");
    $navbarsorgu->execute(array(
        'id' => 1
        ));
?>
            <div class="main-content-inner">
             
                <!-- Progress Table start -->
                <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Üst Kısım Menüleri</h4>
                                <p class="text-muted font-14 mb-4">Bu sayfada, sitede üst kısımda bulunan menüleri düzenleyebilirsiniz. İster yeni menü ekleyin, ister bazı bilgileri değiştirin, isterseniz de menüyü silin.</p>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table table-hover progress-table text-center">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">Sırası</th>
                                                    <th scope="col">Adı</th>
                                                    <th scope="col">Bağlantı Adresi</th>
                                                    <th scope="col">Durum</th>
                                                    <th scope="col">Ayarlar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $sayac=1; ?>
                                                <?php while ($navbarcek=$navbarsorgu->fetch(PDO::FETCH_ASSOC)) { ?>
                                                <tr>
                                                    <th scope="row"><?php echo $navbarcek['nav_sira']; ?></th>
                                                    <td><?php echo $navbarcek['nav_adi']; ?></td>
                                                    <td><?php echo $navbarcek['nav_url']; ?></td>
                                                    <td>
                                                    <?php 
                                                        if($navbarcek['nav_durum']=='1'){?>
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