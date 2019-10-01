<?php

?>
<section class="contact-section area-padding" id="iletisim">
        <div class="container">
        <h1 class="text-center" style="padding-bottom: 40px;">İletişim</h1>
        <div class="d-none d-sm-block mb-5 pb-4">
            <div id="map" style="height: 480px;">
                <div style="overflow:hidden;width: 100%;position: relative;"><iframe width="100%" height="480" src="https://maps.google.com/maps?width=700&amp;height=480&amp;hl=tr&amp;q=%C3%87ay%C4%B1rba%C5%9F%C4%B1%2C%20%C5%9Eile%2C%20%C4%B0stanbul%2C%20Turkey+(Day%C4%B1n%C4%B1n%20%C3%87iftli%C4%9Fi)&amp;ie=UTF8&amp;t=&amp;z=12&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><div style="position: absolute;width: 80%;bottom: 10px;left: 0;right: 0;margin-left: auto;margin-right: auto;color: #000;text-align: center;"><small style="line-height: 1.8;font-size: 2px;background: #fff;">Powered by <a href=""></a>  <a href="https://opwaarderenlebara.nl/">opwaarderenlebara.nl</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><br />
            </div>
        </div>

       

        <div class="row" id="eposta">
            <div class="col-12">
            <h2 class="contact-title">Mesaj Gönderin</h2>
            </div>
            <div class="col-lg-8">
            <form  action="admin/islem.php" method="POST" class="form-contact contact_form" id="contactForm">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                        <input class="form-control" name="name" id="name" type="text" placeholder="İsminiz">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                        <input class="form-control" name="email" id="email" type="email" placeholder="E-posta adresiniz">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                        <input class="form-control" name="subject" id="subject" type="text" placeholder="Konu">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" placeholder="Mesajınız.."></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group mt-3">
                            <input type="submit" name="mesajekle" form="contactForm" class="button button-contactForm" value="Gönderin">
                        </div>
                    </div>
                    
                </div>
                
            </form>


            </div>

            <div class="col-lg-4">
            <div class="media contact-info">
                <span class="contact-info__icon"><i class="ti-home iletisim-ikon"></i></span>
                <div class="media-body">
                <h3><a href="<?php echo $iletisimcek['iletisim_adres_url']; ?>" target="_blank"><?php echo $iletisimcek['iletisim_adres']; ?></a></h3>
                <p>Tıkla, konuma git!.</p>
                </div>
            </div>
            <div class="media contact-info">
                <span class="contact-info__icon"><i class="ti-tablet iletisim-ikon"></i></span>
                <div class="media-body">
                <h3><a href="tel:905339318226"><?php echo $iletisimcek['iletisim_telefon']; ?></a></h3>
                <p>08:00 - 20:00</p>
                </div>
            </div>
            <div class="media contact-info">
                <span class="contact-info__icon"><i class="ti-email iletisim-ikon"></i></span>
                <div class="media-body">
                <h3><a href="mailto:<?php echo $iletisimcek['iletisim_eposta']; ?>"><?php echo $iletisimcek['iletisim_eposta']; ?></a></h3>
                <p>İstediğiniz zaman bize yazabilirsiniz!</p>
                </div>
            </div>
            <div class="media contact-info">
                <span class="contact-info__icon"><i class="ti-facebook iletisim-ikon"></i></span>
                <div class="media-body">
                <h3><a href="https://www.facebook.com/<?php echo $iletisimcek['iletisim_facebook']; ?>/" target="_blank">@<?php echo $iletisimcek['iletisim_facebook']; ?></a></h3>
                <p>Facebook sayfamız</p>
                </div>
            </div>
            <div class="media contact-info">
                <span class="contact-info__icon"><i class="ti-instagram iletisim-ikon"></i></span>
                <div class="media-body">
                <h3><a href="https://www.instagram.com/<?php echo $iletisimcek['iletisim_instagram']; ?>/" target="_blank">@<?php echo $iletisimcek['iletisim_instagram']; ?></a></h3>
                <p>İnstagram hesabımız</p>
               </div>
            </div>    
            </div>
        </div>
        </div>
    </section>