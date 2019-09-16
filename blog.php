<?php include "includes/header.php" ?>
<?php include "includes/navigation.php"; ?>
<?php include "includes/hero-banner.php"; ?>
<?php
    $yazisorgu=$db->prepare("SELECT * FROM yazilar WHERE yazi_durum=:durum");
    $yazisorgu->execute(array(
        'durum' => 1
        ));
    $kategoribilgisi=$db->prepare("SELECT * FROM kategoriler WHERE kategori_id=:id");
?>

  <!--================Blog Area =================-->
  <section class="blog_area area-padding">
      <div class="container">
          <div class="row">
              <div class="col-lg-8 mb-5 mb-lg-0">
                  <div class="blog_left_sidebar">
                    <?php while ($yazicek=$yazisorgu->fetch(PDO::FETCH_ASSOC)) { ?>
                      <article class="blog_item">
                        <div class="blog_item_img">
                          <img class="card-img rounded-0" src="<?php echo $yazicek['yazi_kapak']; ?>" alt="">
                          <a href="#" class="blog_item_date">
                            <h3><?php echo iconv('latin5','utf-8',strftime(' %d ',strtotime($yazicek['yazi_tarih']))); ?></h3>
                            <p><?php echo iconv('latin5','utf-8',strftime(' %b ',strtotime($yazicek['yazi_tarih']))); ?></p>
                          </a>
                        </div>
                        
                        <div class="blog_details">
                            <a class="d-inline-block" href="single-post.php">
                                <h2><?php echo $yazicek['yazi_baslik']; ?></h2>
                            </a>
                            
                            <p>
                                <?php echo $yazicek['yazi_ozet']; ?>
                                <?php //echo mb_substr($yazicek['yazi_metin'], 0, 130, "UTF-8"); --- METİN KIRPMA?>
                            <br><a type="" class="" href="<?php echo $yazicek['yazi_adresi']; ?>">Yazının devamı için tıklayınız --></a> 
                            </p>
                            <ul class="blog-info-link">
                              <li><a href="#"><i class="far fa-flag"></i>
                                <?php //yazi ablosundaki kategori id ye göre kategori tablosundan kategori adının çekilmesi
                                    $kategoribilgisi->execute(array(
                                    'id' => $yazicek['yazi_kategori']
                                    ));
                                    $kategoribilgisicek=$kategoribilgisi->fetch(PDO::FETCH_ASSOC);
                                    echo $kategoribilgisicek['kategori_adi'];
                                ?>
                              </a></li>
                              <li><a href="#"><i class="far fa-comments"></i> <?php echo $yazicek['yazi_yorum_sayisi']; ?></a></li>
                              <li><a href="#"><i class="far fa-heart"></i> <?php echo $yazicek['yazi_begeni_sayisi']; ?></a></li>
                            </ul>
                        </div>
                      </article>          
                    <?php } ?>
                      <nav class="blog-pagination justify-content-center d-flex">
                          <ul class="pagination">
                              <li class="page-item">
                                  <a href="#" class="page-link" aria-label="Previous">
                                      <i class="ti-angle-left"></i>
                                  </a>
                              </li>
                              <li class="page-item">
                                  <a href="#" class="page-link">1</a>
                              </li>
                              <li class="page-item active">
                                  <a href="#" class="page-link">2</a>
                              </li>
                              <li class="page-item">
                                  <a href="#" class="page-link" aria-label="Next">
                                      <i class="ti-angle-right"></i>
                                  </a>
                              </li>
                          </ul>
                      </nav>
                  </div>
              </div>
              <?php include "includes/sidebar.php" ?>
        </div>
    </div>
</section>
  <!--================Blog Area =================-->

  <!--Facebook sayfa kutusu-->
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/tr_TR/sdk.js#xfbml=1&version=v3.3"></script>

<?php include "includes/footer.php" ?>
