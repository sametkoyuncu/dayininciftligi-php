<!-- navbar menü -->
<?php include "includes/header.php"; ?>
<?php include "includes/header-area.php"; ?>
<?php include "includes/page-title-area.php"; ?>
<?php include "includes/alerts.php"; ?>
<?php 
    $bolumsorgu=$db->prepare("SELECT * FROM bolumler WHERE bolum_adi=:adi");
    $bolumsorgu->execute(array(
        'adi' => 'galeri'
        ));
    $bolumcek=$bolumsorgu->fetch(PDO::FETCH_ASSOC);

    $fotosorgu=$db->prepare("SELECT * FROM galeri WHERE sorgu_id=:id");
    $fotosorgu->execute(array(
        'id' => 1
        ));
?>
<!-- basic modal start -->
<!-- yeni fotoğraf ekleyin -->
<div class="modal fade" id="yenifotoekle">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-mor">
                <h5 class="modal-title">Yeni Fotoğraf Ekleyin</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form action="islem.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-row mb-3 mx-2">
                        <label for="example-text-input" class="col-form-label">Görsel</label>
                        <div class="input-group mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-mor">Yeni Yükle</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" name="gorsel" class="custom-file-input" id="inputGroupFile01">
                                <label class="custom-file-label" for="inputGroupFile01">Galeri için bir görsel seçiniz..</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row mb-3 mx-2">
                        <label for="example-text-input" class="col-form-label">Görsel -alt- Metni</label>
                        <input class="form-control" name="gorsel_alt" type="text" value="" placeholder="Çiflikte gün batımı.." id="example-text-input">
                    </div>
                    <div class="form-row mb-3 mx-2">
                        <label for="example-text-input" class="col-form-label">Görsel Görünürlüğü</label>
                        <select class="custom-select" name="gorsel_durum">
                            <option value="1">Göster</option>
                            <option value="0">Gizle</option>
                        </select>
                    </div>
                    <div class="form-row mb-1 ml-3">
                    
                    </div>                        
                </div>
                <div class="modal-footer bg-acik-gri">
                    <button type="button" class="btn btn-geri btn-rounded" data-dismiss="modal"><i class="ti-arrow-left"></i>&nbsp; Geri Dön</button>
                    <button type="submit" name="fotoekle" class="btn btn-kaydet btn-rounded"><i class="ti-check"></i>&nbsp; Kaydet</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- basic modal end -->
        <div class="main-content-inner">
             
            <!-- Textual inputs start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Galeri Bölümü Ayarları</h4>
                        <p class="text-muted font-14 mb-4">Bu sayfada, anasayfada gözüken 'galeri bölümünü' düzenleyebilirsiniz.</p>
                        <hr>
                        <form action="islem.php" method="POST">
                            <input type="hidden" name="bolum_id" value="<?php echo $bolumcek['bolum_id']; ?>">
                            <input type="hidden" name="sayfa_url" value="galeri">
                            <input type="hidden" name="sayfa_no" value="8">
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom01">Alt Başlık</label>
                                    <input class="form-control" type="text" name="bolum_altbaslik" value="<?php echo $bolumcek['bolum_altbaslik']; ?>" id="example-text-input">
                                        <div class="valid-feedback">
                                        İyi gözüküyor!
                                        </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom01">Bölüm Sırası</label>
                                    <input class="form-control" type="text" name="bolum_sira" value="<?php echo $bolumcek['bolum_sira']; ?>" id="example-text-input">
                                        <div class="valid-feedback">
                                        İyi gözüküyor!
                                        </div>
                                </div>  
                                <div class="col-md-4 mb-3">
                                    <label class="col-form-label">Bölüm Görünürlüğü</label>
                                    <select class="custom-select" name="bolum_durum">
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
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom01">Bağlantı Metni</label>
                                    <input class="form-control" type="text"  name="bolum_buton_yazi" value="<?php echo $bolumcek['bolum_buton_yazi']; ?>" id="example-text-input">
                                        <div class="valid-feedback">
                                        İyi gözüküyor!
                                        </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom01">Bağlantı Adresi</label>
                                    <input class="form-control" type="text"  name="bolum_buton_url" value="<?php echo $bolumcek['bolum_buton_url']; ?>" id="example-text-input">
                                        <div class="valid-feedback">
                                        İyi gözüküyor!
                                        </div>
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
            <!-- Textual inputs end -->
            <!-- Progress Table start -->
            <div class="col-12 mt-5" id="fotograflar">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h4 class="header-title">Fotoğraflar</h4>
                            </div>
                            <div class="col text-right">
                                <button type="button" class="btn btn-rounded btn-yeniekle btn-xs" data-toggle="modal" data-target="#yenifotoekle"><i class="ti-plus"></i> &nbsp;Yeni Ekle</button>
                            </div>
                        </div>
                        <p class="text-muted font-14">Bu kısımda, galeride bulunan fotoğrafları düzenleyebilirsiniz. İster yeni fotoğraf ekleyin, ister bazı bilgileri değiştirin, isterseniz fotoğraf silin, isterseniz de fotoğraf gizleyin.</p>
                        <br>
                        <div class="single-table">
                            <div class="table-responsive">
                                <table class="table table-hover progress-table text-center">
                                    <thead class="text-uppercase bg-mor">
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
                                            <td><img src="../<?php echo $fotocek['gorsel_url']; ?>" alt="<?php echo $fotocek['gorsel_alt']; ?>" width="150px" height="auto"></td>
                                            <td>
                                            <?php 
                                                if($fotocek['gorsel_durum']=='1'){?>
                                                <span class="status-p bg-yesil">Görünür</span>
                                                <?php }else{?>
                                                <span class="status-p bg-kirmizi">Gizli</span>
                                                <?php }
                                            ?>                                        
                                            </td>
                                            <td>
                                                <ul class="d-flex justify-content-center">
                                                    <li class="mr-3"><a href="#" class="text-secondary" title="Düzenle"><i class="fa fa-edit"></i></a></li>
                                                    <li><a href="islem.php?fotosil=true&gorsel_id=<?php echo $fotocek['gorsel_id']; ?>" class="text-danger" title="Sil"><i class="ti-trash"></i></a></li>
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