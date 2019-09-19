<!-- navbar menü -->
<?php include "includes/header.php"; ?>
<?php include "includes/header-area.php"; ?>
<?php include "includes/page-title-area.php"; ?>
<?php 
    $galerisorgu=$db->prepare("SELECT * FROM bolumler WHERE bolum_adi=:adi");
    $galerisorgu->execute(array(
        'adi' => 'galeri'
        ));
    $galericek=$galerisorgu->fetch(PDO::FETCH_ASSOC);

    $fotosorgu=$db->prepare("SELECT * FROM galeri WHERE sorgu_id=:id");
    $fotosorgu->execute(array(
        'id' => 1
        ));
?>
        <div class="main-content-inner">
             
            <!-- Textual inputs start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Galeri Bölümü Ayarları</h4>
                        <p class="text-muted font-14 mb-4">Bu sayfada, anasayfada gözüken 'galeri bölümünü' düzenleyebilirsiniz.</p>
                        <hr>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Alt Başlık</label>
                                <input class="form-control" type="text" value="<?php echo $galericek['bolum_altbaslik']; ?>" id="example-text-input">
                                    <div class="valid-feedback">
                                       İyi gözüküyor!
                                    </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Bölüm Sırası</label>
                                <input class="form-control" type="text" value="<?php echo $galericek['bolum_sira']; ?>" id="example-text-input">
                                    <div class="valid-feedback">
                                       İyi gözüküyor!
                                    </div>
                            </div>  
                            <div class="col-md-4 mb-3">
                                <label class="col-form-label">Bölüm Görünürlüğü</label>
                                <select class="custom-select">
                                    <?php 
                                    if($galericek['bolum_durum']=='1') { ?>
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
                                <input class="form-control" type="text" value="<?php echo $galericek['bolum_buton_yazi']; ?>" id="example-text-input">
                                    <div class="valid-feedback">
                                       İyi gözüküyor!
                                    </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Bağlantı Adresi</label>
                                <input class="form-control" type="text" value="<?php echo $galericek['bolum_buton_baglanti']; ?>" id="example-text-input">
                                    <div class="valid-feedback">
                                       İyi gözüküyor!
                                    </div>
                            </div>                   
                        </div>
                        <hr>
                        <div class="col-auto text-right">
                            <button type="submit" class="btn btn-rounded btn-primary">Kaydet</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Textual inputs end -->
            <!-- Progress Table start -->
            <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Galerideki Fotoğraflar&nbsp;&nbsp;
                                    <button type="button" class="btn btn-rounded btn-info btn-xs"><i class="ti-plus"></i> &nbsp;Yeni Ekle</button>
                                </h4>
                                <p class="text-muted font-14 mb-4">Bu kısımda, galeride bulunan fotoğrafları düzenleyebilirsiniz. İster yeni fotoğraf ekleyin, ister bazı bilgileri değiştirin, isterseniz fotoğraf silin, isterseniz de fotoğraf gizleyin.</p>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table table-hover progress-table text-center">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">Sıra</th>
                                                    <th scope="col">Görsel</th>
                                                    <th scope="col">Durum</th>
                                                    <th scope="col">Ayarlar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $sayac=1; ?>
                                                <?php while ($fotocek=$fotosorgu->fetch(PDO::FETCH_ASSOC)) { ?>
                                                <tr>
                                                    <th scope="row"><?php echo $sayac; ?></th>
                                                    <td><img src="../<?php echo $fotocek['gorsel_adresi']; ?>" alt="<?php echo $fotocek['gorsel_alt']; ?>"></td>
                                                    <td>
                                                    <?php 
                                                        if($fotocek['gorsel_durum']=='1'){?>
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