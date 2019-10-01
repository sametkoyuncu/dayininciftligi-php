<?php
//4.7.19
$b1sorgu=$db->prepare("SELECT * FROM alt_kisim WHERE altkisim_id=:id");
$b1sorgu->execute(array(
    'id' => 1
    ));
$b1cek=$b1sorgu->fetch(PDO::FETCH_ASSOC);

$b4sorgu=$db->prepare("SELECT * FROM alt_kisim WHERE altkisim_id=:id");
$b4sorgu->execute(array(
    'id' => 2
    ));
$b4cek=$b4sorgu->fetch(PDO::FETCH_ASSOC);
?>

    <!-- ================ start footer Area ================= -->
    <footer class="footer-area" id="footer">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
                    <h4><?php echo $b1cek['altkisim_1']; ?></h4>
                    <p><?php echo $b1cek['altkisim_2']; ?></p>
                    <div class="footer-logo">
                        <img width="50%" height="auto"src="<?php echo $b1cek['altkisim_3']; ?>" alt="">
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
                    <h4>İletişim Bilgileri</h4>
                    <div class="footer-address">
                        <p><i style="color: #94fc13;">Adres :</i> <br><?php echo $iletisimcek['iletisim_adres']; ?></p>
                        <span><i style="color: #94fc13;">Telefon :</i> <br><?php echo $iletisimcek['iletisim_telefon']; ?></span>
                        <span><i style="color: #94fc13;">E-posta :</i> <br><?php echo $iletisimcek['iletisim_eposta']; ?></span>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
                    <h4>Bağlantılar</h4>
                    <ul>
                        <li><a href="index.php#giris">Anasayfa</a></li>
                        <li><a href="index.php#urunler">Ürünlerimiz</a></li>
                        <li><a href="index.php#galeri">Galeri</a></li>
                        <!--<li><a href="">Hakkımızda</a></li>-->
                        <li><a href="index.php#blog">Blog</a></li>
                        <li><a href="index.php#iletisim">İletişim</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-8 mb-4 mb-xl-0 single-footer-widget">
                    <h4><?php echo $b4cek['altkisim_1']; ?></h4>
                    <p><?php echo $b4cek['altkisim_2']; ?></p>

                    <div class="form-wrap" id="">
                        <form  action="/islem.php" method="POST">
                        <div class="input-group">
                            <input type="email" class="form-control" name="email" placeholder="<?php echo $b4cek['altkisim_3']; ?>" onfocus="this.placeholder = 'E-posta veya Telefon..'" onblur="this.placeholder = 'E-posta veya Telefon..'">
                            <div class="input-group-append">
                                <button class="btn click-btn" type="submit" name="aboneekle">
                                    <i class="fab fa-telegram-plane"></i>
                                </button>
                            </div>
                        </div>

                        <div class="info"></div>
                    </form>
                </div>

            </div>
        </div>
        <div class="footer-bottom row align-items-center text-center text-lg-left no-gutters">
            <p class="footer-text m-0 col-lg-8 col-md-12"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> Tüm Hakları Saklıdır <br> Bu şablon  <a href="https://colorlib.com" target="_blank">Colorlib <i class="fa fa-heart" aria-hidden="true"></i></a> tarafından oluşturuldu ve <a href="https://www.instagram.com/sametkoyuncu_/" target="_blank">sk. <i class="fas fa-laptop-code" aria-hidden="true"></i></a> tarafından düzenlenip geliştirildi.
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            <div class="col-lg-4 col-md-12 text-center text-lg-right footer-social">
                <a href="https://www.facebook.com/dayininciftligi/" target="_blank"><i class="ti-facebook"></i></a>
                <a href="https://www.instagram.com/dayininciftligi/" target="_blank"><i class="ti-instagram"></i></a>
                <a href="https://www.youtube.com/channel/UCzXD8w7Amtq1-HL_jwmXVgw/featured?view_as=subscriber" target="_blank"><i class="ti-youtube"></i></a>
            </div>
        </div>
    </div>
</footer>
<!-- ================ End footer Area ================= -->


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="assets/js/jquery-2.2.4.min.js"></script>
<script src="assets/js/popper.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="assets/js/jquery.ajaxchimp.min.js"></script>
<script src="assets/js/waypoints.min.js"></script>
<script src="assets/js/contact.js"></script>
<script src="assets/js/jquery.form.js"></script>
<script src="assets/js/jquery.validate.min.js"></script>
<script src="assets/js/theme.js"></script>


<!--Galeri js-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
<script>
    baguetteBox.run('.tz-gallery');
</script>
</body>
</html>