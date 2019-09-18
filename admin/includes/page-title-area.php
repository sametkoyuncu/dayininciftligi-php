 <?php 
    $bcsorgu=$db->prepare("SELECT * FROM breadcrumb WHERE bc_pg=:pg");
    $bcsorgu->execute(array(
        'pg' => $page_id
        ));
    $bccek=$bcsorgu->fetch(PDO::FETCH_ASSOC);
 ?>
 <!-- page title area start -->
 <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left"><?php echo $bccek['bc_adi']; ?></h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="#"><?php echo $bccek['bc_ust']; ?></a></li>
                                <li><span><?php echo $bccek['bc_adi']; ?></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="assets/images/author/avatar.png" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Samet Koyuncu <i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Profili Göster</a>
                                <a class="dropdown-item" href="#">Profili Düzenle</a>
                                <a class="dropdown-item" href="#">Çıkış Yap</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->