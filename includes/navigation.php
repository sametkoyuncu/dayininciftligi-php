<?php
//4.7.19 - samet koyuncu
//
//navigation.php için sorgu
$navbarsorgu=$db->prepare("SELECT * FROM navbar WHERE nav_durum=:id");
$navbarsorgu->execute(array(
    'id' => 1
    ));
?>
<!--================Header Menu Area =================-->
<header class="header_area">	
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="<?php echo $ayarcek['ayar_siteadresi']; ?>"><img src="admin/<?php echo $ayarcek['ayar_sitelogo']; ?>" width="113px" height="auto" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <?php while ($navbarcek=$navbarsorgu->fetch(PDO::FETCH_ASSOC)) { ?>
                                <li class="nav-item"><a class="nav-link" href="<?php echo $navbarcek['nav_url'];?>"><!--<i class="ti ti-home"></i>&nbsp;--><?php echo $navbarcek['nav_adi']; ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!--================Header Menu Area =================-->