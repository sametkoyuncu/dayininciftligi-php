<!-- navbar menü -->
<?php include "includes/header.php"; ?>
<?php include "includes/header-area.php"; ?>
<?php include "includes/page-title-area.php"; ?>
<?php 
    $ayarsorgu=$db->prepare("SELECT * FROM ayarlar WHERE ayar_id=:id");
    $ayarsorgu->execute(array(
        'id' => 1
        ));
    $ayarcek=$ayarsorgu->fetch(PDO::FETCH_ASSOC);
    
    $sosyalmedyasorgu=$db->prepare("SELECT * FROM sosyal_medya WHERE sorgu_id=:id");
    $sosyalmedyasorgu->execute(array(
        'id' => 1
        ));
?>
        <div class="main-content-inner">
             
            <!-- genel ayarlar start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Genel Ayarlar</h4>
                        <p class="text-muted font-14 mb-4">Bu kısımda sitenin genel ayarlarını düzenleyebilirsiniz.</p>
                        <hr>
                        <div class="form-row">
                            <div class="col-md-3 mb-3 text-center">
                                <img class="rounded-circle" src="../<?php echo $ayarcek['ayar_sitefavicon']; ?>" alt="" width="75px" style="background-color:darkslateblue; padding: 7px;">
                            </div> 
                            <div class="col-md-9 mb-3">
                                <label for="validationCustom01">Favicon Adresi</label>
                                <input class="form-control" type="text" value="<?php echo $ayarcek['ayar_sitefavicon']; ?>" id="example-text-input">
                                    <div class="valid-feedback">
                                       İyi gözüküyor!
                                    </div>
                            </div>         
                        </div>
                        <div class="form-row">
                            <div class="col-md-3 mb-3 text-center">
                                <img class="rounded" src="../<?php echo $ayarcek['ayar_sitelogo']; ?>" alt="" width="200px" height="auto" style="background-color:darkslateblue; padding: 10px;">
                            </div> 
                            <div class="col-md-9 mb-3">
                                <label for="validationCustom01">Logo Adresi</label>
                                <input class="form-control" type="text" value="<?php echo $ayarcek['ayar_sitelogo']; ?>" id="example-text-input">
                                    <div class="valid-feedback">
                                       İyi gözüküyor!
                                    </div>
                            </div>
                        </div>
                        <hr>
                        <div class="col-auto text-right">
                            <button type="submit" class="btn btn-rounded btn-kaydet">Kaydet</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- genel ayarlar end -->
            <!-- sosyal medya start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h4 class="header-title">Sosyal Medya Hesaplarınız&nbsp;&nbsp;</h4>
                            </div>
                            <div class="col text-right">
                                <button type="button" class="btn btn-rounded btn-yeniekle btn-xs"><i class="ti-plus"></i> &nbsp;Yeni Ekle</button>
                            </div>
                        </div>
                        <p class="text-muted font-14 mb-4">Bu kısımda, sosyal medya hesaplarınızı siteye ekleyebilir, veya varolan hesaplarınızı düzenleyebilirsiniz.</p>
                        <div class="single-table">
                            <div class="table-responsive">
                                <table class="table table-hover progress-table text-left">
                                    <thead class="text-uppercase bg-mor">
                                        <tr>
                                            <th scope="col">Sıra</th>
                                            <th scope="col">İkon</th>
                                            <th scope="col">Adı</th>
                                            <th scope="col">Bağlantı Adresi</th>
                                            <th scope="col">Ayarlar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $sayac=1; ?>
                                        <?php while ($sosyalmedyacek=$sosyalmedyasorgu->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <tr>
                                            <th scope="row"><?php echo $sayac; ?></th>
                                            <td><i class="<?php echo $sosyalmedyacek['sosyal_medya_ikon']; ?>"></i></td>
                                            <td><?php echo $sosyalmedyacek['sosyal_medya_adi']; ?></td>
                                            <td><a href="<?php echo $sosyalmedyacek['sosyal_medya_url']; ?>" target="_blank"><?php echo $sosyalmedyacek['sosyal_medya_url']; ?></a></td>
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
            <!-- sosyal medya end -->
            <!-- meta etiketleri start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Meta Etiketleri</h4>
                        <p class="text-muted font-14 mb-4">Bu kısımda meta etiketlerinizi düzenleyebilirsiniz.</p>
                        <hr>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Meta Title</label>
                                <input class="form-control" type="text" value="<?php echo $ayarcek['meta_title']; ?>" id="example-text-input">
                                    <div class="valid-feedback">
                                       İyi gözüküyor!
                                    </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Meta Copyright</label>
                                <input class="form-control" type="text" value="<?php echo $ayarcek['meta_copyright']; ?>" id="example-text-input">
                                    <div class="valid-feedback">
                                       İyi gözüküyor!
                                    </div>
                            </div>                   
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Meta Author</label>
                                <input class="form-control" type="text" value="<?php echo $ayarcek['meta_author']; ?>" id="example-text-input">
                                    <div class="valid-feedback">
                                       İyi gözüküyor!
                                    </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Meta Owner</label>
                                <input class="form-control" type="text" value="<?php echo $ayarcek['meta_owner']; ?>" id="example-text-input">
                                    <div class="valid-feedback">
                                       İyi gözüküyor!
                                    </div>
                            </div>                   
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Meta Keywords</label>
                                <input class="form-control" type="text" value="<?php echo $ayarcek['meta_keywords']; ?>" id="example-text-input">
                                    <div class="valid-feedback">
                                       İyi gözüküyor!
                                    </div>
                            </div>                   
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Meta Description</label>
                                <input class="form-control" type="text" value="<?php echo $ayarcek['meta_description']; ?>" id="example-text-input">
                                    <div class="valid-feedback">
                                       İyi gözüküyor!
                                    </div>
                            </div>                   
                        </div>
                        <hr>
                        <div class="col-auto text-right">
                            <button type="submit" class="btn btn-rounded btn-kaydet">Kaydet</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- meta etiketleri end -->
             
            
            
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