<?php 
//giris bölümü
$girissorgu=$db->prepare("SELECT * FROM giris WHERE giris_id=:id");
$girissorgu->execute(array(
    'id' => 1
    ));
$giriscek=$girissorgu->fetch(PDO::FETCH_ASSOC);
?>
<section class="home_banner_area" id="giris" style="background: url(<?php echo $giriscek['giris_arkaplan']; ?>) no-repeat scroll center center;">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-6 col-xl-5 offset-xl-7">
                        <div class="banner_content">
                            <h3><?php echo $giriscek['giris_baslik']; ?></h3>
                            <p><?php echo $giriscek['giris_yazi']; ?></p>
                            <a class="banner_btn nav-link" href="<?php echo $giriscek['giris_buton_url']; ?>"><?php echo $giriscek['giris_buton_yazi']; ?><i class="ti-arrow-right"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>