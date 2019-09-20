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

    $iletisimsorgu=$db->prepare("SELECT * FROM iletisim WHERE iletisim_id=:id");
    $iletisimsorgu->execute(array(
        'id' => 1
        ));
    $iletisimcek=$iletisimsorgu->fetch(PDO::FETCH_ASSOC);
?>
        <div class="main-content-inner">
             
            <!-- Textual inputs start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Genel Ayarlar</h4>
                        <p class="text-muted font-14 mb-4">Bu kısımda sitenin genel ayarlarını düzenleyebilirsiniz.</p>
                        <hr>
                        <div class="form-row">
                            <div class="col-md-1 mb-3">
                                <img src="../<?php echo $ayarcek['ayar_sitefavicon']; ?>" alt="" width="75px" style="background-color:darkslateblue; padding: 5px;">
                            </div> 
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Favicon Adresi</label>
                                <input class="form-control" type="text" value="<?php echo $ayarcek['ayar_sitefavicon']; ?>" id="example-text-input">
                                    <div class="valid-feedback">
                                       İyi gözüküyor!
                                    </div>
                            </div>
                            <div class="col-md-2 mb-3">
                                <img src="../<?php echo $ayarcek['ayar_sitelogo']; ?>" alt="" style="background-color:darkslateblue; padding: 22px;">
                            </div> 
                            <div class="col-md-5 mb-3">
                                <label for="validationCustom01">Logo Adresi</label>
                                <input class="form-control" type="text" value="<?php echo $ayarcek['ayar_sitelogo']; ?>" id="example-text-input">
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
            <!-- Textual inputs start -->
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
                            <button type="submit" class="btn btn-rounded btn-primary">Kaydet</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Textual inputs end -->
            
            
            
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